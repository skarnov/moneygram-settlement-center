<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Evis_app extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL)
        {
            redirect('evis_login', 'refresh');
        }
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Evis App Dashboard';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['all_paid'] = $this->evis_app_model->select_paid_notification();
        $data['all_pending'] = $this->evis_app_model->select_pending_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['balance_info'] = $this->evis_app_model->select_all_balance();
        $data['due_info'] = $this->evis_app_model->select_all_due();
        $data['dashboard'] = $this->load->view('dashboard', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function logout() 
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('name');
        $sdata['exception'] = 'You are successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('evis_login');
    }
    
    public function add_settlement() 
    {
        $data = array();
        $data['title'] = 'Add Settlement';
        $data['all_paid'] = $this->evis_app_model->select_paid_notification();
        $data['all_pending'] = $this->evis_app_model->select_pending_notification();
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('add_settlement', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function save_settlement() 
    {
        $this->form_validation->set_rules('pending', 'Pending', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Pending Can Not Be Negative');
        if ($this->form_validation->run() == False) 
        {
            $data = array();
            $data['title'] = 'Add Settlement';
            $data['all_paid'] = $this->evis_app_model->select_paid_notification();
            $data['all_pending'] = $this->evis_app_model->select_pending_notification();
            $data['all_info'] = $this->evis_app_model->select_all_notification();
            $data['info'] = $this->evis_app_model->select_all_info();
            $data['dashboard'] = $this->load->view('add_settlement', $data, true);
            $this->load->view('admin', $data);
        } 
        else
        {
            $data = array();
            $data['invoice_id'] = $this->input->post('invoice_id', true);
            $data['amount'] = $this->input->post('amount', true);
            $data['did_transfer'] = $this->input->post('did_transfer', true);
            $data['remarks'] = $this->input->post('remarks', true);
            $data['due_date'] = $this->input->post('due_date', true);
            $data['on_date'] = $this->input->post('on_date', true);
            $data['paid'] = $this->input->post('paid', true);
            $data['pending'] = $this->input->post('pending', true);
            $this->evis_app_model->save_settlement_info($data);
            $sdata = array();
            $sdata['message'] = 'Save Settlement Success';
            $this->session->set_userdata($sdata);
            redirect('evis_app/add_settlement');
        }
    }
    
    public function manage_settlement()
    {
        $data = array();
        $data['title'] = 'Manage Settlement';
        $config['base_url'] = base_url() . 'evis_app/manage_settlement/';
        $config['total_rows'] = $this->db->count_all('tbl_settlement');
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
        $data['all_settlement'] = $this->evis_app_model->select_all_settlement($config['per_page'], $this->uri->segment(3));
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('manage_settlement', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function edit_settlement($settlement_id)
    {
        $data = array();
        $data['title'] = 'Edit Settlement';
        $data['all_paid'] = $this->evis_app_model->select_paid_notification();
        $data['all_pending'] = $this->evis_app_model->select_pending_notification();
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['settlement_info'] = $this->evis_app_model->select_settlement_by_id($settlement_id);
        $data['dashboard'] = $this->load->view('edit_settlement', $data, true);
        $sdata = array();
        $sdata['message'] = 'Update settlement information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin', $data);
    }
    
    public function update_settlement()
    {
        $this->form_validation->set_rules('pending', 'Pending', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Pending Can Not Be Negative');
        if ($this->form_validation->run() == False) 
        {
            $sdata = array();
            $sdata['message'] = 'Pending Can Not Be Negative';
            $this->session->set_userdata($sdata);
            redirect('evis_app/manage_settlement');
        } 
        else
        {
            $this->evis_app_model->update_settlement_info();
            redirect('evis_app/manage_settlement');
        }
    }

    public function delete_settlement($settlement_id) 
    {
        $this->evis_app_model->delete_settlement_by_id($settlement_id);
        redirect('evis_app/manage_settlement');
    }
    
    public function settlement_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Settlement Search';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['search_settlement'] = $this->evis_app_model->settlement_search($text);
        $data['dashboard'] = $this->load->view('settlement_search_invoice', $data, true);
        $this->load->view('admin', $data); 
    }
    
    public function settlement_search_time()
    {
        $first_time = $this->input->post('first_time', true);
        $last_time = $this->input->post('last_time', true);
        $data = array();
        $data['title'] = 'Settlement Search';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['amount'] = $this->evis_app_model->select_amount($first_time,$last_time);
        $data['paid'] = $this->evis_app_model->select_paid_amount($first_time,$last_time);
        $data['pending'] = $this->evis_app_model->select_pending($first_time,$last_time);
        $data['search_settlement'] = $this->evis_app_model->settlement_search_by_time($first_time,$last_time);
        $data['dashboard'] = $this->load->view('settlement_search', $data, true);
        $this->load->view('admin', $data); 
    }
    
    public function add_expenditure() 
    {
        $data = array();
        $data['title'] = 'Add Expenditure';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['all_category'] = $this->evis_app_model->select_all_category();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('add_expenditure', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function save_expenditure() 
    {
        $data = array();
        $data['month'] = $this->input->post('month', true);
        $data['day'] = $this->input->post('day', true);
        $data['year'] = $this->input->post('year', true);
        $data['description'] = $this->input->post('description', true);
        $data['amount'] = $this->input->post('amount', true);
        $this->evis_app_model->save_expenditure_info($data);
        $sdata = array();
        $sdata['message'] = 'Save expenditure Success';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_expenditure');
    }
    
    public function save_category() 
    {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', true);
        $this->evis_app_model->save_category_info($data);
        $sdata = array();
        $sdata['message'] = 'Save category success';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_expenditure');
    }
    
    public function manage_expenditure()
    {
        $data = array();
        $data['title'] = 'Manage Expenditure';
        $config['base_url'] = base_url() . 'evis_app/manage_expenditure/';
        $config['total_rows'] = $this->db->count_all('tbl_expenditure');
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
        $data['all_expenditure'] = $this->evis_app_model->select_all_expenditure($config['per_page'], $this->uri->segment(3));
        $data['all_year'] = $this->evis_app_model->select_all_year();
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('manage_expenditure', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function print_expenditure($month,$year)
    {
        $data = array();
        $data['title'] = 'Expenditure Search';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['all_year'] = $this->evis_app_model->select_all_year();
        $data['amount'] = $this->evis_app_model->select_expenditure_amount($month,$year);
        $data['print_expenditure'] = $this->evis_app_model->expenditure_search_by_time($month,$year);        
        $data['dashboard'] = $this->load->view('print_expenditure', $data, true);
        $this->load->view('print_expenditure', $data); 
    }
    
    public function download_expenditure($month,$year)
    {	
        $data = array();
        $data['title'] = 'Expenditure Search';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['all_year'] = $this->evis_app_model->select_all_year();
        $data['amount'] = $this->evis_app_model->select_expenditure_amount($month,$year);
        $data['search_expenditure'] = $this->evis_app_model->expenditure_search_by_time($month,$year);        
        $this->load->view('download_expenditure', $data); 
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Download Expenditure.pdf");    
    }
    
    public function edit_expenditure($expenditure_id)
    {
        $data = array();
        $data['title'] = 'Edit Expenditure';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['all_category'] = $this->evis_app_model->select_all_category();
        $data['expenditure_info'] = $this->evis_app_model->select_expenditure_by_id($expenditure_id);
        $data['dashboard'] = $this->load->view('edit_expenditure', $data, true);
        $sdata = array();
        $sdata['message'] = 'Update expenditure information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin', $data);
    }
    
    public function update_expenditure()
    {
        $this->evis_app_model->update_expenditure_info();
        redirect('evis_app/manage_expenditure');
    }

    public function delete_expenditure($expenditure_id) 
    {
        $this->evis_app_model->delete_expenditure_by_id($expenditure_id);
        redirect('evis_app/manage_expenditure');
    }
    
    public function expenditure_search()
    {
        $month = $this->input->post('month', true);
        $year = $this->input->post('year', true);
        $data = array();
        $data['title'] = 'Expenditure Search';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['all_year'] = $this->evis_app_model->select_all_year();
        $data['amount'] = $this->evis_app_model->select_expenditure_amount($month,$year);
        $data['search_expenditure'] = $this->evis_app_model->expenditure_search_by_time($month,$year);        
        $data['dashboard'] = $this->load->view('search_expenditure', $data, true);
        $this->load->view('admin', $data); 
    }

    public function manage_category()
    {
        $data = array();
        $data['title'] = 'Manage Category';
        $config['base_url'] = base_url() . 'evis_app/manage_category/';
        $config['total_rows'] = $this->db->count_all('tbl_category');
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
        $data['all_category'] = $this->evis_app_model->select_all_manage_category($config['per_page'], $this->uri->segment(3));
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('manage_category', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function edit_category($category_id)
    {
        $data = array();
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['category_info'] = $this->evis_app_model->select_category_by_id($category_id);
        $data['dashboard'] = $this->load->view('edit_category', $data, true);
        $data['title'] = 'Edit Category';
        $sdata = array();
        $sdata['message'] = 'Update category information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin', $data);
    }
    
    public function update_category()
    {
        $this->evis_app_model->update_category_info();
        redirect('evis_app/manage_category');
    }

    public function delete_category($category_id) 
    {
        $this->evis_app_model->delete_category_by_id($category_id);
        redirect('evis_app/manage_category');
    }
    
    public function add_shop() 
    {
        $data = array();
        $data['title'] = 'Add Shop';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('add_shop', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function save_shop() 
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[conform_password]|xss_clean');
        $this->form_validation->set_rules('conform_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False) 
        {
            $data = array();
            $data['title'] = 'Add Shop';
            $data['all_info'] = $this->evis_app_model->select_all_notification();
            $data['info'] = $this->evis_app_model->select_all_info();
            $data['dashboard'] = $this->load->view('add_shop', $data, true);
            $this->load->view('admin', $data);
        } 
        else
        {
            $data = array();
            $data['name'] = $this->input->post('name', true);
            /**START IMAGE RESIZE**/
            $config['upload_path'] = 'img/shop_image/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10240';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';
            $error = '';
            $fdata = array();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('shop_image')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit();
            } else {
                $fdata = $this->upload->data();
                $up['main'] = $config['upload_path'] . $fdata['file_name'];
            }
            $config['image_library'] = 'gd2';
            $config['new_image'] = 'img/shop_image/';
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
                $index = 'shop_image';
                $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
            }
            /**END IMAGE RESIZE**/
            $data['address'] = $this->input->post('address', true);
            $data['location'] = $this->input->post('location', true);
            $data['mobile_number'] = $this->input->post('mobile_number', true);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = $this->input->post('password', true);
            $data['status'] = $this->input->post('status', true);
            $this->evis_app_model->save_shop_info($data);
            $data['status'] = $this->input->post('status', true);
            if ($data['status'] == '1')
            {
                $sdata = array();
                $sdata['message'] = 'Shop Active';
                $this->session->set_userdata($sdata);
            }
            if ($data['advertise_publication_status'] == '0')
            {
                $sdata = array();
                $sdata['message'] = 'Shop Info Saved';
                $this->session->set_userdata($sdata);
            }
            redirect('evis_app/add_shop');
        }
    }
    
    public function manage_shop()
    {
        $data = array();
        $data['title'] = 'Manage Shop';
        $config['base_url'] = base_url() . 'evis_app/manage_shop/';
        $config['total_rows'] = $this->db->count_all('tbl_shop');
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
        $data['all_shop'] = $this->evis_app_model->select_all_shop($config['per_page'], $this->uri->segment(3));
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('manage_shop', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function view_shop($shop_id) 
    {        
        $data = array();
        $data['title'] = 'View Shop';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['shop_info'] = $this->evis_app_model->select_shop_by_id($shop_id);
        $data['dashboard'] = $this->load->view('shop_profile', $data, true);
        $this->load->view('admin', $data);
    }

    public function deactive_shop($shop_id)
    {
        $this->evis_app_model->deactive_shop_by_id($shop_id);
        redirect('evis_app/manage_shop');
    }

    public function active_shop($shop_id)
    {
        $this->evis_app_model->active_shop_by_id($shop_id);
        redirect('evis_app/manage_shop');
    }

    public function edit_shop($shop_id)
    {
        $data = array();
        $data['title'] = 'Edit Shop';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['shop_info'] = $this->evis_app_model->select_shop_by_id($shop_id);
        $data['dashboard'] = $this->load->view('edit_shop', $data, true);
        $sdata = array();
        $sdata['message'] = 'Update shop information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin', $data);
    }
    
    public function update_shop()
    {
        $this->evis_app_model->update_shop_info();
        redirect('evis_app/manage_shop');
    }

    public function delete_shop($shop_id) 
    {
        $this->evis_app_model->delete_shop_by_id($shop_id);
        redirect('evis_app/manage_shop');
    }
    
    public function view_location($shop_id)
    {
        $data = array();
        $data['title'] = 'View Shop Location';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['shop_info'] = $this->evis_app_model->select_shop_by_id($shop_id);
        $data['dashboard'] = $this->load->view('view_location', $data, true);
        $this->load->view('admin', $data);
    }

    public function manage_transection()
    {
        $data = array();
        $data['title'] = 'Manage Shop';
        $config['base_url'] = base_url() . 'evis_app/manage_transection/';
        $config['total_rows'] = $this->db->count_all('tbl_shop');
        $config['per_page'] = '5';
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
        $data['all_shop'] = $this->evis_app_model->select_all_shop($config['per_page'], $this->uri->segment(3));
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('manage_transection', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function view_transection($shop_id = null, $start = null)
    {
	$data = array();
        $data['title'] = 'All Transection';
        if(!$start)
        {
            $start=0;
        }
        $data['start']= $start;
        $data['limit']= 5;
        $data['total_product'] = count($this->evis_app_model->select_pagination($shop_id, '', ''));
        $data['category_product'] = $this->evis_app_model->select_pagination($shop_id, $start, $data['limit']);
        $data['this_page'] = count($data['category_product']);
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('admin_shopper_transection', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function view_admin_transection($transection_id)
    {
        $data = array();
        $data['title'] = 'Manage Transection';
        $data['transection_info'] = $this->evis_app_model->select_transection_by_id($transection_id);
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('view_transection', $data, true);
        $this->load->view('admin', $data);
    }

    public function edit_transection($transection_id,$shop_id)
    {
        $data = array();
        $data['title'] = 'Edit Transection';
        $data['shop_info'] = $this->evis_app_model->select_shop_by_id($shop_id);
        $data['transection_info'] = $this->evis_app_model->select_transection_by_id($transection_id);
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('edit_transection', $data, true);
        $sdata = array();
        $sdata['message'] = 'Update transection information successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin', $data);
    }
    
    public function update_transection()
    {
        $this->evis_app_model->update_transection_info();
        redirect('evis_app/manage_transection');
    }

    public function delete_transection($transection_id) 
    {
        $this->evis_app_model->delete_transection_by_id($transection_id);
        redirect('evis_app/manage_transection');
    }
    
    public function transection_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Transection Search';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['search_transection'] = $this->evis_app_model->admin_search_transection($text);
        $data['dashboard'] = $this->load->view('transection_search', $data, true);
        $this->load->view('admin', $data); 
    }
    
    public function transection_search_time()
    {
        $first_time = $this->input->post('first_time', true);
        $last_time = $this->input->post('last_time', true);
        $data = array();
        $data['title'] = 'Transection Search';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['search_transection'] = $this->evis_app_model->admin_search_transection_by_time($first_time,$last_time);
        $data['send'] = $this->evis_app_model->select_send($first_time,$last_time);
        $data['received'] = $this->evis_app_model->select_received($first_time,$last_time);
        $data['deposit'] = $this->evis_app_model->select_deposit($first_time,$last_time);
        $data['transfer'] = $this->evis_app_model->select_transfer($first_time,$last_time);
        $data['cancelled'] = $this->evis_app_model->select_cancelled($first_time,$last_time);
        $data['mg'] = $this->evis_app_model->select_mg($first_time,$last_time);
        $data['paid'] = $this->evis_app_model->select_paid($first_time,$last_time);
        $data['multibank'] = $this->evis_app_model->select_multibank($first_time,$last_time);
        $data['dashboard'] = $this->load->view('time_transection_search', $data, true);
        $this->load->view('shop_admin', $data); 
    }
    
    public function mailbox() 
    {   
        $data = array();   
        $data['title'] = 'Mailbox';
        $config['base_url'] = base_url() . 'evis_app/mailbox/';
        $config['total_rows'] = $this->db->count_all('tbl_message');
        $config['per_page'] = '12';
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
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['shop_info'] = $this->evis_app_model->select_all_edit_shop();
        $data['inbox'] = $this->evis_app_model->select_all_mail($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin_mailbox', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function all_message()
    {
        $data = array();
        $data['title'] = 'View All Message';
        $config['base_url'] = base_url() . 'evis_app/mailbox/';
        $config['total_rows'] = $this->db->count_all('tbl_message');
        $config['per_page'] = '12';
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
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['all_message'] = $this->evis_app_model->select_all_mail($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('all_message', $data, true);
        $this->load->view('admin', $data);
    }

    public function save_mail() 
    {
        $data = array();
        $data['shop_id'] = $this->input->post('shop_id', true);
        $data['subject'] = $this->input->post('subject', true);
        $data['message'] = $this->input->post('message', true);
        $this->evis_app_model->save_mail_info($data);
        $sdata = array();
        $sdata['message'] = 'Mail Send';
        $this->session->set_userdata($sdata);
        redirect('evis_app/mailbox');
    }
    
    public function shop_mailbox($shop_id) 
    {   
        $data = array();   
        $data['title'] = 'Shop Mailbox';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['inbox'] = $this->evis_app_model->select_shop_mail($shop_id);
        $data['select_shop'] = $this->evis_app_model->select_shop_by_id($shop_id);
        $data['shop_info'] = $this->evis_app_model->select_all_edit_shop();
        $data['dashboard'] = $this->load->view('shop_mailbox', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function mail_details($message_id) 
    {        
        $data = array();
        $data['title'] = 'Mail Details';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['message_info'] = $this->evis_shop_model->select_message_by_id($message_id);
        $data['dashboard'] = $this->load->view('admin_mail_details', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function delete_mail($message_id)
    {
        $this->evis_app_model->delete_message_by_id($message_id);
        redirect('evis_app/mailbox');
    }
        
    public function reply_mail($message_id) 
    {        
        $data = array();  
        $data['title'] = 'Reply Mail';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['message_info'] = $this->evis_shop_model->select_message_by_id($message_id);
        $data['dashboard'] = $this->load->view('reply_mail_details', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function save_reply() 
    {             
        $this->evis_app_model->save_reply_info();
        $sdata = array();
        $sdata['message'] = 'Reply Success';
        $this->session->set_userdata($sdata);
        redirect('evis_app/mailbox');
    }
    
    public function all_notification()
    {
        $data = array();
        $data['title'] = 'All Notification';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['all_notification'] = $this->evis_app_model->select_notification();
        $data['dashboard'] = $this->load->view('all_notification', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function show_notification($notification_id)
    {
        $this->evis_app_model->show_notification($notification_id);
        redirect('evis_app');
    }

    public function delete_notification($transection_id) 
    {
        $this->evis_app_model->delete_notification_by_id($transection_id);
        redirect('evis_app/all_notification');
    }
    
    public function profile() 
    {   
        $admin_id = $this->session->userdata('admin_id');
        $data = array();
        $data['title'] = 'Admin Profile';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['admin_info'] = $this->evis_app_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('admin_profile', $data, true);
        $this->load->view('admin', $data);
    }
    
    public function update_admin()
    {
        $this->evis_app_model->update_admin_info();
        $sdata = array();
        $sdata['message'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        redirect('evis_app/profile');
    }

    public function about() 
    {
        $data = array();
        $data['title'] = 'About';
        $data['all_info'] = $this->evis_app_model->select_all_notification();
        $data['info'] = $this->evis_app_model->select_all_info();
        $data['dashboard'] = $this->load->view('about', $data, true);
        $this->load->view('admin', $data);
    }
}