<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Sistema de administración de tareas';
?>

<div class="site-signup">
    <div class="row">
        <div class="col">
            <div>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Usuario") ?>
            <?= $form->field($model, 'email')->label("Correo Electrónico") ?>
            <?= $form->field($model, 'password')->passwordInput()->label("Contraseña") ?>
            <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])->label("Capcha de verificación") ?>

            <div class="form-group">
                <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>  
            </div>
            <div class="signup">
                <?= Html::a('¿Ya tienes cuenta?', ['site/index']) ?>
            </div>
        </div>
    </div>
</div>