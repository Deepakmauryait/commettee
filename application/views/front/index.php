<style>
    .min-h{

       height:800px;
       width: 100%;
    }
    .row {
    margin-bottom: 80px !important;
}
.card {
    padding-right:0 !important;
    padding-left:0 !important;
     width: 20rem !important;
    height: 500px !important;
    margin: 7px; 
}
.grad{
    background-image: linear-gradient(180deg, red, lightgreen);
}
.colour{
    color: #fff;
    font-weight: bold;
}

.cards {
  position: relative;
  width: 100%;
  max-width: 400px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .3s ease;
  background-color: black;
}

.cards:hover .overlay {
  opacity: 0.7;
  border-radius:5px;
}

.icon {
  color: white;
  font-size: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.fa-user:hover {
  color: #eee;
}
.t-color{
    color:red;
}
section {
    padding-bottom: 0;
}
.padd{
    padding: 60px 0;
}

.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
  padding-right:0 !important;
  padding-left:0 !important; 
}
@media (min-width: 1200px){
.container {
    max-width: 1340px !important;
}
}
.no-gutters{
  margin-bottom:0 !important;

}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.card-img-top {
    height: 300px !important;
}

.row>* {
   
     padding-right: 0; 
     padding-left: 0; 
}
.card {
   
}


.galleryimage {
    width: 100% !important;
    height: 320px !important;
}
img.cimage {
    width: 100%;
    height: 500px;
    border-radius: 5px;
}
.err_msg{
  color:red;
}
</style>

<section>
<div class="banner">
    <div class="container-influid">
        <div class="row">
            <div class="col-sm-12">
                <img class="img-fluid min-h" src="<?php echo base_url();?>uploads/banner/<?php echo $images_data->banner?>" alt="">
            </div>
        </div>
    </div>
</div>
</section>

 
<section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="wrapper">
            <div class="row no-gutters">
              <div class="col-lg-6">
                <div class="contact-wrap w-100 p-md-5 p-4">
                  <h3 style="padding-bottom: 20px;">Let’s Build Your Dream Website! </h3>
                  <span id="success" class="err_msg"></span>
                  <div class="row no-gutters">
                    <div class="col-md-12">

                     
 
                    </div>
                  </div> 
                 <form action="<?=base_url()?>index/add_leads" id="leadForm" name="leadForm" method="post" class="leadForm">
                    <div class="row no-gutters">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" id="name" value="" placeholder="Name *">
                          <span id="name_err" class="err_msg"></span>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" name="fname" id="fname" placeholder="Father Name">
                        </div>
                      </div>


                      <div class="col-md-12"> 
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email *">
                          <span id="email_err" class="err_msg"></span>
                        </div>
                      </div>
                      <div class="row no-gutters">
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number *">
                          <span id="mobile_err" class="err_msg"></span>
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <input type="number" class="form-control" name="age" id="age" placeholder="Age">
                        </div>
                      </div>
                    </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                           <input type="text" class="form-control" name="qualification" id="qualification" placeholder="Enter Last Qualification">
                        </div>
                      </div>
                      <input type="hidden" id="id" name="id">
                      <div class="row no-gutters">
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <select class="form-select" name="mstatus" id="mstatus">
                            <option>Select Marital Status</option>
                            <option value="Married">Married</option>
                            <option value="UnMarried">UnMarried</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <input type="text" class="form-control" name="dob" id="dob" placeholder="Date Of Birth *">
                          <span id="dob_err" class="err_msg"></span>
                        </div>
                      </div>
                    </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" value="Send Message" class="btn btn-primary">
                          <div class="submitting"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-stretch">
                <div class="info-wrap w-100 p-5 img" style="background-image: url(<?php echo base_url();?>assets/form/images/img.jpg);">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<section id="ts-intro" class="ts-intro no-padding">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="home-main-content">

            
            <h2 class="intro-title" style="font-weight:bold;"><?php echo $images_data->contentHead?></h2>
            <p> <?php echo base64_decode($images_data->contentText);?>
            </p>  
            </div>
         </div>
         <!-- Col end -->
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="">
               <img class="img-responsive cimage" src="<?php echo base_url();?>uploads/contentImage/<?php echo $images_data->contentImage?>" alt="">
               <img class="img-responsive" src="<?php echo base_url();?>uploads/galleryImage/<?php echo $images_data->galleryImage?>" alt="">
            </div>
         </div>
        <!--  <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="home-content">
            <p>Broadcast Engineering Consultants India Limited (BECIL - A Mini Ratna Government of India Enterprise under Ministry of Information &amp; Broadcasting) is organizing the Make in India Conclave 2021 at Dubai, UAE, with an aim to promote manufacturing and develop India as a hub for manufacturing, design and innovation and also to bring investments, foster innovation, enhance skill development, protect intellectual property and build best-in-class production in automobile &amp; its components, aviation, defence, biotechnology, chemicals, construction, manufacturing, electrical machinery, electronic systems, food processing, IT &amp; BPM, leather, media and entertainment, mining, oil and gas, pharmaceuticals, ports and shipping, railways, renewable energy, roads and highways, space, textiles &amp; garments, thermal power, tourism &amp; hospitality and wellness.</p>
            <p><a href="#" class="btn btn-primary">Know More</a></p>
            </div>
         </div> -->

         <!-- Col end -->
      </div>
      <!-- Content row 1 end -->
   </div>
   <!-- Container end -->
