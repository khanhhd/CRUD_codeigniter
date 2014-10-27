<html>
<head>
  <title>Update User</title>
</head>
<body>

</body>
</html>


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
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control">
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
  <div id="container">
    <?php echo form_open('users/update'); ?>
    <input type="hidden" id="hide" name="id" value="<?php echo $user[0]->id; ?>">
    <br>
    <?php echo form_label('Name :'); ?>
    <br>
    <?php echo form_input(array('id' => 'u_name', 'name' => 'name', 'value'=> $user[0]->name)); ?>
    <br>
    <?php echo form_label('Address :'); ?>
    <br>
    <?php echo form_input(array('id' => 'u_address', 'name' => 'address', 'value'=> $user[0]->address)); ?>
    <br>
    <?php echo form_label('Age: '); ?>
    <br>
    <?php echo form_input(array('id' => 'u_age', 'name' => 'age', 'value'=> $user[0]->age)); ?>
    <br>
    <br>
    <?php echo form_submit(array('class' => 'btn btn-primary btn-lg active', 'id' => 'submit', 'value' => 'Update user')); ?>
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
