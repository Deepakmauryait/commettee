
<style>

     tbody, td, tfoot, th, thead, tr {
    border-width: 1px !important;
    padding-left: 22px !important;
    border-color: #8b868642;
    margin-bottom: 50px;
}
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="row">

                <div class="box col-xs-6">
                    <div class="box-header">
                        <h3 class="mb-sm-0 font-size-22"><a href="<?php echo base_url()?>admin/dashboard" style="color:black;">Dashboard</a></h3> </div>
                    <div class="box-tools"> </div>
                </div>



                <div class="col-xs-6 text-right">
                    <div class="form-group"> <a class="btn btn-primary" href="<?php echo base_url();?>admin/dashboard/addnew"><i class="fa fa-plus"></i>Add New</a> </div>
                </div>
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table class="display" cellspacing="0" width="100%" id="example">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Banner</th>
                                        <th>Content Heading</th>
                                        <th>Content Text</th>
                                        <th>Content Image</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody> </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
        </section>
    </div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
  
    //datatables
    table = $('#example').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true,//Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('admin/dashboard/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

     jQuery(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/dashboard/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete?");
          
          if(confirmation)
          {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId } 
            }).done(function(data){           
              currentRow.parents('tr').remove();
              if(data.status = true) { alert("successfully deleted"); }
              else if(data.status = false) { alert("deletion failed"); }
              else { alert("Access denied..!"); }
            });
          }
    });
});
</script>



<!-- <script type="text/javascript">
    
         jQuery(document).on("change", ".statusBtn", function(){

          var userId = $(this).attr("data-id");
          var value  = $(this).val();

          
          if(userId && value)
          {
             
            hitURL = "<?php echo base_url()?>admin/dashboard/statusChange",
            currentRow = $(this);
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId, status : value } 
            }).done(function(data){   
              if(data.status == 'success') { 
                alert(data.message); 
                window.location.reload();
              }
              else if(data.status =='error') {
                alert(data.message); 
                }
              else {
               alert("Access denied..!"); 
             }
            });
          }
            
          
    });
   
</script> -->
 
  <script type="text/javascript">
     
         jQuery(document).on("change", ".statusBtn", function(){

          var userId = $(this).attr("data-id");
          var value  = $(this).val();

            hitURL = "<?php echo base_url() ?>admin/dashboard/statusChange",
            currentRow = $(this);
          
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId, status : value } 
            }).done(function(data){ 
                     
              //currentRow.parents('tr').remove();
              if(data.status = 'success') { alert("successfully status changed");window.location.reload(); }
              else if(data.status = false) { alert("status failed failed"); }
              else { alert("Access denied..!"); }
            });
          
    });
 
   
</script>

 