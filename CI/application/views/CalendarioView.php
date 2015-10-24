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
        <script src="http://maps.google.com/maps/api/js?libraries=places&sensor=false"></script>

        <!--        <link href="../assets/responsive-calendar/0.9/css/responsive-calendar.css" rel="stylesheet" media="screen">
                <script src="responsive-calendar/0.9/js/jquery.js" type="text/javascript"></script>
                <script src="../assets/responsive-calendar/0.9/js/responsive-calendar.js" type="text/javascript"></script>
        -->
        <link href="../../../responsive-calendar/0.9/css/responsive-calendar.css" rel="stylesheet" media="screen">
        <!--<script src="responsive-calendar/0.9/js/jquery.js" type="text/javascript"></script>-->
        <script src="../../../responsive-calendar/0.9/js/responsive-calendar.js" type="text/javascript"></script>

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

                        <!-- Responsive calendar - START -->
                        <div class="responsive-calendar" id="calendar">
                            <div class="controls">
                                <a class="pull-left" data-go="prev"><div class="btn"><i class="glyphicon glyphicon-chevron-left"></i>Anterior</div></a>
                                <h4><span data-head-year></span> <span data-head-month></span></h4>
                                <a class="pull-right" data-go="next"><div class="btn">Siguiente<i class="glyphicon glyphicon-chevron-right"></i></div></a>
                            </div><hr/>
                            <div class="day-headers">
                                <div class="day header">Lunes</div>
                                <div class="day header">Martes</div>
                                <div class="day header">Miércoles</div>
                                <div class="day header">Jueves</div>
                                <div class="day header">Viernes</div>
                                <div class="day header">Sábado</div>
                                <div class="day header">Domingo</div>
                            </div>
                            <div class="days" data-group="days">
                                <!-- the place where days will be generated -->
                            </div>
                        </div>
                        <!-- Responsive calendar - END -->

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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
<!--        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>-->
        <script>
            $(document).ready(function () {
//                $('.responsive-calendar').responsiveCalendar();
//                $('#calendar').responsiveCalendar('prev');
//                $('#calendar').responsiveCalendar('next');
//                

                $('#calendar').responsiveCalendar({
//                    time: '2015-10',
                    events: {
//                    onDayClick: function (events) {
//                        this.onDayClick(events);
//                        alert('click');

//                  "2015-12-04": {"number": count(*), "badgeClass": "badge-warning", "url": "verDiaPasandoObjetoEnVariableSession"},

                        "2015-10-04": {
                            "number": 5, "badgeClass": "badge-warning", "url": "#",
                            "dayEvents": [
                                {
                                    "name": "Important meeting",
                                    "hour": "17:30"
                                },
                                {
                                    "name": "Morning meeting at coffee house",
                                    "hour": "08:15"
                                }
                            ]},
                        "2015-10-02": {"number": 3, "badgeClass": "badge-warning", "url": "#"},
                        "2015-10-05": {"number": 8, "badgeClass": "badge-warning", "url": "#"},
                        "2015-10-03": {"number": 5, "badgeClass": "badge-warning", "url": "#"},
                        "2015-10-06": {"number": 8, "badgeClass": "badge-warning", "url": "#"},
                        "2015-10-07": {"number": 8, "badgeClass": "badge-warning", "url": "#"},
                        "2015-10-08": {"number": 3, "badgeClass": "badge-warning", "url": "#"},
                        "2015-10-15": {"number": 2, "badgeClass": "badge-warning", "url": "#"}

                    }
                });
                $('#calendar').responsiveCalendar('prev');
                $('#calendar').responsiveCalendar('next');
            });


            //esto anda

//            $(document).ready(function () {
//                $(".responsive-calendar").responsiveCalendar({
//                    time: '2015-10',
//                    events: {
//                        "2015-10-21": {"number": 5, "badgeClass": "badge-warning", "url": "http://w3widgets.com/responsive-calendar"},
//                        "2015-10-22": {"number": 1, "badgeClass": "badge-warning", "url": "http://w3widgets.com"},
//                        "2015-10-07": {"number": 1, "badgeClass": "badge-error"},
//                        "2015-10-14": {}}
//                });
//            });
        </script>
    </body>
</html>

