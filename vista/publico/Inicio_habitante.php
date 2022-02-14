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
<?php include (call."Head_habitante.php"); ?>
<?php include (call."Script.php"); ?>


<body
    class="hold-transition text-sm  sidebar-mini sidebar-collapse  layout-fixed layout-navbar-fixed layout-footer-fixed "
    id="body">
    <!-- ============================================================== -->
    <!-- Inicio contenido de pagina -->
    <!-- ============================================================== -->
    <main class="wrapper">
        <?php include (call."Navbar_habitante.php"); ?>

<script src="<?php echo constant('URL')?>config/js/news/notificaciones_habitante.js"></script> 
<!-- <script src="<?php echo constant('URL')?>config/js/news/solicitudes.js"></script> 
<script src="<?php echo constant('URL')?>config/js/news/add_acciones.js"></script> 
-->

	<style>

.calendar_td{
	cursor:pointer;
	background: #C7F2EE;
}	




.calendar_td_selected{
	cursor:pointer;
	background:  #00C428;
}	



.calendar_ocupado{background: #85D7CF;cursor:pointer;}



.calendar_ocupado_selected{
	cursor:pointer;
	background:  #00C428;
}	

.table_calendar{
	border-radius:7px
	;width:100%;
	font-weight:bold;
	font-size:22px;
}

.calendar_td:hover{
	
	background: #00C428;
}	




.calendar_td_selected:hover{
	
	background:  #00C428;
}	



.calendar_ocupado:hover{background: #00C428;}



.calendar_ocupado_selected:hover{
	
	background:  #00C428;
}


.iconMarker{
	color:#78275F;
	cursor:pointer;
}

.iconMarker:hover{
	color:#A84A8B;
}


.bigSwal{
	width:80% !important;
	margin-left: -40% !important;
}


.bigSwalV2{
	width:95% !important;
	margin-left: -48% !important;
}



</style>
   