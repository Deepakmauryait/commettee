<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/kolkata');
//require APPPATH . '/libraries/BaseController.php';


/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Index extends CI_Controller
{
    
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('admin/product_model');
        $this->load->library('base_library');
         $this->load->library('form_validation');
        // Cookie helper
        $this->load->helper('cookie');
        $this->load->model('admin/front_model');
        $this->load->model('admin/jury_model');
        $this->load->model('front/lead_form_model');
     }



    /**
     * Index Page for this controller.
     */
    // Index =============================================================
    public function index()
    {
    
        $data = array();
        // Define =========================== 
        $data["title"]="Customer Support";
        $where = array();
        $where['status'] = 1;
        $where['orderby'] = '-id';
        $fetch_front_model= $this->front_model->findDynamic($where);
        $data['images_data'] =$fetch_front_model[0];

         $where = array();
        $where['status'] = 1;
        $data['jury_data']= $this->jury_model->findDynamic($where);
         
        $data["file"]="front/index";
        $this->load->view('front/header/template',$data,null);
       
    } 



    public function add_leads()
    {              
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('mobile','Mobile','required');
        $this->form_validation->set_rules('dob','Date Of Birth','required'); 
            $form_data  = $this->input->post();

            if($this->form_validation->run() == FALSE)
            { 
                $response = array(
                'status' => 'error',
                'name_err' => form_error('name'),
                'email_err' => form_error('email'),
                'mobile_err' => form_error('mobile'), 
                'dob_err' => form_error('dob')
                );  
            }
            else
            {      

                 
                    $insertData = array();
                    $insertData['l_name']    = $form_data['name'];
                    $insertData['f_name']  = $form_data['fname'];
                    $insertData['l_email']    = $form_data['email'];
                    $insertData['l_mobile']  = $form_data['mobile'];
                    $insertData['l_age']    = $form_data['age'];
                    $insertData['address']  = $form_data['address'];
                    $insertData['qualification']  = $form_data['qualification'];
                    $insertData['marital_status']    = $form_data['mstatus'];
                    $insertData['dob']  = date( "Y-m-d", strtotime($form_data['dob']));
                    $insertData['date_at'] = date("Y-m-d H:i:s");
                    $result = $this->lead_form_model->save($insertData);
                

                    if($result > 0)
                    {
                         $response = array(
                            'status' => 'success',
                            'message' => "<h5 style='color:green;'>Thank You For Contacting Us....</h5>"
                        );
                    }
                    else
                    { 
                        $response = array(
                              'status' => 'error',
                            'message' => "<h5 style='color:red;'>Contacting Us Failed</h5>"
                        );
                    }
                   

                 }    
         
             $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }




    public function cookieupdate()
    {
        $cookiesave = array(
         'name'   => 'Ale-izbaCookie',
         'value'  => '1',
         'expire' =>  time()+86400);

        set_cookie($cookiesave);
        exit;
    } 

}

?>