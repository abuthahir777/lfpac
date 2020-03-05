<div class="card">
    <div class="card-header">
      <div class="row">

        <div class="col-md-4">
          <h3>Enquires</h3>
        </div>

        <div class="col-md-6" align="center"></div>

        <div class="col-md-2" align="right">  

        </div>

      </div>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="enquiret">
          <thead>
            <tr>
              <th scope="col">SI No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
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

        var dataTable = $('#enquiret').DataTable({  
             "processing":true,  
             "serverSide":true,  
             "order":[],  
             "ajax":{  
                  url:"<?php echo base_url('admin/enquire/fetch'); ?>",  
                  type:"POST",
                  data: { action: "unchecked"}
             },  
        });   
      
  });
</script>