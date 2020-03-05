<div class="container">
  <div class="row">

    <div class="col-md-4">
      <h3>Application</h3>
    </div>
    <div class="col-md-6" align="center">
    </div>

    <div class="col-md-2" align="right">  
      <a href="<?php echo base_url('admin/applications');?>">
          <input type="submit" name="back" id="back" value="Back" class="btn btn-success">
      </a>
    </div>

  </div>

  <form id="vacancy" name="vacancy" method="POST" action="<?php echo base_url('admin/applications/download/'.$application->application_id);?>">
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label for="fname">First Name</label>
          <p class="form-control" id="fname" name="fname"><?php echo $application->fname;?></p>
        </div>
        <div class="col-sm-6">
          <label for="hospital">Last Name</label>
          <p class="form-control" id="lname" name="lname"><?php echo $application->lname;?></p>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label for="mobile">Mobile</label>
          <p class="form-control" id="mobile" name="mobile"><?php echo $application->mobile;?></p>
        </div>
        <div class="col-sm-6">
          <label for="email">Email</label>
          <p class="form-control" id="email" name="email"><?php echo $application->email;?></p>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label for="mobile">Date</label>
          <p class="form-control" id="date" name="date"><?php echo $application->date;?></p>
        </div>
        <div class="col-sm-6">
          <label for="status">Download Ressume</label>
          <a href="<?php echo base_url('admin/applications/download/'.$application->application_id);?>"><input type="submit" name="status" id="status" value="Download" class="btn btn-success"></a>
        </div>
      </div>
    </div>

  </form>
</div>