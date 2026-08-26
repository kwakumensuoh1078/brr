<?php 
//require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
include "controllers/getEvent.php"; 
 

$security = new MySQL();

$finalObject = new MySQL();
$finalObject1 = new MySQL();

$pageName = "Consultation Calendar";
include "session.php"; 

?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:46 GMT -->
<head>
    <?php require_once 'include/header.php' ?>
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
            <!-- Global styles START -->          
            <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            
            <!-- Global styles END --> 
            <?php if($pageName == 'Contact Us'){?>
                <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
            <?php  } ?>

            <!-- Page level plugin styles START -->
            <link href="assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
            <link href="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
            <link href="assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
            <!-- Page level plugin styles END -->

            <!-- Theme styles START -->
            <link href="assets/global/css/components.css" rel="stylesheet">
            
            <link href="assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
            <link href="assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
            <link href="assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
            <link href="assets/frontend/layout/css/custom.css" rel="stylesheet">
            <link href="assets/admin/pages/css/blog.css" rel="stylesheet" type="text/css"/>

            <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"/>
            <!-- Theme styles END -->
            <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-toastr/toastr.min.css"/>
</head>

<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">

        <div id="wrapper_full" class="content_all_warpper">
            <!----page-header----->

            <!----preloader----->
<!--  <div class="preloader-wrap">
<div class="preloader" style="background-image:url(assets/images/preloader.gif)">
</div>
<div class="overlay"></div>
</div> -->
<!----preloader end----->
<!----header----->
<div class="header_area" id="header_contents">
    <header class="main-header header header_v14">

        <?php require_once 'include/menu.php' ?>

    </header>
    <!-- end of the loop -->
</div>
<!----header end----->
<!--===============PAGE CONTENT==============-->
<!--===============PAGE CONTENT==============-->
       <div class="page_header_default style_one blog_single_pageheader">
            <div class="parallax_cover">
               <div class="simpleParallax"><img src="assets/images/slider_03.jpg" alt="bg_image"
                     class="img-fluid"></div>
            </div>
            <div class="page_header_content">
               <div class="auto-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="banner_title_inner">
                           <div class="title_page">
                             Consultation Calender
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                           <ul class="breadcrumb m-auto">
                              <li><a href="index">Home</a></li>
                              <li><a href="#">Consultation Calendar</a></li>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
          <div id="content" class="site-content ">
            <div class="container">
                  <div class="row default_row">
                      <div class="row" style="margin-bottom: 100px;">
                        <div class="col-md-9">
                           <br/><br/>
                           <h2 class="before_title" style="color:#ad2702"><strong> CONSULTATIONS CALENDAR</strong></h2><br/>
                          
                             <div id="calendar" class="has-toolbar"></div>
                        </div>
                        <div class="col-md-3"> <br/><br/> <br/><br/> <br/><br/>
                           <?php require_once 'include/side-menu-list.php' ?>
                        </div>
                      </div>
                  </div>
               </div>
            </div>
         </div>
            
           
            <!---newsteller end--->
         </div>
<!--===============PAGE CONTENT==============-->
<!--===============PAGE CONTENT==============-->
</div>
<!---==============footer start =================-->
<?php require_once 'include/footer.php' ?>
<!---==============modal popup end=================-->
<!---==============cart=================-->
<?php require_once 'include/script.php' ?>
<!---========================== javascript ==========================-->


                <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
                <script src="assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
                <!-- END CORE PLUGINS -->

                <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
                <script src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
                <script src="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

                <!-- BEGIN RevolutionSlider -->  
                <script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
                <script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
                <script src="assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
                <!-- END RevolutionSlider -->

                <script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
                <script src="assets/select2/select2.full.min.js"></script>

                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script src="assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
                <!-- END PAGE LEVEL SCRIPTS -->
                <script src="assets/admin/pages/scripts/ui-toastr.js"></script>


                <script src="assets/global/plugins/moment.min.js"></script>
                <script src="assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
                <script src="assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
                <script src="assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>

                <script>
                    var Calendar = function() {


                        return {
//main function to initiate the module
                            init: function() {
                                Calendar.initCalendar();
                            },

                            initCalendar: function() {

                                if (!jQuery().fullCalendar) {
                                    return;
                                }

                                var date = new Date();
                                var d = date.getDate();
                                var m = date.getMonth();
                                var y = date.getFullYear();

                                var h = {};

                                if (Metronic.isRTL()) {
                                    if ($('#calendar').parents(".portlet").width() <= 720) {
                                        $('#calendar').addClass("mobile");
                                        h = {
                                            right: 'title, prev, next',
                                            center: '',
                                            left: 'agendaDay, agendaWeek, month, today'
                                        };
                                    } else {
                                        $('#calendar').removeClass("mobile");
                                        h = {
                                            right: 'title',
                                            center: '',
                                            left: 'agendaDay, agendaWeek, month, today, prev,next'
                                        };
                                    }
                                } else {
                                    if ($('#calendar').parents(".portlet").width() <= 720) {
                                        $('#calendar').addClass("mobile");
                                        h = {
                                            left: 'title, prev, next',
                                            center: '',
                                            right: 'today,month,agendaWeek,agendaDay'
                                        };
                                    } else {
                                        $('#calendar').removeClass("mobile");
                                        h = {
                                            left: 'title',
                                            center: '',
                                            right: 'prev,next,today,month,agendaWeek,agendaDay'
                                        };
                                    }
                                }

                                var initDrag = function(el) {
// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
// it doesn't need to have a start or end
                                    var eventObject = {
title: $.trim(el.text()) // use the element's text as the event title
};
// store the Event Object in the DOM element so we can get to it later
el.data('eventObject', eventObject);
// make the event draggable using jQuery UI

};

var addEvent = function(title) {
    title = title.length === 0 ? "Untitled Event" : title;
    var html = $('<div class="external-event label label-default">' + title + '</div>');
    jQuery('#event_box').append(html);
    initDrag(html);
};

$('#external-events div.external-event').each(function() {
    initDrag($(this));
});

$('#event_add').unbind('click').click(function() {
    var title = $('#event_title').val();
    addEvent(title);
});

//predefined events
$('#event_box').html("");
addEvent("My Event 1");
addEvent("My Event 2");
addEvent("My Event 3");
addEvent("My Event 4");
addEvent("My Event 5");
addEvent("My Event 6");

$('#calendar').fullCalendar('destroy'); // destroy the calendar
$('#calendar').fullCalendar({ //re-initialize the calendar
    header: h,
defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
slotMinutes: 15,
editable: false,
droppable: false, // this allows things to be dropped onto the calendar !!!
drop: function(date, allDay) { // this function is called when something is dropped

// retrieve the dropped element's stored Event Object
    var originalEventObject = $(this).data('eventObject');
// we need to copy it, so that multiple events don't have a reference to the same object
    var copiedEventObject = $.extend({}, originalEventObject);

// assign it the date that was reported
    copiedEventObject.start = date;
    copiedEventObject.allDay = allDay;
    copiedEventObject.className = $(this).attr("data-class");

// render the event on the calendar
// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

// is the "remove after drop" checkbox checked?
    if ($('#drop-remove').is(':checked')) {
// if so, remove the element from the "Draggable Events" list
        $(this).remove();
    }
},
events: <?php echo json_encode($row_array); ?>
});

}

};

}();
</script>

<script>
    jQuery(document).ready(function() {       
// initiate layout and plugins
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
Calendar.init();
});
</script>

</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>