<?php

namespace app\models;


use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id_review
 * @property string $name
 * @property string $lastname
 * @property string $petname
 * @property integer $rating
 * @property string $description
 * @property integer $used
 * @property integer $approved
 * @property integer $declined
 * @property string $review_code
 * @property string $created
 * @property string $valid_until
 * @property integer $id_profile
 *
 * @property Profile $idProfile
 */
class Reviews extends \yii\db\ActiveRecord
{


    //public $captcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'petname', 'review_code', 'id_profile'], 'required'],
            [['used','declined', 'approved', 'id_profile'], 'integer'],
            [['rating'], 'integer','message' => Yii::t('app','{attribute} can be only full star')],
            [['created', 'valid_until','review_code','description'], 'safe'],
            [['name', 'lastname', 'petname'], 'string', 'max' => 45,'min' => 3],
            [['description'], 'string', 'max' => 250],
            [['review_code'], 'string', 'max' => 45],
            [['id_profile'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_profile' => 'user_id']],
            [['captcha'], 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_review' => Yii::t('app', 'Id Review'),
            'name' => Yii::t('app', 'Your name'),
            'lastname' => Yii::t('app', 'Your last name'),
            'petname' => Yii::t('app', 'Your pet name'),
            'rating' => Yii::t('app', 'Rating'),
            'description' => Yii::t('app', 'Description'),
            'used' => Yii::t('app', 'Used'),
            'approved' => Yii::t('app', 'Approved'),
            'declined' => Yii::t('app', 'Declined'),
            'review_code' => Yii::t('app', 'Review Code'),
            'created' => Yii::t('app', 'Created'),
            'valid_until' => Yii::t('app', 'Valid Until'),
            'id_profile' => Yii::t('app', 'Id Profile'),
            'captcha' => Yii::t('app', 'Verification Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id_profile']);
    }

    /** With given params we check if some1 has already given a review with those params
     * @param $name
     * @param $lastname
     * @param $petname
     * @return bool
     */
    public static function reviewerExsists($name,$lastname,$petname){

        $review = Reviews::find()
            ->where(['name'=>$name, 'lastname' =>$lastname, 'petname' => $petname])
            ->exists();

         return $review == 1 ? true : false;
    }

    /**
     * Checks if code exsists in database
     * @param $code
     * @return array
     */
    public static function codeExsists($code){

        $review = Reviews::find()
            ->where( [ 'review_code' => $code ] )
            ->one();
        return $review;
    }

    /** We check if code has been older than 2 days if so we return return false and throw error excpetion
     * @param $code
     * @return bool
     */
    public static function codeValid($code){

        $review = self::codeExsists($code);
        $today = date('Y/m/d h:m:s', time());

        $diff = strtotime($review->created) - strtotime($today);
        $days = $diff / 60 / 60 / 24;

        return $days > - 2 ? false : true;
    }

    /** We check if code has been alredy used to make a review
     * @param $code
     * @return bool
     */
    public static function codeUsed($code){

        $review = Reviews::codeExsists($code);
        return $review->used == 1 ? true : false;
    }

    /** Function for returning all approved reviews
     * @param $id_profile
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function listAllApprovedReviews($id_profile){
        $model = Reviews::find()
            ->where(['id_profile'=>$id_profile, 'used' =>1, 'approved' => 1])
            ->orderBy(['rating'=>SORT_DESC])
            ->all();
        return $model;
    }

    /**  Counting reviews waiting to be approved and displaying in NavBar!
     * @return
     *
     */
    public static function countReviewsWaiting(){
        $countReviewsToDisplay = Reviews::find()
            ->where(['id_profile'=>Yii::$app->user->identity->id, 'used' =>1, 'approved' => 0,'declined' => 0])
            ->count();

    if($countReviewsToDisplay == 0):
        $countReviewsToDisplay ==false;
        else:
        return '('.$countReviewsToDisplay.')';
    endif;
    }

    /** Function for returing list of all reviews, yet to be approved by end user!
     * @param $user_id
     * @return $this
     */
    public static function reviewsToApproved($user_id){
        $model = Reviews::find()
            ->where(['id_profile'=>$user_id, 'used' =>1, 'approved' => 0, 'declined' => 0]);
        return $model;
    }


}
