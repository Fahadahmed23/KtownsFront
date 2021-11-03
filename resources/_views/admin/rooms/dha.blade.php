<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $configuration->WebsiteTitle }} | Rooms Booking</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ url('resources/assets/web') }}/img/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-57x57-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('resources/assets/web') }}/img/apple-touch-icon-144x144-precomposed.png" />
        
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/bootstrap/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ url('resources/assets/admin/') }}/dist/css/skins/_all-skins.min.css">
        <!--<link rel="stylesheet" href="https://www.planyo.com/qs-styles.css?v=5">-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->



        <script src="{{ url('resources/assets/admin/') }}/horcalender/jquery-1.9.1.min.js" type="text/javascript"></script>

        <!-- daypilot libraries -->
        <script src="{{ url('resources/assets/admin/') }}/horcalender/daypilot-all.min.js" type="text/javascript"></script>

        <link type="text/css" rel="stylesheet" href="{{ url('resources/assets/admin/') }}/horcalender/style.css" />
        <style type="text/css">
            .scheduler_default_rowheader_inner
            {
                border-right: 1px solid #ccc;
            }
            .scheduler_default_rowheader.scheduler_default_rowheadercol2
            {
                background: #fff;
            }
            .scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                top: 2px;
                bottom: 2px;
                left: 2px;
                background-color: transparent;
                border-left: 5px solid #1a9d13; /* green */
                border-right: 0px none;
            }
            .status_dirty.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                border-left: 5px solid #ea3624; /* red */
            }
            .status_cleanup.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                border-left: 5px solid #f9ba25; /* orange */
            }
        </style>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('admin/includes/header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('admin/includes/sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><i class="fa fa-edit"></i> Rooms Booking</h1>
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Rooms Booking</li>
                    </ol>
                </section>
                <!-- Main content -->

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">DHA Room Bookings</h3>
                                    <div class="box-tools pull-right">
                                        <a class="btn btn-primary trial" title="Listing" href="{{url('admin/dha/dashboard')}}" role="button"><i class="fa fa-list"></i><span class="hidden-md hidden-sm hidden-xs"> DHA Dashboard</span></a>
                                        <a class="btn btn-primary trial" title="Listing" href="{{url('admin/dha/reservation')}}" role="button"><i class="fa fa-list"></i><span class="hidden-md hidden-sm hidden-xs"> DHA Booking List</span></a>
                                        <a class="btn btn-primary trial" title="Make reservation" href="{{url('admin/dha/reservation/add')}}" role="button"><i class="fa fa-plus"></i><span class="hidden-md hidden-sm hidden-xs"> Make reservation</span></a>
                                    </div>
                                </div>

                                <div class="main">

                                    <div style="width:160px; float:left;">
                                        <div id="nav"></div>
                                    </div>

                                    <div style="margin-left: 160px;">

                                        <div class="space">
                                            Show rooms:
                                            <!--<select id="filter">
                                                <option value="0">All</option>
                                                <option value="1">Single</option>
                                                <option value="2">Double</option>
                                                <option value="4">Family</option>
                                            </select>-->

                                            <div class="space">
                                                Time range:
                                                <select id="timerange">
                                                    <option value="week">Week</option>
                                                    <option value="month" selected>Month</option>
                                                </select>
                                                <label for="autocellwidth"><input type="checkbox" id="autocellwidth">Auto Cell Width</label>
                                            </div>
                                        </div>

                                        <div id="cdp"></div>

                                        <!--<div class="space">
                                            <a href="#" id="add-room">Add Room</a>
                                        </div>-->

                                    </div>
                                    <script type="text/javascript">
var nav = new DayPilot.Navigator("nav");
nav.selectMode = "month";
nav.showMonths = 4;
nav.skipMonths = 4;
nav.onTimeRangeSelected = function (args) {
    loadTimeline(args.start);
    loadEvents();
};
nav.init();

$("#timerange").change(function () {
    switch (this.value) {
        case "week":
            dp.days = 7;
            nav.selectMode = "Week";
            nav.select(nav.selectionDay);
            break;
        case "month":
            dp.days = dp.startDate.daysInMonth();
            nav.selectMode = "Month";
            nav.select(nav.selectionDay);
            break;
    }
});

$("#autocellwidth").click(function () {
    dp.cellWidth = 40;  // reset for "Fixed" mode
    dp.cellWidthSpec = $(this).is(":checked") ? "Auto" : "Fixed";
    dp.update();
});

/*$("#add-room").click(function (ev) {
 ev.preventDefault();
 var modal = new DayPilot.Modal();
 modal.onClosed = function (args) {
 loadResources();
 };
 modal.showUrl("room_new.php");
 });*/
                                    </script>

                                    <script>
                                        var dp = new DayPilot.Scheduler("cdp");
                                        dp.allowEventOverlap = false;

                                        //dp.scale = "Day";
                                        //dp.startDate = new DayPilot.Date().firstDayOfMonth();
                                        dp.days = dp.startDate.daysInMonth();
                                        loadTimeline(DayPilot.Date.today().firstDayOfMonth());

                                        //dp.eventDeleteHandling = "Update";

                                        dp.timeHeaders = [
                                            {groupBy: "Month", format: "MMMM yyyy"},
                                            {groupBy: "Day", format: "d"}
                                        ];

                                        dp.eventHeight = 60;
                                        dp.bubble = new DayPilot.Bubble({});

                                        dp.rowHeaderColumns = [
                                            {title: "Room Number", width: 100}
                                            /*{title: "Capacity", width: 80*},
                                             {title: "Status", width: 80*}*/
                                        ];

                                        dp.separators = [
                                            {location: new DayPilot.Date(), color: "red"}
                                        ];

                                        dp.onBeforeResHeaderRender = function (args) {
                                            var beds = function (count) {
                                                return count + " bed" + (count > 1 ? "s" : "");
                                            };

                                            //args.resource.columns[0].html = beds(args.resource.capacity);
                                            /*args.resource.columns[1].html = args.resource.status;
                                             switch (args.resource.status) {
                                             case "Dirty":
                                             args.resource.cssClass = "status_dirty";
                                             break;
                                             case "Cleanup":
                                             args.resource.cssClass = "status_cleanup";
                                             break;
                                             }*/

                                            /*args.resource.areas = [{
                                             top: 3,
                                             right: 4,
                                             height: 14,
                                             width: 14,
                                             action: "JavaScript",
                                             js: function (r) {
                                             var modal = new DayPilot.Modal();
                                             modal.onClosed = function (args) {
                                             loadResources();
                                             };
                                             modal.showUrl("room_edit.php?id=" + r.id);
                                             },
                                             v: "Hover",
                                             css: "icon icon-edit",
                                             }];*/
                                        };

                                        // http://api.daypilot.org/daypilot-scheduler-oneventmoved/
                                        dp.onEventMoved = function (args) {
                                            $.get("{{ url('admin/dha/backendmove') }}",
                                                    {
                                                        id: args.e.id(),
                                                        newStart: args.newStart.toString(),
                                                        newEnd: args.newEnd.toString(),
                                                        newResource: args.newResource
                                                    },
                                            function (data) {
                                                //alert(data);
                                                //dp.message(data.message);
                                            });
                                        };

                                        // http://api.daypilot.org/daypilot-scheduler-oneventresized/
                                        /*dp.onEventResized = function (args) {
                                         $.post("backend_resize.php",
                                         {
                                         id: args.e.id(),
                                         newStart: args.newStart.toString(),
                                         newEnd: args.newEnd.toString()
                                         },
                                         function () {
                                         dp.message("Resized.");
                                         });
                                         };*/

                                        /*dp.onEventDeleted = function (args) {
                                         $.post("backend_delete.php",
                                         {
                                         id: args.e.id()
                                         },
                                         function () {
                                         dp.message("Deleted.");
                                         });
                                         };*/

                                        // event creating
                                        // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                                        /*dp.onTimeRangeSelected = function (args) {
                                         //var name = prompt("New event name:", "Event");
                                         //if (!name) return;
                                         
                                         var modal = new DayPilot.Modal();
                                         modal.closed = function () {
                                         dp.clearSelection();
                                         
                                         // reload all events
                                         var data = this.result;
                                         if (data && data.result === "OK") {
                                         loadEvents();
                                         }
                                         };
                                         modal.showUrl("new.php?start=" + args.start + "&end=" + args.end + "&resource=" + args.resource);
                                         
                                         };*/

                                        dp.onEventClick = function (args) {
                                         var modal = new DayPilot.Modal();
                                         modal.closed = function () {
                                         // reload all events
                                         var data = this.result;
                                         if (data && data.result === "OK") {
                                         alert(data);
                                         loadEvents();
                                         }
                                         };
                                         window.location.href = "/admin/dha/reservation/"+args.e.id();
                                         //modal.showUrl("dha/edit.php?id=" + args.e.id());
                                         };
                                         
                                        dp.onBeforeEventRender = function (args) {
                                            var start = new DayPilot.Date(args.e.start);
                                            var end = new DayPilot.Date(args.e.end);

                                            var today = DayPilot.Date.today();
                                            var now = new DayPilot.Date();

                                            args.e.html = args.e.text + " (" + start.toString("M/d/yyyy") + " - " + end.toString("M/d/yyyy") + ")";

                                            switch (args.e.status) {
                                                case "NotCheckin":
                                                    //var in2days = today.addDays(1);

                                                    /*if (start < in2days) {
                                                     args.e.barColor = 'red';
                                                     args.e.toolTip = 'Expired (not confirmed in time)';
                                                     }
                                                     else {*/
                                                    args.e.barColor = 'red';
                                                    args.e.toolTip = 'Not Checkin';
                                                    //}
                                                    break;
                                                case "Checkin":
                                                    //var arrivalDeadline = today.addHours(18);

                                                    /*if (start < today || (start.getDatePart() === today.getDatePart() && now > arrivalDeadline)) { // must arrive before 6 pm
                                                     args.e.barColor = "#f41616";  // red
                                                     args.e.toolTip = 'Late arrival';
                                                     }
                                                     else {*/
                                                    args.e.barColor = "green";
                                                    args.e.toolTip = "Check In";
                                                    //}
                                                    break;
                                                    /*case 'Pending': // arrived
                                                     var checkoutDeadline = today.addHours(10);
                                                     
                                                     if (end < today || (end.getDatePart() === today.getDatePart() && now > checkoutDeadline)) { // must checkout before 10 am
                                                     args.e.barColor = "#f41616";  // red
                                                     args.e.toolTip = "Late checkout";
                                                     }
                                                     else
                                                     {
                                                     args.e.barColor = "orange";  // blue
                                                     args.e.toolTip = "Pending";
                                                     //}
                                                     break;*/
                                                case 'Checkout': // checked out
                                                    args.e.barColor = "#f39c12";
                                                    args.e.toolTip = "Check out";
                                                    break;
                                                default:
                                                    args.e.toolTip = "Unexpected state";
                                                    break;
                                            }

                                            args.e.html = args.e.html + "<br /><span style='color:gray'>" + args.e.toolTip + "</span>";

                                            var paid = '';
                                            var paidColor = "#000000";
                                            
                                            if(args.e.status == 'Checkout'){
                                                paid = args.e.paid;
                                                paidColor = "#aaaaaa";
                                            }
                                            
                                            args.e.areas = [
                                                {bottom: 10, right: 4, html: "<div style='color:" + paidColor + "; font-size: 8pt;'>Paid: " + paid + "</div>", v: "Visible"},
                                                {left: 4, bottom: 8, right: 4, height: 2, html: "<div style='background-color:" + paidColor + "; height: 100%; width:" + paid + "%'></div>", v: "Visible"}
                                            ];

                                        };

                                        function loadTimeline(date) {
                                            dp.scale = "Manual";
                                            dp.timeline = [];
                                            var start = date.getDatePart().addHours(12);

                                            for (var i = 0; i < dp.days; i++) {
                                                dp.timeline.push({start: start.addDays(i), end: start.addDays(i + 1)});
                                            }
                                            dp.update();
                                        }

                                        function loadEvents() {
                                            var start = dp.visibleStart();
                                            var end = dp.visibleEnd();
                                            $.get("{{ url('admin/dha/roombookinglist') }}",
                                                    {
                                                        start: start.toString(),
                                                        end: end.toString()
                                                    },
                                            function (data) {
                                                dp.events.list = data;
                                                dp.update();
                                            }
                                            );
                                        }

                                        function loadResources() {
                                            //dp.rows.load("{{ url('admin/dha/roomlist') }}");

                                            $.get("{{ url('admin/dha/roomlist') }}",
                                                    /*{capacity: 0},*/
                                                            function (data) {
                                                                dp.resources = data;
                                                                dp.update();
                                                            });
                                                }

                                        $(document).ready(function () {
                                            loadEvents();
                                            loadResources();
                                            dp.init();

                                            //$(".scheduler_default_corner div:nth-last-child(4)").removeAttr("style");
                                            //$( ".scheduler_default_corner div:nth-last-child(4)" ).remove();
                                            //$( ".scheduler_default_corner" ).find("div").text("DEMO").remove();
                                            //$( ".scheduler_default_corner div:nth-last-child(4)" ).remove();
                                            //$( ".scheduler_default_corner" ).find("div:nth-child(4)").addClass("listitem2");

                                            /*$("#filter").change(function () {
                                             loadResources();
                                             });*/
                                        });

                                    </script>
                                </div>
                                <style>
                                    .scheduler_default_corner div:nth-of-type(4) {
                                        display: none !important;
                                    }
                                </style>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                </section>

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('admin/includes/footer')

        </div>
        <!-- jQuery 2.2.3 -->


    </body>
</html>
