<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once './application/views/master/head.php'; ?>

        <style>
            html, body { height:100%; width:100%;}
            #map {
                height : 100%; width : 100%; top : 0; left : 0; position : absolute; z-index : 200; 
            }
        </style>

        <!--http://www.jqueryscript.net/table/jQuery-Plugin-For-Bootstrap-Based-Data-Table-Bootstrap-Data-Table.html-->

        <script src="../../../jQuery-Data-Table/js/jquery.bdt.js"></script>        
        <link href="../../../jQuery-Data-Table/css/jquery.bdt.css" rel="stylesheet">
        <script src="../../../jQuery-Data-Table/js/vendor/jquery.sortelements.js"></script>
        <link href="../../../jonthornton-jquery-timepicker-107ff60/jquery.timepicker.css" rel="stylesheet">
        <script src="../../../jonthornton-jquery-timepicker-107ff60/jquery.timepicker.js"></script>

        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
        <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
    </head>
    <body>
        <div class="wrapper">
            <div class="box">
                <div class="row row-offcanvas row-offcanvas-left">

                    <?php include_once './application/views/master/sidebar.php'; ?>

                    <!-- main right col -->
                    <div class="column col-sm-10 col-xs-11" id="main">
                        <?php include_once './application/views/master/top-nav.php'; ?>

                        <div class="margin-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-hover table-striped bdt" id="bootstrap-table">
                                        <thead>
                                            <tr>
                                                <th><span class="sort-element">Horarios disponibles</span><span class="sort-icon fa"></span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $salida = '';

                                            foreach ($registros as $row) {
                                                $color = '';
                                                switch ($row->getTipo()) {
                                                    case 1: //'disponible'
                                                        $color = '#4ACD4A';
                                                        break;
                                                    case 2: //'ocupado'
                                                        $color = '#CDCDCD';
                                                        break;
                                                    case 3: //'reservado'
                                                        $color = '#3DBAC0';
                                                        break;
                                                }
                                                $salida .= '<tr style="display: table-row;">'
                                                        . '<td style="'
                                                        . 'background-color:' . $color . ';'
                                                        . ' padding-top:' . $row->getHorario()->tamano() . 'px;'
                                                        . ' padding-bottom:' . $row->getHorario()->tamano() . 'px;">'
                                                        . $row->getHorario()->getInicio()
                                                        . ' - '
                                                        . $row->getHorario()->getFin()
                                                        . '</td></tr>';
                                            }
                                            echo $salida;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-4">
                                    <!--contenido va acá-->
                                    <h3>Ingresar Reserva</h3>

                                    <form id="filtro" action="HorariosController" method="post"> 
                                        <div class="col-md-4">
                                            Inicio <br>
                                            <input name="horaInicio" id="horaInicio" type="text" class="time ui-timepicker-input form-control" data-scroll-default="6:00am" autocomplete="off">
                                        </div>
                                        <div class="col-md-4">
                                            Fin <br>
                                            <input name="horaFin" id="horaFin" type="text" class="time ui-timepicker-input form-control" data-scroll-default="6:00am" autocomplete="off">
                                        </div>
<!--                                    <input type="text" class="form-control" placeholder="Inicio" name="inicio" id="inicio"/>
                                        <input type="text" class="form-control" placeholder="Fin" name="fin" id="fin"/>-->
                                        <br>
                                        <div class="col-md-4">
                                            <input type="submit" class="form-control" value="Reservar"/>
                                        </div>
                                    </form>


                                    <!--contenido va acá-->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /main -->

                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $('.time').timepicker();
        });
    </script>
</html>

