<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$form=ActiveForm::begin(['method'=>'get','action'=>['site/index']]);
echo Html::radioList('type','guest',['guest'=>'Посетитель','auto'=>'Автотранспорт']);
echo "<br>";
echo Html::submitButton('Вход',['class'=>'btn btn-success']);
ActiveForm::end();