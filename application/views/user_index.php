<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
  <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
  <!--script src="js/less-1.3.3.min.js"></script-->
  <!--append ‘#!watch’ to the browser URL, then refresh the page. -->
  
  <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.png">

    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/scripts.js"></script>
  </head>

  <body>
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
          <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo site_url("/users"); ?>">Man-shop  </a>
           </div>

           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="#">Clothes</a>
              </li>
              <li>
                <a href="<?php echo site_url("/users"); ?>">Users</a>
              </li>

              </ul>
            </li>
          </ul>
          <form method="post" class="navbar-form navbar-left" role="search" action="<?php echo site_url('users') ?>">
            <div class="form-group">
              <input type="text" class="form-control" name="name">
            </div> <button type="submit" class="btn btn-default">Search</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<strong class="caret"></strong></a>
             <ul class="dropdown-menu">
              <li>
                <a href="#">Login</a>
              </li>
              <li>
                <a href="#">Logout</a>
              </li>
              <li>
                <a href="#">Update</a>
              </li>
              <li class="divider">
              </li>
              <li>
                <a href="#">About me</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
    <div>
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
