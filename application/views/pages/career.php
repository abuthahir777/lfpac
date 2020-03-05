  <div class="inner-banner">
    <div class="thm-container clearfix text-center">
      <div class="title">
        <h3>current openings</h3>
      </div>
      <!-- /.title -->
      <div class="bread-cumb"> <a href="<?php echo base_url();?>">Home</a><span class="sep">-</span><span class="page-name">Current Openings</span> </div>
      <!-- /.bread-cumb --> 
    </div>
    <!-- /.thm-container --> 
  </div>  



  <section class="contact-form-wrapper section-padding">
    <center><span class="text-success" id="email-notify"></span></center>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <?php foreach($vacancy as $row){?>

          <div class="job-box">
            <div class="description">
              <div class="float-left">
                <h5 class="title"><a href="job-details.html"><?php echo $row->hospital_name; ?></a></h5>
                <div class="candidate-listing-footer">
                  <ul>                    
                    <li><i class="flaticon-pin"></i><?php echo $row->city ;?></li>
                    <li><i class="flaticon-time"></i><?php echo $row->job_type ;?></li>
                  </ul>
                  <h6>Deadline: <?php echo date("F d, Y", strtotime($row->expiry_date)); ?></h6>
                </div>
              </div>
              <div class="div-right"> <a href="" id="<?php echo $row->vacancy_id; ?>" class="apply-button gett" data-toggle="modal" data-target="">Apply Now</a> </div>
            </div>
          </div>

        <?php } ?>

        </div>
      </div>
    </div>
  </section>
  <div class="modal fade career-modal" id="myModal" role="dialog">
    <div class="modal-dialog"> 
      
      <!-- Modal content-->
      <div class="modal-content career-margin">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <h4>Job Posted Date</h4>
              <p class="margin-none" id="post_date"></p>
            </div>
            <div class="col-sm-6">
              <h4>Job Close Date</h4>
              <p class="margin-none" id="expiry_date"></p>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>

          <div class="row">
            <div class="col-sm-12">
              <h4 id="category">Category</h4>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
          
          <div class="row">
            <div class="col-sm-12">
              <h4>Hospital Name:</h4>
              <p class="margin-none" id="hospital_name"></p>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
          <div class="row">
            <div class="col-sm-6">
              <h4>Job Type</h4>
              <p class="margin-none" id="job_type"></p>
            </div>
            <div class="col-sm-6">
              <h4>City</h4>
              <p class="margin-none" id="city"></p>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
          <div class="row">
            <div class="col-sm-12">
              <h4>Job Description</h4>
              <p class="margin-none" id="description"></p>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>

          <div class="row">
            <form name="career_form" action="<?php echo base_url('career/save');?>" onsubmit="return validateCareerForm()" id="career_form" method="POST" enctype="multipart/form-data">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="form-input">
                    <input class="form-control" id="fname" name="fname" placeholder="First Name" type="text">
                    <span id="fname-info" class="error-content err-font-color"></span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="form-input">
                    <input class="form-control" id="lname" name="lname" placeholder="Last Name" type="text">
                    <span id="lname-info" class="error-content err-font-color"></span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="form-input">
                    <input class="form-control" id="phone" name="phone" placeholder="Mobile Number" type="text">
                    <span id="phone-info" class="error-content err-font-color"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="form-input">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="text">
                    <span id="email-info" class="error-content err-font-color"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="form-input">
                    <input type="file" name="fileupload" value="fileupload" id="fileupload" class="form-control">
                    <span id="file-info" class="error-content err-font-color"></span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <button class="submit-btn" type="submit" id="career_submit1">Apply now</button>
                  <input type="hidden" name="cid" id="cid">
                </div>
              </div>

            </form>    
          </div>        
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  
  $(document).ready(function(){ 

      $(".gett").click(function(){ 
          var id = $(this).attr("id");
          
          $.ajax({

            url: "<?php echo base_url('career/getdetails'); ?>",
            method: "POST",
            data: {id:id},
            dataType:"json",
            success:function(data)
            {
                $('#myModal').modal('show');
                $('#post_date').text(data.post_date);
                $('#expiry_date').text(data.expiry_date);
                $('#hospital_name').text(data.hospital_name);
                $('#job_type').text(data.job_type);
                $('#city').text(data.city);
                $('#description').text(data.description);
                $('#category').text(data.category);
                $('#cid').val(data.vacancy_id);

            }

          })

      });           
  }); 

</script>

<script type="text/javascript">
  var notification = findGetParameter('msg');
  if (notification !== "") {
    $("#email-notify").html(findGetParameter('msg'));
  } 

  function findGetParameter(parameterName) {
      var result = null,
          tmp = [];
      var subStr = null;
      var items = location.search.substr(1).split("&");
      for (var index = 0; index < items.length; index++) {
          tmp = items[index].split("=");
          if (tmp[0] === parameterName){
            result = decodeURIComponent(tmp[1]);
          }
          if(result != null){
            subStr = result.substring(0, 24);
          }
      }
      return subStr;
  }
  $(document).on('click','#career_submit',function(e){
    e.preventDefault();
    var valid;
    valid = validateCareerForm();
    if(valid){
      $("#career_form").submit();
      location.reload();
      $("#name").val('');
      $("#subject").val('');
      $("#phone").val('');
      $("#email").val('');
      $("#message").val('');
    }
  });


function validateCareerForm(){
    var valid = true;
    /* Name */
    if(!$("#fname").val()){
      $("#fname-info").html("*First Name required.");
      valid = false;
    }else{
        $("#fname-info").html("");
    }

    if(!$("#lname").val()){
      $("#lname-info").html("*Last Name required.");
      valid = false;
    }else{
        $("#lname-info").html("");
    }

    /* email */
    if(!$("#email").val()) {
        $("#email-info").html("*Email required.");
        valid = false;
    }else if(!validateEmail($("#email").val())){
         $("#email-info").html("*Invalid email.");
        valid = false;
    }else{
        $("#email-info").html("");
    }

    /* phone */
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

    var fileInput = $.trim($("#fileupload").val());
    var ext = $('#fileupload').val().split('.').pop().toLowerCase();
    if (fileInput && fileInput !== '') {   
      if($.inArray(ext, ['pdf','doc','docx']) == -1) {
        $('#file-info').html('Attach pdf,doc or docx files.');
        valid = false;
      }else{
        $('#file-info').html('');
      } 
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