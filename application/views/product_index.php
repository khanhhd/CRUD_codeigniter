<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header_view");?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
  // using JQUERY's ready method to know when all dom elements are rendered
  $( document ).ready(function () {
    // set an on click on the button
    $(".delete").click(function () {
      // get the time if clicked via an ajax get queury
      // see the code in the controller time.php
      var ID = $(this).data('id');
      $.get("<?php echo site_url()."/products/delete/"?>"+ID , function () {
        // update the textarea with the time
        $('tr#'+ID).remove();
      });
    });
  });
</script>
  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
        <?php $this->load->view("menu_view");?>
    <table class="table  table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Category name</th>
        <th>Product Date</th>
        <th>Expiry Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
      <?php
        foreach ($data as $key => $value) {
      ?>
        <tr id="<?php echo $value['id'] ?>">
          <td>
              <?php echo $value['id'] ?>
          </td>
          <td>
            <a href="<?php echo site_url('/users/show_user/'.$value['id']);?>" >
              <?php echo $value['product_name'] ?>
            </a>
          </td>
          <td>
              <?php echo $value['category_name'] ?>
          </td>
          <td>
              <?php echo $value['product_date'] ?>
          </td>
          <td>
              <?php echo $value['expiry_date'] ?>
          </td>
          <td>
            <a href="<?php echo site_url('/products/edit/'.$value['id']);?>" >edit</a>
          </td>
          <td>
            <a class="delete" data-id='<?php echo $value['id'] ?>' href="#">delete
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
      <a href="<?php echo site_url('/products/new_product');?>" class="btn btn-primary btn-lg active" role="button">New Product</a>
    </div>
  </div>
</div>
</div>
</body>
</html>
