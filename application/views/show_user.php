
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header_view");?>
  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
        <?php $this->load->view("menu_view");?>
    <div class="row">
      <div class="col-md-4">
        <table class="table table-hover">
          <tr>
            <td>ID</td>
            <td><?php echo $user[0]->id ?></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><?php echo $user[0]->name ?></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><?php echo $user[0]->address ?></td>
          </tr>
          <tr>
            <td>Age</td>
            <td><?php echo $user[0]->age ?></td>
          </tr>
        </table>
      </div>
       <div class="col-md-8"> </div>
    </div>
    <a href="<?php echo site_url('/users/edit/'.$user[0]->id);?>" class="btn btn-primary btn-lg">edit</a>
  </div>
</div>
</div>
</body>
</html>
