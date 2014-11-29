<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header_view");?>
<body>
  <div class="container">
    <div class="row clearfix">
      <div class="col-md-12 column">
        <?php $this->load->view("menu_view");?>
        <div id="container">
         <h1>Simple Login with CodeIgniter</h1>
         <?php echo validation_errors(); ?>
         <?php echo form_open('verifylogin'); ?>
         <label for="name">name:</label>
         <input type="text" size="20" id="name" name="name"/>
         <br/>
         <label for="password">Password:</label>
         <input type="password" size="20" id="passowrd" name="password"/>
         <br/>
         <input type="submit" value="Login"/>
       </form>
     </div>
   </div>
 </div>
</div>
</body>
</html>