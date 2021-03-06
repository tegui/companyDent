<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Company Dent</title>
    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/companyDent/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="http://localhost/companyDent/css/full-slider.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
           <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href= "<?= base_url('user')?>">Company Dent - Paciente</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración de Cita<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= base_url('user/listAppointments')?>">Consultar Citas</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Asignación de citas</li>
                <li><a href="<?= base_url('user/registerAppointment')?>">Solicitar cita</a></li>


              </ul>
            </li>
             <li>
                        <a href="<?= base_url('login/get_out') ?>"> Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
