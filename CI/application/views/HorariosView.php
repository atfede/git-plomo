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

                        <!--<div class="padding">-->

                        <div class="margin-top">
                            <!--<div id="bootstrap-table">-->
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Horarios sala XXX</h3>

                                    <!-- <form class="pull-right" role="form">
                                         <div class="form-group">
                                                 <input class="form-control" id="search" placeholder="Search...">
                                             </div>
                                         </form>-->
                                    <table class="table table-hover table-striped bdt" id="bootstrap-table">
                                        <thead>
                                            <tr>
                                                <th><span class="sort-element">Horarios disponibles</span><span class="sort-icon fa"></span></th>
                                                <!--<th><span class="sort-element">Día</span><span class="sort-icon fa"></span></th>-->
                                                <!--<th><span class="sort-element">First Name</span><span class="sort-icon fa"></span></th>-->
                                                <!--<th><span class="sort-element">Lunes</span><span class="sort-icon fa"></span></th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $salida = '';

                                            $cant_horarios = count($horarios);

                                            $x = 0;

                                            for ($h = 0; $h <= 23; $h++) {

//                                            if ($h <= substr($horarios[$x]->getInicio(), 0, 2) && $h <= substr($horarios[$x + 1]->getFin(), 0, 2)) {
//                                                $salida .= '<tr style="display: table-row;">'
//                                                        . '<td style="background-color:blue;"></td>'
//                                                        . '</tr>';
//                                            }
                                                
                                               if ($h >= substr($horarios[$x]->getInicio(), 0, 2) && $h <= substr($horarios[$x]->getFin(), 0, 2)) {
                                                    ?><script>
        //                                                    alert('<?php // echo $h . " >= " . substr($horarios[$x]->getInicio(), 0, 2) . " && " . $h . " <= " . substr($horarios[$x]->getFin(), 0, 2); ?>');
                                                </script> 
                                                <?php
                                                $salida .= '<tr style="display: table-row;">'
                                                        . '<td style="<!--background-color: #ccc;-->">' . $h . ' hs' . '</td>'
                                                        . '</tr>';
                                            }

                                            if ($h == 23) {
//                                            if ($h == substr($horarios[$x]->getFin(), 0, 2)) {
                                                $h = 0;
                                                $x++;
                                            }
                                            if ($x == $cant_horarios) {
                                                break;
                                            }
                                        }

//                                      $salida .= '</tr>';
                                        echo $salida;



//                                            $salida = '';
////                                            $salida = '<tr style="display: table-row;">';
//
//                                            foreach ($horarios as $row) {
//                                                $salida .= '<tr style="display: table-row;"><td style="padding-top:' . $row->tamano() . '%; padding-bottom:' . $row->tamano() . '%;">' . $row->getInicio() . ' - ' . $row->getFin() . '</td></tr>';
//                                            }
////                                            $salida .= '</tr>';
//                                            echo $salida;
                                        ?>


<!--<tr style="display: none;">
    <td>200</td>
    <td>janedoe</td>
    <td>Yane</td>
    <td>Doe</td>
</tr>-->

                                        </tbody>
                                    </table>
                                    <!--<div id="table-footer" class="row"><div class="pull-left"><form class="form-horizontal" id="page-rows-form"><label class="pull-left control-label">Entries per Page:</label><div class="pull-left"><select class="form-control"><option value="5">5</option><option value="10" selected="selected">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select></div></form></div><nav class="pull-right" id="table-nav"><ul class="pagination pull-right"><li class=""><a href="#"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li><li class=""><a>1</a></li><li class=""><a>2</a></li><li class="active"><a>3</a></li><li class=""><a>4</a></li><li class=""><a href="#"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li></ul></nav></div>-->
                                </div>
                                <!--</div>-->
                            </div>
                        </div>

                        <!--</div> /padding -->
                    </div>
                    <!-- /main -->

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#bootstrap-table').bdt();
                $("#search").hide();
                $("#table-footer").hide();
            });
        </script>
    </body>
</html>

