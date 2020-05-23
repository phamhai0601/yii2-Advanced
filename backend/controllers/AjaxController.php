<?php

namespace backend\controllers;
use app\models\Line;
use yii\filters\VerbFilter;

class AjaxController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @param $user_id
     *
     * @return string
     */
    public function actionUsernamePackage($user_id)
    {
        $user = Line::findOne($user_id);
        return $user->username;
    }



}
