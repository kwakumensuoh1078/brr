    <div class="side_bar_cart" id="mini_cart">
         <div class="cart_overlay"></div>
         <div class="cart_right_conten">
            <div class="close">
               <div class="close_btn_mini"><i class="icon-close"></i></div>
            </div>
            <div class="cart_content_box">
               <div class="contnet_cart_box">
                  <div class="widget_shopping_cart_content">
                     <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <!---==============floating menu=================-->
   <div class="floating_menu_box">
      <ul class="float_menu_box">
         <i class="close fa fa-times"></i>
         <li class="floating_menu_text active">
            <a href="#home"> Home </a>
         </li>

         <li class="floating_menu_text ">
            <a href="#about">About </a>
         </li>

         <li class="floating_menu_text ">
            <a href="#service"> Consultations </a>
         </li>

         <li class="floating_menu_text ">
            <a href="#process"> Regulations </a>
         </li>

         <li class="floating_menu_text ">
            <a href="#b-ready"> B-Ready </a>
         </li>

         <li class="floating_menu_text">
            <a href="#blog"> Information </a>
         </li>
      </ul>
   </div>
   <!---==============floating menu=================--><!-- Back to top with progress indicator-->

<div class="prgoress_indicator">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
       <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
 </div>
 <!---========================== javascript ==========================-->
 <script type='text/javascript' src='assets/js/jquery-3.6.0.min.js'></script>
 <script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
 <script type='text/javascript' src='assets/js/jquery.fancybox.js'></script>
  
 <script type='text/javascript' src='assets/js/jquery.flexslider-min.js'></script>
 <script type='text/javascript' src='assets/js/color-scheme.js'></script>
 <script type='text/javascript' src='assets/js/owl.js'></script>
 <script type='text/javascript' src='assets/js/swiper.min.js'></script>
 <script type='text/javascript' src='assets/js/isotope.min.js'></script>
 <script type='text/javascript' src='assets/js/countdown.js'></script>
 <script type='text/javascript' src='assets/js/simpleParallax.min.js'></script>
 <script type='text/javascript' src='assets/js/appear.js'></script>
 <script type='text/javascript' src='assets/js/jquery.countTo.js'></script>
 <script type='text/javascript' src='assets/js/sharer.js'></script>
 <script type='text/javascript' src='assets/js/validation.js'></script>
 <!-- map script -->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
 <script src="assets/js/gmaps.js"></script>
 <script src="assets/js/map-helper.js"></script>
 <!-- main-js -->
 <script type='text/javascript' src='assets/js/creote-extension.js'></script>
 <script src="assets/js/login.js"></script>
 <!---========================== javascript ==========================-->

    
         <script> 
            $(document).on("click", "#sendMessage", function(e){
               e.preventDefault();
               $("#contacts_nameerror").empty();
               $("#contacts_emailerror").empty();
               $("#contacts_messageerror").empty();
               $("#phonenumbererror").empty();

               var contacts_name = $.trim($("#contacts_name").val());
               var contacts_email = $.trim($("#contacts_email").val());
               var contacts_message = $.trim($("#contacts_message").val());
               var phonenumber = $.trim($("#phonenumber").val());

               if(contacts_name.length == 0){
                  $("#contacts_nameerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }

               if(validateEmail(contacts_email) === false) {

                  $("#contacts_emailerror").html('<p><small style="color:red;">Please enter a valid email.</small><p/>');
                  $("html, body").animate({scrollTop: 0}, "slow");
               }

               if(contacts_message.length == 0){
                  $("#contacts_messageerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }

               if(phonenumber.length == 0){
                  $("#phonenumbererror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }

               if(contacts_name.length != 0 && validateEmail(contacts_email) === true && contacts_message.length != 0 && phonenumber.length != 0)
               {
                  $("#wait").css("display","block");
                  $.ajax({
                     url: "controllers/contact.php", 
                     type: "post", 
                     data: $("#contactForm").serialize(),
                     success:function(data){
                        $("#wait").css("display", "none");

                        if(data == "error"){
                           $("#ack").html('<div align="center"><span class="alert alert-danger" style="width:500px;">Something went wrong. Please try again later. </span></div>');
                           $("#ack").hide().fadeIn(2000).fadeOut(4000);
                           $("html, body").animate({scrollTop:0},"slow");
                        }
                        else{
                           $('#ack').html('<div align="center"><span class="alert alert-success">Message sent successfully </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                                 setInterval(function(){
                                     $("#contactForm")[0].reset();
                                     location="contact-message-display.php";
                                 },2000);
                             });
                        }
                     }
                  })

               }

            });
         </script>
</body>

</html>