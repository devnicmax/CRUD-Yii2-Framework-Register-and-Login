<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label("Titulo de la tarea") ?>

    <?= $form->field($model, 'description')->textArea()->label("Descripcion") ?>

    <?= $form->field($model, 'type')->dropDownList([ 'interno' => 'Interno', 'externo' => 'Externo', ], ['prompt' => ''])->label("Tipo") ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true])->label("Nombre de la empresa externa") ?>

    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'terminado' => 'Terminado', ], ['prompt' => ''])->label("Estado") ?>

    <?= $form->field($model, 'priority')->dropDownList([ 'alta' => 'Alta', 'baja' => 'Baja', ], ['prompt' => ''])->label("Prioridad") ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false);?>

    <?= $form->field($model, 'create_time')->hiddenInput(['value'=> date("Y-m-d H:i:s")])->label(false);?>

    <?= $form->field($model, 'update_time')->hiddenInput(['value'=> date("Y-m-d H:i:s")])->label(false);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
