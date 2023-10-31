<h1 class="text-center my-5">Register</h1>

<?php $form = App\Core\Form\Form::begin('', 'POST') ?>
  <?php echo $form->field($model, 'firstname' )?>
  <?php echo $form->field($model, 'lastname' )?>
  <?php echo $form->field($model, 'email', 'email')?>
  <?php echo $form->field($model, 'password', 'password')?>
  <?php echo $form->field($model, 'passwordConfirmation', 'password')?>
  <button type="submit" class="btn btn-primary">Register</button>
<?php  App\Core\Form\Form::end() ?>
 

