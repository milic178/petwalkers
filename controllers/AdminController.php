<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 10.7.2017
 * Time: 22:19
 * Overriting AdminController from User module to add custom code and custom fash messages with translations!
 */


namespace app\controllers\user;
use dektrium\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function actionCreate()
    {
        return parent::actionCreate(); // TODO: Change the autogenerated stub
    }
}