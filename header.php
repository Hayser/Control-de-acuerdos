<header id="header" class="header">

<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        <div class="header-left">
            <button class="search-trigger"><i class="fa fa-search"></i></button>
            <div class="form-inline">
                <form class="search-form">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                </form>
            </div>

            <div class="dropdown for-notification">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="count bg-danger">3</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="notification">
                <p class="blue">Tiene 3 notificaciones</p>
                <a class="dropdown-item media bg-flat-color-20" href="#">
                    <i class="fa fa-check"></i>
                    <p>Acuerdo 100 finalizado</p>
                </a>
                <a class="dropdown-item media bg-flat-color-20" href="#">
                    <i class="fa fa-check"></i>
                    <p>Acuerdo 110 finalizado</p>
                </a>
                <a class="dropdown-item media bg-flat-color-20" href="#">
                    <i class="fa fa-check"></i>
                    <p>Acuerdo 120 finalizado</p>
                </a>
              
              </div>
            </div>

            <div class="dropdown for-message">
            
             
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="images/<?php  echo $_SESSION['user_image']; ?>" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="menu-icon fa fa-user"></i> Mi Perfil</a>

                    

                 


                    <a class="nav-link" href="logout.php"><i class="menu-icon fa fa-sign-out"></i> Cerrar sesión</a>
            </div>
        </div>

        <div class="language-select dropdown" id="language-select">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                <i class="flag-icon flag-icon-cr"></i>
            </a>
          
        </div>

    </div>
</div>

</header><!-- /header -->