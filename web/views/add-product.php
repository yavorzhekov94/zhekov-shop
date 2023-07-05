<?php
/** @var $this \app\core\View */
/** @var $model \app\core\ContactForm */

use yzh\phhpmvc\Form\Form;

$this->title = "Contact"
?>

<h1>Create product</h1>
<?php $form = Form::begin("", "post") ?>
<?php echo $form->field($model, 'name') ?>
<?php echo $form->field($model, 'sku') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end() ?> 