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