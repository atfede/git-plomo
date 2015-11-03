<?php // include_once './master/conexion.php';      ?>


<!DOCTYPE html>
<html lang="en">
    <head>  
        <?php include_once './application/views/master/head.php'; ?>
        <script type=”text/javascript”>
            var centreGot = false;
        </script>
        <?php echo $map['js']; ?>
    </head>
    <body>

        <div class="wrapper">
            <div class="box">
                <div class="row row-offcanvas row-offcanvas-left">

                    <?php // include_once 'master/sidebar.php'; ?>
                    <?php include_once './application/views/master/sidebar.php'; ?>

                    <!-- main right col -->
                    <div class="column col-sm-10 col-xs-11" id="main">

                        <?php //include_once 'master/top-nav.php'; ?>
                        <?php include_once './application/views/master/top-nav.php'; ?>

                        <div class="padding">
                            <div class="full col-sm-9">

                                <!-- content -->                      
                                <div class="row">

                                    <form id="filtro" action="MapaController" method="post">
                                        <select id="tipos" name="tipos" onchange="this.form.submit()">
                                            <option value="todos">Todos</option>
                                            <option value="Sala de ensayo">Salas de ensayo</option>
                                            <option value="Estudio de grabación">Estudios de grabación</option>
                                            <option value="Profesor">Profesores</option>        
                                        </select>         
                                    </form>  
                                    <?php echo $map['html']; ?>

                                </div><!-- /padding -->
                            </div>
                            <!-- /main -->

                        </div>
                    </div>
                </div>


              
                <!-- script references -->
                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!--                <script src="js/bootstrap.min.js"></script>
                <script src="js/scripts.js"></script>-->
                </body>
                </html>



