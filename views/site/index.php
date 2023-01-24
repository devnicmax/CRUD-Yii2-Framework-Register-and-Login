<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Sistema de administración de tareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <p>Ingrese sus credenciales para continuar</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3',],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Usuario") ?>

        <?= $form->field($model, 'password')->passwordInput()->label("Contraseña") ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-5 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->label("Mantener sesión activa") ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <div class="register">
                <?= Html::a('¿No estas registrado?', ['site/signup']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
