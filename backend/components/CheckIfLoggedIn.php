<?php

namespace backend\components;

class CheckIfLoggedIn extends \yii\base\Behavior{
     public function events()
    {
        return [
            \yii\web\Application::EVENT_BEFORE_REQUEST => 'checkIfLoggedIn',
        ];
    }
    
    public function checkIfLoggedIn(){
        if(\Yii::$app->getRequest()->getCookies()->has('lang')){
            \Yii::$app->language=  \Yii::$app->getRequest()->getCookies()->getValue('lang');
        }
    }
}


    