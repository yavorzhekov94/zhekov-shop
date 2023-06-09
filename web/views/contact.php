<?php
/** @var $this \app\core\View */
/** @var $model \app\core\ContactForm */

use yzh\phhpmvc\Form\Form;
use yzh\phhpmvc\Form\TextareaField;

$this->title = "Contact"
?>

<h1>Contact Us</h1>
<?php $form = Form::begin("", "post") ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end() ?>  


   