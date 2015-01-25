<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header_view");?>
  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
        <?php $this->load->view("menu_view");?>
        <h1>Upload File</h1>
        <form method="post" action="" id="upload_file">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="" />

            <label for="userfile">File</label>
            <input type="file" name="userfile" id="userfile" size="20" />

            <input type="submit" name="submit" id="submit" />
        </form>
        <h2>Files</h2>
        <div id="files"></div>
    </body>
</html>