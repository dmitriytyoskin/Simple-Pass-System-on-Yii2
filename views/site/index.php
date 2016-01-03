<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <h1>СИСТЕМА ПРОПУСК</h1>

    <p>Добро пожаловать в систему ПРОПУСК</p>
    <p>Выберите ваши ФИО из списка и введите пароль:</p>
<?php
$items = ArrayHelper::map($model,'id','username');
$form=ActiveForm::begin(['method'=>'get','action'=>['site/index']]);
//echo Html::DropDownList('user_id',null,$items);

echo $form->field($newmodel,'id')->DropDownList($items,[])->label('Выберите пользователя');
echo "<br>";
echo "Введите Ваш пароль:";
//echo Html::passwordInput('pass',null);
//echo var_dump($newmodel);
echo $form->field($newmodel,'password')->passwordInput()->label('Введите пароль');
echo Html::radioList('type','guest',['guest'=>'Посетитель','auto'=>'Автотранспорт']);
echo "<br>";
echo Html::submitButton('Вход',['class'=>'btn btn-success']);
ActiveForm::end();

?>   
</div>
