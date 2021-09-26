<?php

class Evis_app_model extends CI_Model {

    public function save_shop_info($data)
    {
        $this->db->insert('tbl_shop',$data);
    }

    public function select_all_shop($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_shop LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_shop_by_id($shop_id)
    {
        $this->db->set('status',0);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop');
    }
    
    public function active_shop_by_id($shop_id)
    {
        $this->db->set('status',1);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop');
    }
    
    public function select_all_edit_shop()
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_shop_by_id($shop_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_id',$shop_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_shop_info()
    {
        $data=array();
        $data['name'] = $this->input->post('name', true);
        $data['address'] = $this->input->post('address', true);
        $data['location'] = $this->input->post('location', true);
        $data['mobile_number'] = $this->input->post('mobile_number', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['status'] = $this->input->post('status', true);
        $shop_id=$this->input->post('shop_id',true);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop',$data);
    }
    
    public function delete_shop_by_id($shop_id)
    {
        $this->db->where('shop_id',$shop_id);
        $this->db->delete('tbl_shop');
    }
    
    public function save_settlement_info($data)
    {
        $this->db->insert('tbl_settlement',$data);
    }
    
    public function select_all_settlement($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_settlement LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_settlement_by_id($settlement_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_settlement');
        $this->db->where('settlement_id',$settlement_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_settlement_info()
    {
        $data=array();
        $data['invoice_id'] = $this->input->post('invoice_id', true);
        $data['amount'] = $this->input->post('amount', true);
        $data['did_transfer'] = $this->input->post('did_transfer', true);
        $data['remarks'] = $this->input->post('remarks', true);
        $data['due_date'] = $this->input->post('due_date', true);
        $data['on_date'] = $this->input->post('on_date', true);
        $data['paid'] = $this->input->post('paid', true);
        $data['pending'] = $this->input->post('pending', true);
        $settlement_id=$this->input->post('settlement_id',true);
        $this->db->where('settlement_id',$settlement_id);
        $this->db->update('tbl_settlement',$data);
    }
    
    public function delete_settlement_by_id($settlement_id)
    {
        $this->db->where('settlement_id',$settlement_id);
        $this->db->delete('tbl_settlement');
    }
    
    public function save_expenditure_info($data)
    {
        $this->db->insert('tbl_expenditure',$data);
    }
    
    public function save_category_info($data)
    {
        $this->db->insert('tbl_category',$data);
    }
    
	public function select_all_year()
    {
        $this->db->select('*');
        $this->db->from('tbl_expenditure');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
	
    public function select_all_expenditure($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_expenditure LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_expenditure_by_id($expenditure_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_expenditure');
        $this->db->where('expenditure_id',$expenditure_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_expenditure_info()
    {
        $data=array();
        $data['month'] = $this->input->post('month', true);
        $data['day'] = $this->input->post('day', true);
        $data['year'] = $this->input->post('year', true);
        $data['description'] = $this->input->post('description', true);
        $data['amount'] = $this->input->post('amount', true);
        $expenditure_id=$this->input->post('expenditure_id',true);
        $this->db->where('expenditure_id',$expenditure_id);
        $this->db->update('tbl_expenditure',$data);
    }
    
    public function delete_expenditure_by_id($expenditure_id)
    {
        $this->db->where('expenditure_id',$expenditure_id);
        $this->db->delete('tbl_expenditure');
    }
    
    public function select_all_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_manage_category($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_category LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_category_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
    
    public function select_all_transection($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_shop AS p,tbl_transection AS t WHERE p.shop_id=t.shop_id LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_edit_transection()
    {
        $this->db->select('*');
        $this->db->from('tbl_transection');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function select_transection_by_id($transection_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transection');
        $this->db->where('transection_id',$transection_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_transection_info()
    {
        $data=array();
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
        $transection_id=$this->input->post('transection_id',true);
        $this->db->where('transection_id',$transection_id);
        $this->db->update('tbl_transection',$data);
    }
    
    public function delete_transection_by_id($transection_id)
    {
        $this->db->where('transection_id',$transection_id);
        $this->db->delete('tbl_transection');
    }
    
    public function update_shop_balance($shop_id)
    {
        $data=array();
        $data['due'] = $this->input->post('balance', true);
        if($data['due'] < 0)
        {
            $data['due'] = $this->input->post('balance', true);
            $data['balance'] = 0.00;
            $this->db->where('shop_id',$shop_id);
            $this->db->update('tbl_shop',$data);
        }
        else
        {
            $data['balance'] = $this->input->post('balance', true);
            $data['due'] = 0.00;
            $this->db->where('shop_id',$shop_id);
            $this->db->update('tbl_shop',$data);
        } 
    }
    
    public function select_balance($shop_id)
    {
        $sql = "SELECT * FROM tbl_transection WHERE shop_id='$shop_id' ORDER BY transection_id DESC LIMIT 1";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }

    public function select_transection_by_shop_id($shop_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transection');
        $this->db->where('shop_id',$shop_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_pagination($shop_id = null, $start = null, $limit=null)
    {
        $sql = "SELECT * ". "FROM tbl_transection AS p WHERE p.shop_id = $shop_id ";
        if ($shop_id) 
        {
            $sql .= "AND p.shop_id = $shop_id ";
        }
        if ($limit != '' && $start >= 0) 
        {
            $sql .= "ORDER BY transection_id DESC LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function admin_search_transection($text)
    {	
        $sql = "SELECT * FROM tbl_transection WHERE transection_id LIKE '%$text%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function settlement_search($text)
    {	
        $sql = "SELECT * FROM tbl_settlement WHERE invoice_id LIKE '%$text%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function settlement_search_by_time($first_time,$last_time)
    {	
        $sql = "SELECT * FROM tbl_settlement WHERE (due_date BETWEEN '$first_time' AND '$last_time') ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function expenditure_search_by_time($month,$year)
    {	
        $sql = "SELECT * FROM tbl_expenditure WHERE month LIKE '%$month%' AND year LIKE '%$year%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
     public function select_expenditure_amount($month,$year)
    {
        $sql = "SELECT sum(amount) as total FROM tbl_expenditure WHERE month LIKE '%$month%' AND year LIKE '%$year%' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }

    public function select_amount($first_time,$last_time)
    {
        $sql = "SELECT sum(amount) as total FROM tbl_settlement WHERE due_date BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_paid_amount($first_time,$last_time)
    {
        $sql = "SELECT sum(paid) as total FROM tbl_settlement WHERE due_date BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_pending($first_time,$last_time)
    {
        $sql = "SELECT sum(pending) as total FROM tbl_settlement WHERE due_date BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
      
    public function admin_search_transection_by_time($first_time,$last_time)
    {	
        $sql = "SELECT * FROM tbl_transection WHERE (time BETWEEN '$first_time' AND '$last_time') ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_send($first_time,$last_time)
    {
        $sql = "SELECT sum(send) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_received($first_time,$last_time)
    {
        $sql = "SELECT sum(received) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_deposit($first_time,$last_time)
    {
        $sql = "SELECT sum(deposit) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_transfer($first_time,$last_time)
    {
        $sql = "SELECT sum(transfer) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_cancelled($first_time,$last_time)
    {
        $sql = "SELECT sum(cancelled) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_mg($first_time,$last_time)
    {
        $sql = "SELECT sum(MG_gave_in_cash) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_paid($first_time,$last_time)
    {
        $sql = "SELECT sum(paid_in_cash) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_multibank($first_time,$last_time)
    {
        $sql = "SELECT sum(multibank) as total FROM tbl_transection WHERE time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_all_balance()
    {
        $sql = "SELECT sum(balance) AS modhu FROM tbl_shop ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_all_due()
    {
        $sql = "SELECT sum(due) AS modhu FROM tbl_shop ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function save_mail_info($data)
    {
        $this->db->insert('tbl_message',$data);
    }

    public function select_all_mail($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_message AS m,tbl_shop AS s WHERE m.shop_id=s.shop_id LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_shop_mail($shop_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('shop_id',$shop_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_reply_info()
    {
        $data=array();
        $data['subject'] = $this->input->post('subject', true);
        $data['message'] = $this->input->post('message', true);
        $message_id=$this->input->post('message_id',true);
        $this->db->where('message_id',$message_id);
        $this->db->update('tbl_message',$data);
    }
    
    public function delete_message_by_id($message_id)
    {
        $this->db->where('message_id',$message_id);
        $this->db->delete('tbl_message');
    }
    
    public function select_all_notification()
    {
        $this->db->select('*');
        $this->db->from('tbl_notification');
        $this->db->where('show_status',0);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function delete_notification_by_id($notification_id)
    {
        $this->db->where('notification_id',$notification_id);
        $this->db->delete('tbl_notification');
    }

    public function show_notification($notification_id)
    {
        $this->db->set('show_status',1);
        $this->db->where('notification_id',$notification_id);
        $this->db->update('tbl_notification');
    }
    
    public function select_pending_notification()
    {
        $sql = "SELECT sum(pending) AS modhu FROM tbl_settlement ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_paid_notification()
    {
        $sql = "SELECT sum(paid) AS modhu FROM tbl_settlement ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_all_info()
    {
        $sql = "SELECT COUNT(*) AS notification FROM tbl_notification WHERE show_status='0' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_notification()
    {
        $this->db->select('*');
        $this->db->from('tbl_notification');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['name'] = $this->input->post('name', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
}