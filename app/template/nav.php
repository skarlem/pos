<body class="">

  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-default" id="sidenav-main" style="background:#32325d;  ">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
        <img src="./assets/logo.png" class="navbar-brand-img" alt="...">
      </a>
     
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->

        <ul class="navbar-nav">

        <li class="nav-item ">
            <a class="nav-link " style="color:white;" href="dashboard.php" >
              <i class="ni ni-chart-bar-32 text-blue " ></i>Dashboard  
            </a>
          </li>

          <li class="nav-item  ">
          <a class=" nav-link " style="color:white;" href="pos.php"> <i class="ni ni-tv-2 text-primary"></i><font></font> Point of Sale
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " style="color:white;" href="inventory.php">
              <i class="ni ni-bullet-list-67 text-blue"></i> Inventory
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link " style="color:white;" href="sales.php">
              <i class="ni ni-money-coins text-red"></i> Sales History
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link" style="color:white;" href="./controller/logout.php">
              <i class="ni ni-circle-08 text-pink"></i> Logout
            </a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>