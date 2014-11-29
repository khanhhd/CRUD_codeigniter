<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header_view");?>
  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
        <?php $this->load->view("menu_view");?>
    <table class="table  table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
      <?php
        foreach ($data as $key => $value) {
      ?>
        <tr>
          <td>
              <?php echo $value['id'] ?>
          </td>
          <td>
            <a href="<?php echo site_url('/users/show_user/'.$value['id']);?>" >
              <?php echo $value['name'] ?>
            </a>
          </td>
          <td>
              <?php echo $value['address'] ?>
          </td>
          <td>
              <?php echo $value['age'] ?>
          </td>
          <td>
            <a href="<?php echo site_url('/users/edit/'.$value['id']);?>" >edit</a>
          </td>
          <td>
            <a href="<?php echo site_url('/users/delete/'.$value['id']);?>" onclick="return confirm('are you sure to delete')">delete
            </a>
          </td>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
    </div>
    <div class="page-header">
      <h1>
        <small class="text-center">Started with CI</small>
      </h1>
      <a href="<?php echo site_url('/users/new_user');?>" class="btn btn-primary btn-lg active" role="button">New User</a>
    </div>
  </div>
</div>
</div>
</body>
</html>
