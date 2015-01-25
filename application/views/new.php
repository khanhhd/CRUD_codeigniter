<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header_view");?>
  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
        <?php $this->load->view("menu_view");?>
    <div id="container">
      <?php echo form_open('users/create'); ?>
      <br>
      <?php echo form_label('Name :'); ?>
      <br>
      <?php echo form_input(array('id' => 'u_name', 'name' => 'name')); ?>
      <br>
      <?php echo form_label('Password :'); ?>
      <br>
      <?php echo form_input(array('id' => 'u_password', 'name' => 'password')); ?>
      <br>
      <?php echo form_label('Address :'); ?>
      <br>
      <?php echo form_input(array('id' => 'u_address', 'name' => 'address')); ?>
      <br>
      <?php echo form_label('Age: '); ?>
      <br>
      <br>
      <?php echo form_input(array('id' => 'u_age', 'name' => 'age')); ?>
      <br>
      <br>
      <?php echo form_submit(array('class' => 'btn btn-primary btn-lg active', 'id' => 'submit', 'value' => 'Create')); ?>
      <br>
      <?php echo form_close(); ?>
    </div>
    <div class="page-header">
      <h1>
        <small class="text-center">Started with CI</small>
      </h1>
    </div>
  </div>
</div>
</div>
</body>
</html>
