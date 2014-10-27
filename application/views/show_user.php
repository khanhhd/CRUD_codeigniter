<html>
<head>
  <title>Create User</title>
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
