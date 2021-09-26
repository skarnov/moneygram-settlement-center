<?php

class Evis_shop_model extends CI_Model {

    public function save_transection_info($data)
    {
        $this->db->insert('tbl_transection',$data);
    }

    public function select_all_transection($per_page, $offset)
    {
        $shop = $this->session->userdata('shop_id');
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_shop AS p,tbl_transection AS t WHERE p.shop_id=t.shop_id AND p.shop_id=$shop ORDER BY transection_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
  
    public function search_transection($text, $shop_id)
    {	
        $sql = "SELECT * FROM tbl_transection WHERE transection_id LIKE '%$text%' AND shop_id LIKE '%$shop_id%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function search_transection_by_time($first_time,$last_time,$shop_id)
    {	
        $sql = "SELECT * FROM tbl_transection WHERE shop_id='$shop_id' AND (time BETWEEN '$first_time' AND '$last_time') ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_balance()
    {
        $sql = "SELECT * FROM tbl_transection ORDER BY transection_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_send($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(send) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_received($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(received) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_deposit($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(deposit) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_transfer($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(transfer) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_cancelled($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(cancelled) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_mg($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(MG_gave_in_cash) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_paid($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(paid_in_cash) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_multibank($first_time,$last_time,$shop_id)
    {
        $sql = "SELECT sum(multibank) as total FROM tbl_transection where shop_id='$shop_id' AND time BETWEEN '$first_time' AND '$last_time' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_message_by_id($message_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('message_id',$message_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

    public function select_shop_inbox_by_id($shop_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('shop_id',$shop_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function select_all_message_info($shop_id)
    {
        $sql = "SELECT COUNT(*) AS notification FROM tbl_message WHERE show_status='0' AND shop_id='$shop_id' ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }

    public function select_all_notification($shop_id)
    {  
        $sql = "SELECT * FROM tbl_message WHERE shop_id='$shop_id' AND show_status='0' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function show_notification($message_id)
    {
        $this->db->set('show_status',1);
        $this->db->where('message_id',$message_id);
        $this->db->update('tbl_message');
    }
     
    public function save_notification_info()
    {
        $data=array();
        $data['reference_id']= $this->input->post('balance', true);
        if($data['reference_id']==!NULL)
        {
            $data['notification_name'] = $this->session->userdata('name');
            $data['reference_id']= $this->input->post('balance', true);
            $this->db->insert('tbl_notification',$data);
        }
        $data['reference_id']= $this->input->post('subject', true);
        if($data['reference_id']==!NULL)
        {
            $data['notification_name'] = $this->session->userdata('name');
            $data['reference_id']= 'send a message';
            $this->db->insert('tbl_notification',$data);
        }
    }
        
    public function check_change_password()
    {
        $data=array();
        $data['password'] = $this->input->post('new_password', true);
        $shop_id = $this->input->post('shop_id', true);
        $current_password=$this->input->post('current_password', true);
        $this->db->where('password',$current_password);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop',$data);
    }
}