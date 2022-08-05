<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
date_default_timezone_set('Asia/kolkata');

/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Dashboard extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/user_model');
        $this->load->model('admin/admin_model');
        $this->load->model('admin/front_model');
        $this->load->model('admin/jury_model');
        $this->isLoggedIn();

    }
    
    /**
     * This function used to load the first screen of the user
     */

    public function index()
    {
                 
        $userid = $this->session->userdata('userId');

        $data['admin'] = $this->admin_model->find($userid);

      // $data['images_data'] = $this->front_model->get_property_images();

        $where = array();
        $where['status'] = 1;
        $data['images_data'] = $this->front_model->findDynamic($where);

        $where = array();
        $where['status'] = 1;
        $data['jury_data']= $this->jury_model->findDynamic($where);

         
        $data["title"]="Customert Support Dashboardt";
        
    
        $this->loadViews("admin/dashboard", $data , NULL);
 

    }



    public function addnew(){

         $data["title"]="Customert Support Dashboardt";
    
        $this->loadViews("admin/addnew",$data,NULL);
    }
    

    public function jurylist(){

         $data["title"]="Customert Support Dashboardt";
    
        $this->loadViews("admin/jurylist",$data,NULL);
    }


    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if(@$this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->userListingCount($searchText);

            $returns = $this->paginationCompress ( "userListing/", $count, 5 );
            
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Ale-izba : User Listing';
            
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }




    public function ajax_list()
    {

        $list = $this->front_model->get_datatables();
        $data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {


            $selected = ($currentObj->status == 0)?" selected ":"";
            $btn = '<select class="statusBtn" name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1"  >Active</option>';
            $btn .= '<option value="0" '.$selected.' >Inactive</option>';
            $btn .= '</select>';
                 
            $filename = (isset($currentObj->banner) && $currentObj->banner !=='') ? ($currentObj->banner) : ("");
            $filename1 = (isset($currentObj->contentImage) && $currentObj->contentImage !=='') ? ($currentObj->contentImage) : ("");
            

            $textdetail = base64_decode($currentObj->contentText);
            $textdetail = substr($textdetail,0,50);
            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src ="'.base_url().'uploads/banner/'.$filename.'" width="150" alt = "banner"/>';
            $row[] = $currentObj->contentHead;
            $row[] = $textdetail;
            $row[] = '<img src ="'.base_url().'uploads/contentImage/'.$filename1.'" width="150" alt = "contentImage"/>';
             $row[] = $btn;
           
            
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/dashboard/editfrontdata/'.$currentObj->id.'" title="Edit" ><i class="fa fa-pen"></i></a>&nbsp;&nbsp;<a class="btn btn-sm btn-info deletebtn" href="javascript:void();" data-userid="'.$currentObj->id.'" title="Delete" ><i class="fa fa-trash"></i></a>';
            
          

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->front_model->count_all(),
                        "recordsFiltered" => $this->front_model->count_filtered(),
                        "data" => $data,
                );

     //output to json format
        echo json_encode($output);
    }


 
public function jury_ajax_list()
    {

        $list = $this->jury_model->get_datatables();
        $data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {


            $selected = ($currentObj->status == 0)?" selected ":"";
            $btn = '<select class="statusBtn" name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1"  >Active</option>';
            $btn .= '<option value="0" '.$selected.' >Inactive</option>';
            $btn .= '</select>';
                 
            $filename = (isset($currentObj->juryImage) && $currentObj->juryImage !=='') ? ($currentObj->juryImage) : ("");
            

            $jurydetail = base64_decode($currentObj->juryContent);
            $jurydetail = substr($jurydetail,0,50);
            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = '<img src ="'.base_url().'uploads/juryImage/'.$filename.'" width="150" alt = "juryImage"/>';
            $row[] = $currentObj->juryName;
            $row[] = $jurydetail;
            $row[] = $btn;
           
            
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/dashboard/juryeditdata/'.$currentObj->id.'" title="Edit" ><i class="fa fa-pen"></i></a>&nbsp;&nbsp;<a class="btn btn-sm btn-info deletebtn" href="javascript:void();" data-userid="'.$currentObj->id.'" title="Delete" ><i class="fa fa-trash"></i></a>';
            
          

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->jury_model->count_all(),
                        "recordsFiltered" => $this->jury_model->count_filtered(),
                        "data" => $data,
                );

     //output to json format
        echo json_encode($output);
    }






