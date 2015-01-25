
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("header_view");?>
  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
        <?php $this->load->view("menu_view");?>
  <div id="container">
   <h2>Welcome <?php echo $name; ?>!</h2>
   <a href="home/logout">Logout</a>
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