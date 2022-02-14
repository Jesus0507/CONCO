<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<html lang="es">
<?php include (call."Head.php"); ?>

<body
    class="hold-transition text-sm  sidebar-mini sidebar-collapse  layout-fixed layout-navbar-fixed layout-footer-fixed "
    id="body">
    <!-- ============================================================== -->
    <!-- Inicio contenido de pagina -->
    <!-- ============================================================== -->
    <main class="wrapper">
        <?php include (call."Navbar.php"); ?>

        <?php

        include (call."Menu.php"); 

        ?>
<script src="<?php echo constant('URL')?>config/js/news/notificaciones.js"></script> 
<?php if($_SESSION['Solicitudes']['consultar']!='0'){ ?>
<script src="<?php echo constant('URL')?>config/js/news/solicitudes.js"></script> 
<?php } ?>
<script src="<?php echo constant('URL')?>config/js/news/add_acciones.js"></script> 
<script src="<?php echo constant('URL')?>config/js/news/consultar-permisos.js"></script> 
   