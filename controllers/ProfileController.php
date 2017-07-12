<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 12.7.2017
 * Time: 10:46
 *
 *  * ProfileController shows users profiles.
 *
 * @property \dektrium\user\Module $module
 *
 */

namespace app\controllers;

use dektrium\user\controllers\ProfileController as BaseProfileController;


use yii\filters\AccessControl;

class ProfileController extends BaseProfileController
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['index'], 'roles' => ['@']],
                    ['allow' => true, 'actions' => ['show'], 'roles' => ['admin']],
                ],
            ],
        ];
    }
}