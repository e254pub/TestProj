<?php

namespace app\components;

use app\models\Visits;
use Yii;
use yii\data\ActiveDataProvider;

class VisitorComponent
{
    /**
     * @return void
     * Проверяем, если пользователь авторизован, возвращаем уникальные страницы, если их нет, добавляем
     */
    public static function visit()
    {
        if (!Yii::$app->user->isGuest) {
            $user_host = (new \yii\db\Query())
                ->from('visits')
                ->where(['usr_id' => Yii::$app->user->id])
                ->where(['host' => Yii::$app->user->returnUrl])
                ->count();
            if ($user_host === 0) {
                $visit = new Visits;
                $visit->host = Yii::$app->user->returnUrl;
                $visit->ip_addr = $_SERVER['REMOTE_ADDR'];
                $visit->usr_id = Yii::$app->user->id;
                $visit->save();
            }
        }
    }

    /**
     * @return ActiveDataProvider
     * Подсчитываем уникальные, группируем
     */
    public static function visitorsCount(): ActiveDataProvider
    {
        $count_host = (new \yii\db\Query())
            ->select(['host', 'COUNT(*) as count'])
            ->from('visits')
            ->groupBy(['host']);

        return new ActiveDataProvider([
            'query' => $count_host,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
    }
}