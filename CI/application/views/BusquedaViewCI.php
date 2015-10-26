<!DOCTYPE html>
<html lang="en">
    <head>
        <?php // include_once './master/head.php'; ?>

        <?php include_once './application/views/master/head.php'; ?>

        <script type="text/javascript">
            var centreGot = false;
        </script>

        <?php echo $map['js']; ?>

        <style>
            html, body { height:100%; width:100%;}
            #map {
                height : 100%; width : 100%; top : 0; left : 0; position : absolute; z-index : 200; 
            }
        </style>

    </head>
    <body>
        <div class="wrapper">
            <div class="box">
                <div class="row row-offcanvas row-offcanvas-left">

                    <?php // include_once 'master/sidebar.php'; ?>
                    <?php include_once './application/views/master/sidebar.php'; ?>
                    <?php // echo base_url('application/views/master/sidebar'); ?>

                    <!-- main right col -->
                    <div class="column col-sm-10 col-xs-11" id="main">

                        <?php // include_once './master/top-nav.php'; ?>
                        <?php include_once './application/views/master/top-nav-wf.php'; ?>

                        <!--<div class="padding">-->
                        <!--<div class="" id="map"></div>-->

                        <?php echo $map['html']; ?>

                        <!--                        <form method="post" action="BusquedaControllerCI/Filtrar">
                                                    <select name="tipo" id="tipo" onchange="this.form.submit();">
                                                        <option value="todos" selected> Todos </option>
                                                        <option value="sala_ensayo"> Salas de ensayo </option>
                                                        <option value="profesor"> Profesores </option>
                                                    </select> 
                                                </form>-->

                        <!--</div> /padding -->
                    </div>
                    <!-- /main -->

                </div>
            </div>
        </div>


        <!--post modal-->
        <div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                        Update Status
                    </div>
                    <div class="modal-body">
                        <form class="form center-block">
                            <div class="form-group">
                                <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
                            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
        <!-- script references -->

    </body>
</html>