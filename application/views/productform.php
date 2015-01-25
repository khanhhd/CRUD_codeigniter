
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header_view");?>
  <body>
  <div class="product-form">
     <?php $this->load->view("menu_view");?>
     <div class="form">
    <?php echo form_open('products/create'); ?>

    <h5>name</h5>
    <?php echo form_error('product_name'); ?>
    <input type="text" name="product_name" value="" size="50" />

    <h5>Category name</h5>
    <?php echo form_error('category_name'); ?>
    <input type="text" name="category_name" value="" size="50" />

    <h5>Product date</h5>
    <?php echo form_error('product_date'); ?>
    <input type="text" name="product_date" value="" size="50" />

    <h5>expiry date</h5>
    <?php echo form_error('expiry_date'); ?>
    <input type="text" name="expiry_date" value="" size="50" />

    <div><input type="submit" value="Submit" /></div>
    </div>
    </div>
  </form>
  </body>
</html>