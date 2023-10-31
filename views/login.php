<h1 class="text-center my-5">Login</h1>

<?php $form = App\Core\Form\Form::begin('', 'POST') ?>
  <?php echo $form->field($model, 'email', 'email')?>
  <?php echo $form->field($model, 'password', 'password')?>
  <button type="submit" class="btn btn-primary">Login</button>
<?php  App\Core\Form\Form::end() ?>
 

