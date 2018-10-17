<header id="header" class="header">

<?php 
if (isset($_GET['notificacion'])) {
    $num = $_GET['notificacion'];

    if ($obj->Normal_Query("UPDATE `notificaciones` SET estado = 'leido' WHERE num_acuerdo = ?", [$num])){
        
        $obj->Normal_Query("SELECT * FROM `acuerdos` WHERE num_acuerdo = ?", [$num]);
        $obj->Count_Rows();
        $row = $obj->Single_Result();
        $id = $row->id;

        header("location:asignarColaborador.php?id=$id");
    }
}    
?>

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

            <?php
                $obj->Normal_Query("SELECT * FROM `notificaciones` WHERE `estado` = 'no_leido' and (`estado_alcaldia` = 'Asignado a departamento' or `estado_colaborador` = 'Finalizado' or `estado_colaborador` = 'Incompleto') ORDER BY `fecha_hora` DESC");
                $row = $obj->Count_Rows();
                ?>

                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="id_notificacion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <?php if ($row > 0) { ?>
                        <span class="count bg-danger">
                            <?php echo $row; ?>
                        </span>
                        <?php 
                        } ?>
                    </button>
                    <?php if ($row > 0) { ?>
                    <div class="dropdown-menu" aria-labelledby="notification" style="border-style: groove;">
                        <?php
                        //$obj->Normal_Query("SELECT * from `acuerdos`, `notificaciones` where 'acuerdos.num_acuerdo' = 'notificaciones.num_acuerdo'");
                        //$id = $obj->Single_Result();
                        //$id = $obj->Count_Rows();
                        $obj->Normal_Query("SELECT * FROM `notificaciones` WHERE `estado` = 'no_leido' and (`estado_alcaldia` = 'Asignado a departamento' or `estado_colaborador` = 'Finalizado' or `estado_colaborador` = 'Incompleto') ORDER BY `fecha_hora` DESC");
                        $message_row = $obj->fetch_all();
                        foreach ($message_row as $row) :
                        ?>
                        <a class="dropdown-item media bg-flat-color-20" href="principalJefe.php?notificacion=<?php echo $row->num_acuerdo ?>">
                            <i class="fa fa-check"></i>
                            <p>
                                <small><?php echo $row->fecha_hora ?></small><br>
                                <?php
                                echo "Acuerdo ";
                                echo $row->num_acuerdo;
                                echo " / ";
                                echo $row->estado_alcaldia;
                                echo " / ";
                                echo $row->departamento;
                                echo " / ";
                                echo $row->estado_colaborador;
                                ?>
                            </p>
                        </a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <?php 
                    } else { ?>
                    <div class="dropdown-menu" aria-labelledby="notification" style="border-style: groove;">
                        <?php
                        $obj->Normal_Query("SELECT * FROM `notificaciones` WHERE `estado` = 'leido' and (`estado_alcaldia` = 'Asignado a departamento' or `estado_colaborador` = 'Finalizado' or `estado_colaborador` = 'Incompleto') and `fecha_hora` BETWEEN date_sub(now(), interval 1 week)  AND NOW() ORDER BY `fecha_hora` DESC");
                        $message_row = $obj->fetch_all();
                        foreach ($message_row as $row) :
                        ?>
                        <a class="dropdown-item media bg-flat-color-20" href="principalJefe.php?notificacion=<?php echo $row->num_acuerdo ?>">
                            <i class="fa fa-check"></i>
                            <p>
                                <small><?php echo $row->fecha_hora ?></small><br>
                                <?php echo "Acuerdo ";
                                echo $row->num_acuerdo;
                                echo " / ";
                                echo $row->estado_alcaldia;
                                echo " / ";
                                echo $row->departamento;
                                echo " / ";
                                echo $row->estado_colaborador;
                                ?>
                            </p>
                        </a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <?php } ?>
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
                    <a class="nav-link" href="perfilJefe.php"><i class="menu-icon fa fa-user"></i> Mi Perfil</a>
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