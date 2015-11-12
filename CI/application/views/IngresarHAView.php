<<<<<<< HEAD
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="filtro" action="IngresarHAController/ingresar" method="post">  
            <input type="text" class="form-control" placeholder="Inicio" name="inicio" id="inicio" <!--value="<?//php echo $inicio; ?>" -->>                                     
            <input type="text" class="form-control" placeholder="Fin" name="fin" id="fin" <!--value="<?//php echo $fin; ?>"-->>   
            <input type="text" class="form-control" placeholder="Dia" name="dia" id="dia" <!--value="<?//php echo $dia; ?>"-->>   
            <input type="submit" class="form-control" value="Ingresar">  
        </form>  
    </body>
</html>


=======

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
        <script type="text/javascript" src="../../../js/scripts.js"></script>

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
                                <div class="col-md-8">
                                    <!--contenido va acá-->
                                    <h3>Registrar horario atención</h3>
                                    <br>
                                    <form id="filtro" action="IngresarHAController/ingresar" method="post">  
                                        <div class="col-md-2">
                                            <input type="radio" id="cb_1" name="radiob" value="Lunes"> <label for="cb_1">Lunes</label> <br>
                                            <input type="radio" id="cb_2" name="radiob" value="Martes"> <label for="cb_2">Martes</label> <br>
                                            <input type="radio" id="cb_3" name="radiob" value="Miercoles"> <label for="cb_3">Miércoles</label> <br>
                                            <input type="radio" id="cb_4" name="radiob" value="Jueves"> <label for="cb_4">Jueves</label> <br>
                                            <input type="radio" id="cb_5" name="radiob" value="Viernes"> <label for="cb_5">Viernes</label> <br>
                                            <input type="radio" id="cb_6" name="radiob" value="Sabado"> <label for="cb_6">Sábado</label> <br>
                                            <input type="radio" id="cb_7" name="radiob" value="Domingo"> <label for="cb_7">Domingo</label> <br>
                                        </div>
                                        <div id="dv_horarios" class="col-md-4" style="border-left: 1px solid #ccc;">
                                            <span id="day"></span>
                                            <input type="text" class="form-control" placeholder="Inicio" name="inicio" id="inicio"/> <!--value="<?//php echo $inicio; ?>" -->

                                            <input type="text" class="form-control" placeholder="Fin" name="fin" id="fin"/> <!--value="<?//php echo $fin; ?>"-->
                                            <br/>
                                            <!--<input type="text" class="form-control" placeholder="Dia" name="dia" id="dia"/> value="<?//php echo $dia; ?>"-->
                                            <!--<br/>-->
                                            <input type="submit" class="form-control" value="Ingresar"/>  
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
</html>
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
