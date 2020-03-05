<div class="card">
    <div class="card-header">
      <div class="row">

        <div class="col-md-4">
          <h3>Vacancies</h3>
        </div>

        <div class="col-md-6" align="center">
          <?php   if($this->session->flashdata('save'))
                  { ?>
                    <div class="col-md-6" >
                        <span class="alert alert-success message hideit" id="message">
                          <strong><?php echo $this->session->flashdata('save'); ?></strong>
                      </div>
          <?php   } ?>
              <?php   if($this->session->flashdata('update'))
                  { ?>
                    <div class="col-md-6" >
                        <span class="alert alert-success message hideit" id="message">
                          <strong><?php echo $this->session->flashdata('update'); ?></strong>
                        </span>
                    </div>
          <?php   } ?>
          <?php   if($this->session->flashdata('delete'))
                  { ?>
                    <div class="col-md-6" >
                        <span class="alert alert-danger message hideit" id="message">
                          <strong><?php echo $this->session->flashdata('delete'); ?></strong>
                        </span>
                      </div>
          <?php   } ?>
        </div>

        <div class="col-md-2" align="right">  
          <a href="<?php echo base_url('admin/vacancy/form');?>">
              <input type="submit" name="add" id="add" value="Add" class="btn btn-primary">
          </a>
        </div>

      </div>
    </div>

    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="job_table">
          <thead>
            <tr>
              <th scope="col">SI No</th>
              <th scope="col">Hospital Name</th>
              <th scope="col">Category</th>
              <th scope="col">Description</th>
              <th scope="col">City</th>
              <th scope="col">Expiry Date</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
    </div>
    </div>

</div>


<script type="text/javascript">
  $(document).ready(function()
  {
    $('.hideit').fadeOut(10000);

        var dataTable = $('#job_table').DataTable({  
             "processing":true,  
             "serverSide":true,  
             "order":[],  
             "ajax":{  
                  url:"<?php echo base_url('admin/vacancy/fetch'); ?>",  
                  type:"POST"
             },  
        });   
      
  });
</script>