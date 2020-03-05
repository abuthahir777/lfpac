<div class="container">
  <div class="row">

    <div class="col-md-4">
      <h3>Enquire</h3>
    </div>
    <div class="col-md-6" align="center">
    </div>

    <div class="col-md-2" align="right">  
      <a href="<?php echo base_url('admin/enquire');?>">
          <input type="submit" name="back" id="back" value="Back" class="btn btn-success">
      </a>
    </div>

  </div>

  <form id="vacancy" name="vacancy" method="POST" action="<?php echo base_url('admin/enquire');?>">
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label for="name">Name</label>
          <p class="form-control" id="name" name="name" disebled><?php echo $details->name;?></p>
        </div>
        <div class="col-sm-6">
          <label for="email">Email</label>
          <p class="form-control" id="email" name="email"><?php echo $details->email;?></p>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label for="mobile">Mobile</label>
          <p class="form-control" id="mobile" name="mobile"><?php echo $details->mobile;?></p>
        </div>
        <div class="col-sm-6">
          <label for="subject">Subject</label>
          <p class="form-control" id="subject" name="subject"><?php echo $details->subject;?></p>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-12">
          <label for="mobile">Message</label>
          <textarea class="form-control" name="message" id="message" disabled=""><?php echo $details->message;?></textarea>
      </div>
    </div>

  </form>
</div>