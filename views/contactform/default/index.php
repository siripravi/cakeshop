<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var \yii\base\Model $model Contains the model object based on DynamicModel yii class. */
/** @var \luya\web\View $this The current View object */
/** @var ActiveForm $form The ActiveForm Object */
?>
<?php if (Yii::$app->session->getFlash($this->context::CONTACTFORM_SUCCESS_FLASH)): ?>
    <div class="alert alert-success">The form has been submitted successfully.</div>
<?php else: ?>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name'); ?>
    <?= $form->field($model, 'email'); ?>
    <?= $form->field($model, 'street'); ?>
    <?= $form->field($model, 'city'); ?>
    <?= $form->field($model, 'tel'); ?>
    <?= $form->field($model, 'message')->textarea(); ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
<?php endif; ?>