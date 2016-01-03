<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form=ActiveForm::begin(['method'=>'POST','action'=>['auto/index']]);
echo $form->field($model,'name')->label('ФИО водителя:');
echo '<br>';
echo $form->field($model,'licence')->label('Водительское удостоверение:');
echo '<br>';
echo $form->field($model,'carnum')->label('Номер автомобиля:');
echo '<br>';
echo $form->field($model,'trailnum')->label('Номер прицепа:');
echo '<br>';
echo $form->field($model,'company')->label('Организация-отправитель:');
echo '<br>';
echo $form->field($model,'goods')->label('Груз:');
echo '<br>';
echo $form->field($model,'workshop')->label('Цех:');
echo '<br>';
echo Html::submitButton('Добавить',['class'=>'btn btn-success']);
ActiveForm::end();
