 
<style type="text/css">
    
    .col-form-label{
        font-size: 16px;
    }
    .myTextArea {
    margin: 15px 0;
}
.backgroud {
    margin-bottom:25px;
    background-color:#e6e2e2;  
}
.form-select {
    display: block !important;
}
/*.btn:not(:disabled):not(.disabled) {
    padding-top: 35px !important;
}
*/
/*.app-search {
    padding: calc(32px / 1) 0 !important;
}*/



</style>
                

 <div class="page-content">
    <div class="container-fluid">
       <div class="row">
    <div class="row">
        <div class="col-md-7">
            <div class="backgroud" style="border-radius:5px;">
                <div class="row p-5">
                    <h2 class="mb-5">Page Content</h2>
                    <div class="col-md-12">
                        <div id="detailmessage"></div>
                        <form action="<?=base_url()?>admin/dashboard/addnewtemp" class="form-horizontal" name="SubForm" id="SubForm" class="SubForm" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Banner :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="file" class="form-control" id="banner" name="banner" onchange="readBanner(this);" required>
                                    <br> <img id="bannerImg" src="#" alt="your image" /> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-12 col-form-label">Content Heading :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="text" class="form-control" id="contentHead" name="contentHead" placeholder="Content Heading" required> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-12 col-form-label">Content Text :</label>
                                <div class="col-sm-12">
                                    <div class="myTextArea">
                                        <textarea name="contentText" id="contentText" class="form-control" rows="12" cols="50" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Content Image :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="file" class="form-control" id="contentImage" name="contentImage" onchange="cImage(this);" required>
                                    <br> <img id="cimage" src="#" alt="your image" /> </div>
                            </div>
                              
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Gallery Image :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="file" id="galleryImage[]" name="galleryImage[]" onchange="galleryImg(this);" multiple required>
                                    <br> <img id="gallery" src="#" alt="your image" /> </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Status :</label>
                                <div class="col-sm-12 ">
                                    <select class="form-select" name="stattus" id="stattus">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>  
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10"> </div>
                                <div class="col-sm-2 myTextArea">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="col-md-5">
            <div class="backgroud" style="border-radius:5px;">
                <div class="row p-5">
                    <h2 class="mb-5">Jury Member</h2>
                    <div class="col-md-12">
                        <form class="form-horizontal" action="<?=base_url()?>admin/dashboard/jurymember" id="JForm" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jury Image :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="file" class="form-control" id="juryImage" name="juryImage" onchange="jImage(this);" required>
                                    <br> <img id="juryimg" src="#" alt="your image" /> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Jury Name :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="text" class="form-control" id="juryName" name="juryName" placeholder="Jury Name" required> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Jury Content :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="text" class="form-control" id="juryContent" name="juryContent" placeholder="Jury Content" required> </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10"> </div>
                                <div class="col-sm-2 myTextArea">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
 
                    </div>
                </div>
            </div>
    


   <!--  <div class="backgroud" style="border-radius:5px;">
        <div class="col-sm-12 p-5">
          <div class="box box-info">
             <div class="box-header">
                <h3 class="box-title">Upload Data CSV File</h3>
             </div>
             <form class="form-horizontal"  id="member_form" action="<?php echo base_url() ?>admin/dashboard/insert_csv_product" method="post" role="form" enctype="multipart/form-data">
                <div class="box-body">
                   <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label"> </label>
                      <div class="col-sm-10">
                         <div class="form-group"><br>
                          <label for="upload_data_csv">Product CSV</label>
                          <input type="file" class="form-control" name="upload_data_csv" required id="upload_data_csv"><br>
                          <span class="text-danger"><small><span id="upload_error"></span></small></span>
                          <br>
                          <span class="text-danger"><small><b>Please Upload CSV File Only With Formated</b></small></span>
                       </div>
                     </div>
                   </div>
                   
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Submit" name="upload_data_btn" id="upload_data_btn" />
                    <a class="btn btn-success"   href="<?php echo base_url(); ?>admin/dashboard/download_formate_only"> Download CSV Format</a>
                      
                </div>
             </form>
          </div>
        </div>
    </div> -->
</div>





    </div>
</div>
    </div>
</div>
        <!-- End Page-content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
    function open_css()
    {
        alert('sss');
    }
</script -->>
 <script>
    window.onload = function() {
        CKEDITOR.replace('contentText');
    };

</script>

<!-- <script type="text/javascript">
    
    $("#SubForm").on('submit', function(e) {
            e.preventDefault();
            var contactForm = $(this);
            $.ajax({
                url: contactForm.attr('action'),
                type: 'post',
                data: contactForm.serialize(),
                success: function(response){
                    
                    if(response.status == 'success') {
                        $("#detailmessage").removeClass( "text-danger" );
                        $("#detailmessage").addClass( "text-success" );
                          window.location.reload();
                    }

                    if(response.status == 'error')
                    {

                        $("#detailmessage").removeClass( "text-success" );
                        $("#detailmessage").addClass( "text-danger" );
                         
                    }
                    $("#detailmessage").html(response.message);
                         
                }
            });
        }); 



</script> -->
<script>
 

    function readBanner(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#bannerImg')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(90);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    function cImage(input) {
               
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#cimage')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(170);
                    };
                reader.readAsDataURL(input.files[0]);
            }
        }


    function jImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#juryimg')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(170);
                    };
                    

                reader.readAsDataURL(input.files[0]);
            }
        }



    function galleryImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#gallery')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(170);
                    };
                    

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>