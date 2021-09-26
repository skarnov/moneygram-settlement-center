<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Evis_login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id != NULL)
        {
            redirect('evis_app', 'refresh');
        }
        $shop_id = $this->session->userdata('shop_id');
        if ($shop_id != NULL)
        {
            redirect('evis_shop', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('app_login');
    }

    public function check_admin_login()
    {
        $data = array();
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['type'] = $this->input->post('type', true);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[250]|xss_clean');
        $this->form_validation->set_rules('type', 'Login As?', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Login As');
        if($this->form_validation->run() == False)
        {
            $this->load->view('app_login');
        }
        else
        {
            if($data['type']==1){
                $result = $this->admin_model->shop_login_check($data);
                $sdata = array();
                if ($result)
                {
                    $sdata['shop_id'] = $result->shop_id;
                    $sdata['name'] = $result->name;
                    $this->session->set_userdata($sdata);
                    redirect('evis_shop');
                } 
                else
                {
                    $sdata['exception'] = 'Your Email / Password Invalide !';
                    $this->session->set_userdata($sdata);
                    redirect('evis_login');
                }
            }
            if($data['type']==2){
                $result = $this->admin_model->admin_login_check($data);
                $sdata = array();
                if ($result)
                {
                    $sdata['admin_id'] = $result->admin_id;
                    $sdata['name'] = $result->admin_name;
                    $this->session->set_userdata($sdata);
                    redirect('evis_app');
                } 
                else
                {
                    $sdata['exception'] = 'Your Email / Password Invalide !';
                    $this->session->set_userdata($sdata);
                    redirect('evis_login');
                }
            }
        }
    }
     
    public function forgot_password()
    {
        $data = array();
        $data['title'] = 'Forgot Password';
        $data['homepage'] = $this->load->view('admin/forgot_password', '', true);
        $this->load->view('master', $data);
    }
    
    public function reset_password()
    {
        $data = $this->input->post('admin_email', true);
        $result = $this->admin_model->check_password($data);
        $password = $result->admin_password;
        if ($password)
        {
            $mdata = array();
            $mdata['from_address'] = 'info@mkimportexport.com';
            $mdata['admin_full_name'] = 'MK';
            $mdata['to_address'] = $data;
            $mdata['subject'] = 'MK Forget Password';
            $mdata['customer_password'] = $password;
            $this->mailer_model->forget_password($mdata,'forget_password_email');
            redirect('admin/forgot_password_success');
        }
        else{
            redirect('admin/forgot_password_failed');
        }
    }
    
    public function forgot_password_success()
    {
        $data = array();
        $data['title'] = 'Success';
        $data['homepage'] = $this->load->view('admin/forgot_password_success', '', true);
        $this->load->view('master', $data);
    }
    
    public function forgot_password_failed()
    {
        $data = array();
        $data['title'] = 'Failed';
        $data['homepage'] = $this->load->view('admin/forgot_password_failed', '', true);
        $this->load->view('master', $data);
    }
}