public function editfrontdata($id = NULL){
    $this->isLoggedIn();


    $form_data = $this->input->post(); 
     

         $data = array();
       
        

        if($id == null)
        {
            redirect('admin/index');
        }



        $data['edit_data'] = $this->front_model->find($id);

 
        $data["file"]="admin/edit";
        
        $this->load->view('admin/includes/template',$data,null);

    }



    public function juryeditdata($id = NULL){
        $this->isLoggedIn();

        $form_data = $this->input->post(); 
        
             $data = array();

            if($id == null)
            {
                redirect('admin/index');
            }

             $data['juryedit_data'] = $this->jury_model->find($id);

     
            $data["file"]="admin/juryedit";
            
            $this->load->view('admin/includes/template',$data,null);
        }





    public function delete()
    {
        
        $this->isLoggedIn();

        $delId = $this->input->post('id'); 
        // $form_data  = $this->input->post();
        $result = $this->front_model->delete($delId); 
       

        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }

       
    }

    function jurydelete()
    {
        
        $this->isLoggedIn();

        $delId = $this->input->post('id'); 
        // $form_data  = $this->input->post();
        $result = $this->jury_model->delete($delId); 
       

        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }

       
    }

   
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */

    function addnewtemp(){
  

                $form_data  = $this->input->post();

 

                 if(isset($_FILES['banner']['name']) && $_FILES['banner']['name'] != '') {

                            $f_name         =$_FILES['banner']['name'];
                            $f_tmp          =$_FILES['banner']['tmp_name'];
                            $f_size         =$_FILES['banner']['size'];
                            $f_extension    =explode('.',$f_name);
                            $f_extension    =strtolower(end($f_extension));
                            $f_newfile      =uniqid().'.'.$f_extension;
                            $store          ="uploads/banner/".$f_newfile;
                        
                            if(!move_uploaded_file($f_tmp,$store))
                            {
                                $this->session->set_flashdata('error', 'banner not Added');
                            }
                            else
                            {
                               $insertData['banner'] = $f_newfile;
                               
                            }
                         }



                    if (empty($_FILES['contentImage']['name']))
                    {
                        $this->form_validation->set_rules('contentImage', 'Content Image', 'required');
                    }
                    else
                    {
                        if(isset($_FILES['contentImage']['name']) && $_FILES['contentImage']['name'] != '') {

                            $f_name         =$_FILES['contentImage']['name'];
                            $f_tmp          =$_FILES['contentImage']['tmp_name'];
                            $f_size         =$_FILES['contentImage']['size'];
                            $f_extension    =explode('.',$f_name);
                            $f_extension    =strtolower(end($f_extension));
                            $f_newfile      =uniqid().'.'.$f_extension;
                            $store          ="uploads/contentImage/".$f_newfile;
                        
                            if(!move_uploaded_file($f_tmp,$store))
                            {
                               $this->session->set_flashdata('error', 'Content image not Added');
                            }
                            else
                            {
                               $insertData['contentImage'] = $f_newfile;
                               
                            }
                         }
                    }




 
                        $countfiles = count($_FILES['galleryImage']['name']);
              
                          $emptyName = array();
                        
                              for($i=0;$i<$countfiles;$i++){
                          
                                if(!empty($_FILES['galleryImage']['name'][$i]))
                                {
                             
                                    $f_name         =$_FILES['galleryImage']['name'][$i];
                                    $f_tmp          =$_FILES['galleryImage']['tmp_name'][$i];
                                    $f_size         =$_FILES['galleryImage']['size'][$i];
                                    $f_extension    =explode('.',$f_name);
                                    $f_extension    =strtolower(end($f_extension));
                                    $f_newfile      =uniqid().'.'.$f_extension;
                                    $store          ="uploads/galleryImage/".$f_newfile;
                                
                                    if(!move_uploaded_file($f_tmp,$store))
                                    {
                                       
                                        $this->session->set_flashdata('error', 'thumb Upload Failed .');
                                    }
                                    else
                                    {
                                        $emptyName[] = $f_newfile;
                                       
                                       
                                    }
                            }
          
                        }
                                
                        
                        $insertData['galleryImage'] = json_encode($emptyName);
 
 

                   
           
                      

                 $insertData['contentHead'] = $form_data['contentHead'];
                 $insertData['contentText'] = base64_encode($form_data['contentText']);
                 $insertData['status'] = $form_data['stattus'];
                 $insertData['date_at'] = date("Y-m-d H:i:s");
                    $result = $this->front_model->save($insertData);
                   
                     
                    if($result > 0)
                    {

                            $insertData  = array();
                            $insertData['status'] = 0;
                            $where = array();
                            $where['id !='] = $result;
                            $status_restult = $this->front_model->update_status($insertData,$where);
                            // print_r($status_restult);


                         $this->session->set_flashdata('success', 'Successfully Submitted .');
                    }
                    else
                    { 
                         $this->session->set_flashdata('error', 'Successfully Not Submitted .');
                         
                    }

                    redirect('admin/dashboard');
           
    }
   
    

    function jurymember(){

         $form_data = $this->input->post();
                

        if(isset($_FILES['juryImage']['name']) && $_FILES['juryImage']['name'] != '') {

            $f_name         =$_FILES['juryImage']['name'];
            $f_tmp          =$_FILES['juryImage']['tmp_name'];
            $f_size         =$_FILES['juryImage']['size'];
            $f_extension    =explode('.',$f_name);
            $f_extension    =strtolower(end($f_extension));
            $f_newfile      =uniqid().'.'.$f_extension;
            $store          ="uploads/juryImage/".$f_newfile;
            
            if(!move_uploaded_file($f_tmp,$store))
            {
                    $this->session->set_flashdata('error', 'juryImage Upload Failed .');
            }
            else
            {
                $insertData['juryImage'] = $f_newfile;
                   
                }
            }

                
            $insertData['juryName'] = $form_data['juryName'];
            $insertData['juryContent'] = base64_encode($form_data['juryContent']);
            $insertData['date_at'] = date("Y-m-d H:i:s");
                    
                    
                $result = $this->jury_model->save($insertData);
                    
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Jury Member Successfully Added');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'Jury Member Not Successfully Added');
                   
                }
                  
                  
                redirect('admin/dashboard/jurylist');
             
    }





     public function update()
    {
        $this->isLoggedIn();

      

         $form_data  = $this->input->post();
        

        $insertData=array();

        $editids = $form_data['id'];

        $insertData['id'] = $form_data['id'];


        if(isset($_FILES['banner']['name']) && $_FILES['banner']['name'] != '') {

                $f_name         =$_FILES['banner']['name'];
                $f_tmp          =$_FILES['banner']['tmp_name'];
                $f_size         =$_FILES['banner']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/banner/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['banner'] = $f_newfile;
                   
                }
             }else{


                $insertData['banner'] =   $form_data['banner_hidden'];

             }
 

             if(isset($_FILES['contentImage']['name']) && $_FILES['contentImage']['name'] != '') {

                $f_name         =$_FILES['contentImage']['name'];
                $f_tmp          =$_FILES['contentImage']['tmp_name'];
                $f_size         =$_FILES['contentImage']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/contentImage/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Image Upload Failed .');
                }
                else
                {
                   $insertData['contentImage'] = $f_newfile;
                   
                }
             }else{


                $insertData['contentImage'] =   $form_data['contentImage_hidden'];

             }
 
        $insertData['contentHead'] = $form_data['contentHead'];
        $insertData['contentText'] = $form_data['contentText'];
        $insertData['updated_by'] = date("Y-m-d H:i:s");
 

        $result = $this->front_model->save($insertData);


          if($result > 0)
            {
                $this->session->set_flashdata('success', 'successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Updation failed');
            }

               redirect('admin/dashboard');
            
          

    }







    public function juryupdate()
    {
        $this->isLoggedIn();

      

         $form_data  = $this->input->post();
        

        $insertData=array();

        $editids = $form_data['id'];

        $insertData['id'] = $form_data['id'];


        if(isset($_FILES['juryImage']['name']) && $_FILES['juryImage']['name'] != '') {

                $f_name         =$_FILES['juryImage']['name'];
                $f_tmp          =$_FILES['juryImage']['tmp_name'];
                $f_size         =$_FILES['juryImage']['size'];
                $f_extension    =explode('.',$f_name);
                $f_extension    =strtolower(end($f_extension));
                $f_newfile      =uniqid().'.'.$f_extension;
                $store          ="uploads/juryImage/".$f_newfile;
            
                if(!move_uploaded_file($f_tmp,$store))
                {
                    $this->session->set_flashdata('error', 'Jury Image Upload Failed .');
                }
                else
                {
                   $insertData['juryImage'] = $f_newfile;
                   
                }
             }else{


                $insertData['juryImage'] =   $form_data['juryImage_hidden'];

             }
  
        $insertData['juryName'] = $form_data['juryName'];
        $insertData['juryContent'] = $form_data['juryContent'];
        $insertData['updated_by'] = date("Y-m-d H:i:s");
 

        $result = $this->jury_model->save($insertData);


          if($result > 0)
            {
                $this->session->set_flashdata('success', 'Jury Data successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Jury Data Updation failed');
            }

               redirect('admin/dashboard/jurylist');
            
          

    }






 


    public function insert_csv_product()
    {

        $this->isLoggedIn();
        $userId  = $this->session->userdata('userId');
        
        $file_data=$_FILES["upload_data_csv"]["tmp_name"];    
        $file = fopen($file_data, "r");
        
        
        $i = 0;           

         while (($column = fgetcsv($file, 10000, ",")) !== FALSE) { 

           if ($i !== 0)
           {

            $data_store = array(); 
            $data_store['date_at'] = (!empty($column[0])) ? (date( "Y-m-d", strtotime($column[0]))) : (date(("Y-m-d")));
            $data_store['contact_name'] = $column[1];
            $data_store['contact_email'] = $column[2];
            $data_store['contact_mobile'] = $column[3];
            $data_store['stage'] = $column[4];
            $data_store['owner'] = $column[5];
            $data_store['lead_source'] = ($column[6] !=='')?$column[6]:'Upload';
            $data_store['labels'] = $column[7];
            $data_store['user_id'] = $userId ;

            $result = $this->contact_agent_model->save($data_store);
        


            } 
     
       
          $i++;
           

     
    
            if ($result > 0) {
            
                $this->session->set_flashdata('success', 'Data Import Successfully');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Data Import Failed');
            }
            // redirect('admin/dashboard');
        }
    }








        public function download_formate_only()
        {
            $content =" \n";

            $filename = 'committe'.date('d-m-Y-h-s').'.csv';
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            print_r($content);
             // redirect(base_url()."admin/dashboard");
            die; 


        }

         function statusChange($id = NULL)
        {
            $this->isLoggedIn();
            if($_POST['id'] == null)
            {
                redirect('admin/dashboard');
            }
            $insertData['id'] = $_POST['id'];
            $insertData['status'] = $_POST['status'];
            $result = $this->front_model->save($insertData);

            echo $result;
        } 


        function jurystatusChange($id = NULL)
        {
            $this->isLoggedIn();
            if($_POST['id'] == null)
            {
                redirect('admin/dashboard');
            }
            $insertData['id'] = $_POST['id'];
            $insertData['status'] = $_POST['status'];
            $result = $this->jury_model->save($insertData);
          echo $result;
        } 


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if(@$this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'Ale-izba : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    
    
    /*
     This function is used to edit the user information
     */
    function editUser()
    {
        if(@$this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            /*$this->form_validation->set_rules('role','Role','trim|required|numeric');*/
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if(@$this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'Ale-izba : Change Password';
        
        $this->loadViews("admin/changePassword", $this->global, NULL, NULL);
    }
    
    
    /*
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
       
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('admin/dashboard/loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                 redirect('admin/dashboard/loadChangePass');
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Ale-izba : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>