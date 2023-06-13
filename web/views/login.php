<?php

/** @var $model \app\models\User */

 use yzh\phhpmvc\Form\Form;
?>
<h1>Login</h1>
<?php $form = Form::begin("", "post") ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end() ?>
