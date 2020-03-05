  <div class="inner-banner">
    <div class="thm-container clearfix text-center">
      <div class="title">
        <h3>Contact Us</h3>
      </div>
      <!-- /.title -->
      <div class="bread-cumb"> <a href="<?php echo base_url();?>">Home</a><span class="sep">-</span><span class="page-name">Contact Us</span> </div>
      <!-- /.bread-cumb --> 
    </div>
    <!-- /.thm-container --> 
  </div>
  <section class="contact-form-wrapper section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="title">
            <h3>Have Any Question?</h3>
          </div>
          <!-- /.title -->
          <form name="contact_form" action="<?php echo base_url('contact/save');?>" id="contact_form" method="POST"
          onsubmit="return validateForm();">
            <!-- <p>Lorem ipsum dolor sit amet, consectetur ili adipiscing  elit. Donec nec pellentesque et <br>
              Unleash your creativity bu content to create any type of page quickly… </p>-->
            <center><span class="text-success" id="email-notify"><?php if($this->session->flashdata('send')){echo $this->session->flashdata('send');}?></span></center>
            <div class="row">
              <div class="col-md-6">
                <input type="text" placeholder="Full Name" name="name" id="name">
                <span id="name-info" class="error-content err-font-color"></span>
              </div>
              <!-- /.col-md-6 -->
              <div class="col-md-6">
                <input type="text" placeholder="Email Address" name="email" id="email">
                <span id="email-info" class="error-content err-font-color"></span>
              </div>
              <!-- /.col-md-6 -->
              <div class="col-md-6">
                <input type="text" placeholder="Phone Number" name="phone" id="phone">
                <span id="phone-info" class="error-content err-font-color"></span>
              </div>
              <!-- /.col-md-6 -->
              <div class="col-md-6">
                <input type="text" placeholder="Subject" name="subject" id="subject">
                <span id="subject-info" class="error-content err-font-color"></span>
              </div>
              <!-- /.col-md-6 -->
              <div class="col-md-12">
                <textarea placeholder="Message" name="message" id="message"></textarea>
                <span id="message-info" class="error-content err-font-color"></span>
              </div>


              <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key'); ?>"></div> 
              <div class="col-md-12"><span id="recaptcha-info" class="error-content err-font-color"></span></div>
              <!-- /.col-md-12 -->
              <div class="col-md-12">
                <!-- <button type="submit" id="submit_contact" onclick="contact();">Submit now</button> -->
                <button type="submit" id="submit_contact">Submit now</button>
              </div>
              <!-- /.col-md-12 --> 
            </div>
            <!-- /.row -->
          </form>
        </div>
        <!-- /.col-md-8 -->
        <div class="col-md-4">
          <div class="title">
            <h3>Information</h3>
          </div>
          <!-- /.title -->
          <div class="contact-info">
            <div class="single-contact-info">
              <div class="icon-box">
                <div class="inner"> <i class="fa fa-envelope-o" aria-hidden="true"></i> </div>
                <!-- /.inner --> 
              </div>
              <!-- /.icon-box -->
              <div class="text-box">
                <h4>Email id:</h4>
                <p>lfpacmail@gmail.com</p>
              </div>
              <!-- /.text-box --> 
            </div>
            <!-- /.single-contact-info -->
            <div class="single-contact-info">
              <div class="icon-box">
                <div class="inner">
                  <i class="fa fa-map-o" aria-hidden="true"></i>
                </div>
                <!-- /.inner --> 
              </div>
              <!-- /.icon-box -->
              <div class="text-box">
                <h4>address:</h4>
                <p>Building no:(kl.1x/146), Yendayar P.O, Koottickal
                  Kottayam, KL 686514</p>
              </div>
              <!-- /.text-box --> 
            </div>
            <!-- /.single-contact-info -->
            <div class="single-contact-info">
              <div class="icon-box">
                <div class="inner"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                <!-- /.inner --> 
              </div>
              <!-- /.icon-box -->
              <div class="text-box">
                <h4>Phone</h4>
                <p>+91 7303008872</p>
              </div>
              <!-- /.text-box --> 
            </div>
            <!-- /.single-contact-info --> 
          </div>
          <!-- /.contact-info -->
          <div class="social-icons"> <a href="https://www.facebook.com/lfpac/?ref=br_rs" target="_blank" class="fa fa-facebook"></a><!--  
           --><a href="https://twitter.com/LittlePlacement" target="_blank" class="fa fa-twitter"></a>
                     <a href="https://www.linkedin.com/company/little-flower-placement-consultancy" target="_blank" class="fa fa-linkedin"></a> </div>
          <!-- /.social-icons --> 
        </div>
        <!-- /.col-md-4 --> 
      </div>
    </div>
  </section>

<script type="text/javascript">
  
  function validateForm() 
{
  /* form validation */
  var valid = true;
    if(!$("#name").val()){
      $("#name-info").html("*Name required.");
      valid = false;
    }else{
        $("#name-info").html("");
    }

    if(!$("#email").val()) {
        $("#email-info").html("*Email required.");
        valid = false;
    }else if(!validateEmail($("#email").val())){
         $("#email-info").html("*Invalid email.");
        valid = false;
    }else{
        $("#email-info").html("");
    }

    if(!$("#phone").val()) {
        $("#phone-info").html("*Mobile number required.");
        valid = false;
    }else{
        var phoneNo  = $("#phone").val();
        var phoneLen = $('#phone').val().length;
        var regExp   = /^\d{10}$/;
        if(regExp.test(phoneNo)){
           $("#phone-info").html("");
        }else{
          $('#phone-info').html('*Enter a valid mobile number.');
          valid = false;
        }

        if(phoneLen>10 || phoneLen<10){
          $('#phone-info').html('*Enter 10 digit mobile number.');
          valid = false;
        }else{
          $("#phone-info").html("");
        }
    }

    if(!$("#subject").val()) 
    {
        $("#subject-info").html("*Subject required");
        valid = false;
    }
    else{
        $("#subject-info").html("");
    }

    if(!$("#message").val()){
      $("#message-info").html("*Message required.");
      valid = false;
    }else{
        $("#message-info").html("");
    }


    var recaptcha = $("#g-recaptcha-response").val();
     if (recaptcha === ""){
        $("#recaptcha-info").html("*ReCaptcha required.");
      valid = false;
     }
     else{
        $("#recaptcha-info").html("");
     }

    return valid;
} 

  function validateEmail(sEmail) 
  {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (filter.test(sEmail)) 
    { return true; }
    else { return false; }
  }

</script>