</section>

<!-- <div class="banner">
    <div class="container-influid">
        <div class="row">
            <div class="col-sm-12">
                <img class="img-fluid min-h" src="<?php echo base_url();?>assets/images/banner.jpg" alt="">
            </div>
        </div>
    </div>
</div> -->

          
<section class="grad padd">
<div class="mb-section">
   <div class="container">
      <div class="row text-center">
         <h2 class="home-sub-title colour">Revolutionizing the World</h2>
         <h3 class="section-sub-title title-white colour">Jury Member</h3>
      </div>
      <div class="row">
              <?php

              foreach ($jury_data as $key => $value) {
              ?>

          <div class="card" style="width: 18rem;">
            <div class="cards">
          <img class="card-img-top" src="<?php echo base_url()?>uploads/juryImage/<?php echo $value->juryImage;?>" alt="Card image cap">
            
          <div class="overlay">
              <a href="https://twitter.com/" class="icon" target="_blank">
                <i class="fab fa-twitter-square"></i>
              </a>
              </div>
            </div>
          <div class="card-body">
            <h5 class="card-title t-color"><?php echo $value->juryName;?></h5>
            <p class="card-text"><?php echo base64_decode($value->juryContent);?></p>
          </div>
        </div>
        
                <?php
                }  

                ?>

    </div>
   </div>
</div>
</section> 
<section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi subscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>
     
      <div class="container-fluid">
        <div class="row g-0">
           <?php

      $data = json_decode($images_data->galleryImage);
       
      if(count($data)>0)
      {
        foreach($data as $key => $value) 
        {
            ?>
            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?php echo base_url();?>uploads/galleryImage/<?php echo $value?>" class="galelry-lightbox">
                <img src="<?php echo base_url();?>uploads/galleryImage/<?php echo $value?>" alt="" class="img-fluid galleryimage">
              </a>
            </div>
          </div>
          <?php
        }
      }
      
      ?>
          

        </div>

      </div>
    </section><!-- End Gallery Section -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="text/javascript">
            //DatePicker
            $( document ).ready(function() {
            $( "#dob" ).datepicker({
             autoclose: true,
            endDate: new Date(),
            todayHighlight: true 
            }).datepicker('update', new Date()).val("");
            });
    




            $("#leadForm").on('submit', function(e) {
            e.preventDefault();

            var contactForm = $(this);

            $.ajax({
                url: contactForm.attr('action'),
                type: 'post',
                data: contactForm.serialize(),
                success: function(response){

                   if(response.status == 'error')
                    {
                       if(response.name_err != ''){
                          $("#name_err").html(response.name_err);
                       }else{
                        $("#name_err").html('');
                       }

                       if(response.email_err != ''){
                        $("#email_err").html(response.email_err);
                       }else{
                        $("#email_err").html('');
                       }

                       if(response.mobile_err != ''){
                        $("#mobile_err").html(response.mobile_err);
                       }else{
                        $("#mobile_err").html('');
                       }
                      
                        if(response.dob_err != ''){
                        $("#dob_err").html(response.dob_err);
                       }else{
                        $("#dob_err").html('');
                       }

                    }

                    if(response.status == 'success') {
                      
                      $("#success").html(response.message);
                      $("#name_err").html('');
                      $("#email_err").html('');
                      $("#mobile_err").html('');
                      $("#dob_err").html('');
                      $("#leadForm")[0].reset();
                    }

                    $("#leadForm").attr('disabled', false);
                }
            });
        }); 



            setInterval(function(){ $('h5').hide();},7000);
    </script>
 