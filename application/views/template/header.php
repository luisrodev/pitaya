<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/dash.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/fontawesome-free-5.3.1-web/css/all.css"); ?>" />

    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/behavior.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/popper.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

    <title>La Pitaya</title>
</head>
<body>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pitaya Company</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Cerrar Sesión</a>
        </li>
      </ul>
    </nav>

    

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Administración (Administrador)</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>

                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                            <i class="fas fa-users-cog"></i> <!-- uses solid style -->
                                Gestión Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-address-book"></i> <!-- uses solid style -->
                                Gestión Tipo Proveedores
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Proveedores(Administrador, Gerente)</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>

                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-user"></i> <!-- uses solid style -->
                                Gestión Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-address-card"></i> <!-- uses solid style -->
                                Gestión Proveedores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-list-alt"></i> <!-- uses solid style -->
                                Gestión Productos
                            </a>
                        </li>
                    </ul>


                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Consultas(Empleado)</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>

                    <ul class="nav flex-colum">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-search"></i> <!-- uses solid style -->
                                Búsqueda Productos y Proveedores
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main"style="margin-top: 10px;" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                

            
        