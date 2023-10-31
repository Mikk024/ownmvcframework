<h1 class="text-capitalize text-center my-5">contact</h1>

<?php $form = App\Core\Form\Form::begin('', 'POST') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email', 'email') ?>
<?php echo new App\Core\Form\TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary" >Contact Us</button>
<?php App\Core\Form\Form::end() ?>