<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form=ActiveForm::begin(['method'=>'POST','action'=>['pass/index']]);
echo $form->field($model,'name')->label('ФИО посетителя:');
echo '<br>';
echo $form->field($model,'direction')->label('Направление:');
echo '<br>';
echo $form->field($model,'passnum')->label('Номер пасспорта:');
echo '<br>';
echo $form->field($model,'receiver')->label('Принимающий сотрудник:');
echo '<br>';
echo Html::submitButton('Добавить',['class'=>'btn btn-success']);
ActiveForm::end();