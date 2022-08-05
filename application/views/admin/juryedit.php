 
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
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-sm-0 font-size-22">Edit Details</h3> </div>
            </div>
        </div>
        <!-- end row -->
        <div class="col-md-5" style="margin:auto;">
            <div class="backgroud" style="border-radius:5px;">
                <div class="row p-5">
                    <h2 class="mb-5">Jury Member</h2>
                    <div class="col-md-12">
                        <form class="form-horizontal" action="<?=base_url()?>admin/dashboard/juryupdate" id="JForm" method="post" enctype="multipart/form-data">
                            <input hidden="" type="text" name="id" id="id" value="<?php echo $juryedit_data->id;?>">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jury Image :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="file" class="form-control" id="juryImage" name="juryImage" onchange="jImage(this);">
                                    <br> <img id="juryimg" src="<?php echo base_url();?>uploads/juryImage/<?php echo $juryedit_data->juryImage;?>" alt="your image" width="150" height="150"/> </div>
                                    <input hidden="" type="text" name="juryImage_hidden" id="juryImage_hidden" value="<?php echo $juryedit_data->juryImage;?>">
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Jury Name :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="text" class="form-control" id="juryName" name="juryName" placeholder="Jury Name" value="<?php echo $juryedit_data->juryName?>"> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Jury Content :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="text" class="form-control" id="juryContent" name="juryContent" placeholder="Jury Content" value="<?php echo $juryedit_data->juryContent?>"> </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10"> </div>
                                <div class="col-sm-2 myTextArea">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
</div>


    </div>
</div>
    </div>
</div>
        <!-- End Page-content -->

<!-- <script type="text/javascript">
    function open_css()
    {
        alert('sss');
    }
</script> -->
 <!-- 
    <script>
    window.onload = function() {
        CKEDITOR.replace('contentText');
    };

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