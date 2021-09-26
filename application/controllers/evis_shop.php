<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Evis_shop extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $shop_id = $this->session->userdata('shop_id');
        if ($shop_id == NULL)
        {
            redirect('evis_login', 'refresh');
        }
    }

    public function index() 
    {
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'Evis Shop';
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['shop_info'] = $this->evis_app_model->select_shop_by_id($shop_id);    
        $data['dashboard'] = $this->load->view('shop', $data, true);
        $this->load->view('shop_admin', $data);
    }

    public function logout() 
    {
        $this->session->unset_userdata('shop_id');
        $this->session->unset_userdata('name');
        $sdata['exception'] = 'You are successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('evis_login');
    }
    
    public function save_transection() 
    {
        $data = array();
        $data['shop_id'] = $this->input->post('shop_id', true);
        $data['balance'] = $this->input->post('balance', true);
        $data['send'] = $this->input->post('send', true);
        $data['received'] = $this->input->post('received', true);
        $data['deposit'] = $this->input->post('deposit', true);
        $data['transfer'] = $this->input->post('transfer', true);
        $data['cancelled'] = $this->input->post('cancelled', true);
        $data['MG_gave_in_cash'] = $this->input->post('MG_gave_in_cash', true);
        $data['paid_in_cash'] = $this->input->post('paid_in_cash', true);
        $data['multibank'] = $this->input->post('multibank', true);
        $data['time'] = $this->input->post('time', true);
        $data['note'] = $this->input->post('note', true);
        /**IF THEY DO NOT SELECT A IMAGE**/
        foreach ($_FILES as $eachFile)
        {
            if ($eachFile['size'] > 0)
            {
        /**START IMAGE RESIZE**/
        $config['upload_path'] = 'img/upload_receipt/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $error = '';
        $fdata = array();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('upload_receipt')) {
            $error = $this->upload->display_errors();
            echo $error;
            exit();
        } else {
            $fdata = $this->upload->data();
            $up['main'] = $config['upload_path'] . $fdata['file_name'];
        }
        $config['image_library'] = 'gd2';
        $config['new_image'] = 'img/upload_receipt/';
        $config['source_image'] = $up['main'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['maintain_ratio'] = true;
        $config['width'] = '270';
        $config['height'] = '329';
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        if (!$this->image_lib->resize()) {
            $error = $this->image_lib->display_errors();
            echo $error;
            exit();
        } else {
            $index = 'upload_receipt';
            $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
        }
        /**END IMAGE RESIZE**/
            }
        }
        /**END OF IF THEY DO NOT SELECT A IMAGE**/
        $shop_id=$this->input->post('shop_id', true);
        $this->evis_app_model->update_shop_balance($shop_id);
        $this->evis_shop_model->save_notification_info();
        $this->evis_shop_model->save_transection_info($data);
        $sdata = array();
        $sdata['message'] = 'Transection Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_shop');
    }
    
    public function manage_transection()
    {
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $config['base_url'] = base_url() . 'evis_shop/manage_transection/';
        $config['total_rows'] = $this->db->count_all('tbl_transection');
        $config['per_page'] = '8';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_transection'] = $this->evis_shop_model->select_all_transection($config['per_page'], $this->uri->segment(3));
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['dashboard'] = $this->load->view('shopper_manage', $data, true);
        $data['title'] = 'Manage Transection';
        $this->load->view('shop_admin', $data);
    }
    
    public function view_transection($transection_id)
    {
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'View Transection';
        $data['transection_info'] = $this->evis_app_model->select_transection_by_id($transection_id);
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['dashboard'] = $this->load->view('view_transection', $data, true);
        $this->load->view('shop_admin', $data);
    }
    
    public function transection_search()
    {
        $text = $this->input->post('text', true);
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'Transection Search';
        $shop_id = $this->session->userdata('shop_id');
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['search_transection'] = $this->evis_shop_model->search_transection($text, $shop_id);
        $data['dashboard'] = $this->load->view('transection_search', $data, true);
        $this->load->view('shop_admin', $data); 
    }
    
    public function transection_search_time()
    {
        $first_time = $this->input->post('first_time', true);
        $last_time = $this->input->post('last_time', true);
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'Transection Search';
        $shop_id = $this->session->userdata('shop_id');
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['search_transection'] = $this->evis_shop_model->search_transection_by_time($first_time,$last_time,$shop_id);
        $data['send'] = $this->evis_shop_model->select_send($first_time,$last_time,$shop_id);
        $data['received'] = $this->evis_shop_model->select_received($first_time,$last_time,$shop_id);
        $data['deposit'] = $this->evis_shop_model->select_deposit($first_time,$last_time,$shop_id);
        $data['transfer'] = $this->evis_shop_model->select_transfer($first_time,$last_time,$shop_id);
        $data['cancelled'] = $this->evis_shop_model->select_cancelled($first_time,$last_time,$shop_id);
        $data['mg'] = $this->evis_shop_model->select_mg($first_time,$last_time,$shop_id);
        $data['paid'] = $this->evis_shop_model->select_paid($first_time,$last_time,$shop_id);
        $data['multibank'] = $this->evis_shop_model->select_multibank($first_time,$last_time,$shop_id);
        $data['dashboard'] = $this->load->view('time_transection_search', $data, true);
        $this->load->view('shop_admin', $data); 
    }

    public function mailbox() 
    {   
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'Mailbox';
        $data['inbox'] = $this->evis_shop_model->select_shop_inbox_by_id($shop_id);
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['dashboard'] = $this->load->view('mailbox', $data, true);
        $this->load->view('shop_admin', $data);
    }
        
    public function mail_details($message_id) 
    {   
        $this->evis_shop_model->show_notification($message_id);
        $data = array();
        $data['title'] = 'Mail Details';
        $shop_id = $this->session->userdata('shop_id');
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['message_info'] = $this->evis_shop_model->select_message_by_id($message_id);
        $data['dashboard'] = $this->load->view('mail_details', $data, true);
        $this->load->view('shop_admin', $data);
    }

    public function save_mail() 
    {
        $data = array();
        $data['shop_id'] = $this->input->post('shop_id', true);
        $data['subject'] = $this->input->post('subject', true);
        $data['message'] = $this->input->post('message', true);
        $this->evis_shop_model->save_notification_info();
        $this->evis_app_model->save_mail_info($data);
        $sdata = array();
        $sdata['message'] = 'Mail Send';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/mailbox');
    }
    
    public function reply_mail($message_id) 
    {        
        $data = array(); 
        $shop_id = $this->session->userdata('shop_id');
        $data['title'] = 'Replay Mail';
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['message_info'] = $this->evis_shop_model->select_message_by_id($message_id);
        $data['dashboard'] = $this->load->view('shop_reply_mail', $data, true);
        $this->load->view('shop_admin', $data);
    }
    
    public function save_reply() 
    {             
        $this->evis_app_model->save_reply_info();
        $sdata = array();
        $sdata['message'] = 'Reply Success';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/mailbox');
    }
    
    public function profile() 
    {        
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'Shop Profile';
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['shop_info'] = $this->evis_app_model->select_shop_by_id($shop_id);
        $data['dashboard'] = $this->load->view('shop_profile', $data, true);
        $this->load->view('shop_admin', $data);
    }
    
    public function change_password()
    {
        $this->form_validation->set_rules('new_password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[conform_password]|xss_clean');
        $this->form_validation->set_rules('conform_password', 'Password Confirmation', 'trim|required');
        if($this->form_validation->run() == False)
        {
            $sdata = array();
            $sdata['message'] = 'Password Did Not Match';
            $this->session->set_userdata($sdata);
            redirect('evis_shop/profile');
        }
        else
        {
            $this->evis_shop_model->check_change_password();
            redirect('evis_shop/success');
        }
    }
    
    public function success() 
    {
        $shop_id = $this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'Success';
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['dashboard'] = $this->load->view('success', $data, true);
        $this->load->view('shop_admin', $data);
    }
    
    public function about() 
    {
        $data = array();
        $data['title'] = 'About';
        $shop_id = $this->session->userdata('shop_id');
        $data['all_info'] = $this->evis_shop_model->select_all_notification($shop_id);
        $data['info'] = $this->evis_shop_model->select_all_message_info($shop_id);
        $data['dashboard'] = $this->load->view('about', $data, true);
        $this->load->view('shop_admin', $data);
    }
}