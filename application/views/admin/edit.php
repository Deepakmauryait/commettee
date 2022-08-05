 
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

        <div class="col-md-7" style="margin:auto;">
            <div class="backgroud" style="border-radius:5px;">
                <div class="row p-5">
                    <h2 class="mb-5">Page Content</h2>
                    <div class="col-md-12">
                        <form class="form-horizontal" action="<?=base_url()?>admin/dashboard/update" id="SForm" method="post" enctype="multipart/form-data">

                            <input hidden="" type="text" name="id" id="id" value="<?php echo $edit_data->id;?>">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Banner :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="file" class="form-control" id="banner" name="banner" onchange="readBanner(this);">
                                    <br> <img id="bannerImg" src="<?php echo base_url();?>uploads/banner/<?php echo $edit_data->banner;?>" alt="your image" width="200" height="90"/> </div>
                                    <input hidden="" type="text" name="banner_hidden" id="banner_hidden" value="<?php echo $edit_data->banner;?>">
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-12 col-form-label">Content Heading :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="text" class="form-control" id="contentHead" name="contentHead" placeholder="Content Heading" value="<?php echo $edit_data->contentHead?>"> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-12 col-form-label">Content Text :</label>
                                <div class="col-sm-12">
                                    <div class="myTextArea">
                                        <textarea name="contentText" id="contentText" class="form-control" rows="12" cols="50"><?php echo base64_decode($edit_data->contentText);?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Content Image :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="file" class="form-control" id="contentImage" name="contentImage" onchange="cImage(this);">
                                    <br> <img id="cimage" src="<?php echo base_url();?>uploads/contentImage/<?php echo $edit_data->contentImage;?>" alt="your image" width="150" height="170"/> </div>
                                    <input hidden="" type="text" name="contentImage_hidden" id="contentImage_hidden" value="<?php echo $edit_data->contentImage;?>">
                            </div>
                              
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Gallery Image :</label>
                                <div class="col-sm-12 myTextArea">
                                    <input type="file" class="form-control" id="galleryImage" name="galleryImage" onchange="galleryImg(this);" multiple>
                                    <br> <img id="gallery" src="#" alt="your image" /> </div>
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
       
        <!-- end row -->
        <!-- <div class="col-md-5">
            <div class="backgroud" style="border-radius:5px;">
                <div class="row p-5">
                    <h2 class="mb-5">Jury Member</h2>
                    <div class="col-md-12">
                        <form class="form-horizontal" action="<?=base_url()?>admin/dashboard/jurymember" id="JForm" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jury Image :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="file" class="form-control" id="juryImage" name="juryImage" onchange="jImage(this);">
                                    <br> <img id="juryimg" src="#" alt="your image" /> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Jury Name :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="text" class="form-control" id="juryName" name="juryName" placeholder="Jury Name"> </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Jury Content :</label>
                                <div class="col-sm-8 myTextArea">
                                    <input type="text" class="form-control" id="juryContent" name="juryContent" placeholder="Jury Content"> </div>
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
 -->




    </div>
</div>
    </div>
</div>
        <!-- End Page-content -->

<script type="text/javascript">
    function open_css()
    {
        alert('sss');
    }
</script>
 
    <script>
    window.onload = function() {
        CKEDITOR.replace('contentText');
    };

</script>


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