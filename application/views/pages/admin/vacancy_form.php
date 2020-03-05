<div class="container">
  <div class="card-header">
        <div class="row">

    <div class="col-md-4">
      <h3>Vacancy Form</h3>
    </div>
    <div class="col-md-6" align="center">
    </div>

    <div class="col-md-2" align="right">  
      <a href="<?php echo base_url('admin/vacancy');?>">
          <input type="submit" name="back" id="back" value="Back" class="btn btn-success">
      </a>
    </div>

  </div>
  </div>
  <div class="card-body">
  <form id="vacancy" name="vacancy" method="POST" action="<?php echo base_url('admin/vacancy/save');?>">
    <div class="form-group">
      <label for="hospital">Hospital Name </label>
      <input type="text" class="form-control" id="hospital" name="hospital" placeholder="Enter Hospital Name" required="">
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category Name" required="">
    </div>
    <div class="form-group">
      <label for="discription">Description</label>
      <textarea class="form-control" id="description" rows="3" name="description" id="description" placeholder="Enter the details >200 words" required=""></textarea>
    </div>
    <div class="form-group">
      <label for="hospital">City</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required="">
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
          <label for="jobtype">Job Type</label>
          <select class="form-control" id="jobtype" name="jobtype" required="">
            <option value="">Select Job Type</option>
            <option value="Part Time">Part Time</option>
            <option value="Full Time">Full Time</option>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="date">Expiry Date</label>
          <input type="date" class="form-control" name="date" id="date" required="">
        </div>
<!--         <div class="col-sm-4">
          <label for=""></label>
        </div> -->
      </div>
    </div>


    <input type="submit" class="btn btn-primary" value="Submit"></input>
  </form>
  </div>
</div>