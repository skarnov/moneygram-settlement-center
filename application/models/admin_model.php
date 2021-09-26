<?php

class Admin_Model extends CI_Model {

    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('email', $data['email']);
        $this->db->where('password', ($data['password']));
        $this->db->where('status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function shop_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('email', $data['email']);
        $this->db->where('password', ($data['password']));
        $this->db->where('status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function check_password($data)
    {
        $sql="select * from tbl_admin where admin_email='$data'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
}