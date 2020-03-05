<div class="container">
  <div class="row">

    <div class="col-md-4">
      <h3></h3>
    </div>
    <div class="col-md-6" align="center">
    </div>

    <div class="col-md-2" align="right">  
      <a href="<?php echo base_url('admin/vacancy');?>">
          <input type="submit" name="back" id="back" value="Back" class="btn btn-success">
      </a>
    </div>

  </div>

  <form id="vacancy" name="vacancy" method="POST" action="<?php echo base_url('admin/vacancy/update');?>">
    <div class="form-group">
      <label for="hospital">Hospital Name</label>
      <input type="text" class="form-control" id="hospital" name="hospital" value="<?php echo $vacancy->hospital_name; ?>" placeholder="Enter Hospital Name" required="" <?php if(isset($view)){ echo "disabled";}?>>
      <input type="hidden" name="id" id="id" value="<?php echo $vacancy->vacancy_id; ?>">
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <input type="text" class="form-control" id="category" name="category" value="<?php echo $vacancy->category; ?>" placeholder="Enter Category Name" required="" <?php if(isset($view)){ echo "disabled";}?>>
      <input type="hidden" name="id" id="id" value="<?php echo $vacancy->vacancy_id; ?>">
    </div>
    <div class="form-group">
      <label for="discription">Description</label>
      <textarea class="form-control" id="description" rows="3" name="description" placeholder="Enter the details >200 words" required="" <?php if(isset($view)){ echo "disabled";}?>><?php echo $vacancy->description;?></textarea>
    </div>
    <div class="form-group">
      <label for="hospital">City</label>
      <input type="text" class="form-control" id="city" name="city" value="<?php echo $vacancy->city; ?>" placeholder="Enter City" required="" <?php if(isset($view)){ echo "disabled";}?>>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label for="jobtype">Job Type</label>
          <select class="form-control" id="jobtype" name="jobtype" required="" <?php if(isset($view)){ echo "disabled";}?>>
            <option value="">Select Job Type</option>
            <option value="Part Time" <?php if($vacancy->job_type == "Part Time"){echo "selected";}?>>Part Time</option>
            <option value="Full Time" <?php if($vacancy->job_type == "Full Time"){echo "selected";}?>>Full Time</option>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="date">Expiry Date</label>
          <input type="date" class="form-control" name="date" id="date" value="<?php echo $exp; ?>" required="" <?php if(isset($view)){ echo "disabled";}?>>
        </div>
<!--         <div class="col-sm-4">
          <label for=""></label>
        </div> -->
      </div>
    </div>

<?php if(!isset($view)){?>
    <input type="submit" class="btn btn-primary" value="Submit"></input>
<?php } ?>
  </form>
</div>