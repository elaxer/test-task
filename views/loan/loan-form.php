<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Loan */
/* @var $form ActiveForm */

$this->title = 'Создать займ';
?>
<div class="loan-form">
    <h2>Создать займ</h2>
    <br>
    <?php $form = ActiveForm::begin(['method' => 'POST', 'action' => \yii\helpers\Url::to(['loan/loan-form-handler'])]); ?>

        <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>
        <?= $form->field($model, 'amount')->textInput(['type' => 'number']) ?>
        <?= $form->field($model, 'term')->textInput(['type' => 'number']) ?>
        <?= $form->field($model, 'annual_rate')->textInput(['type' => 'number']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- loan-form -->
