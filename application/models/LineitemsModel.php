<?php
class LineitemsModel extends CI_Model{
    public function add_user($data){
        return $this->db->insert('users', $data);
    }
    public function get_invoice(){
        $row = $this->db->select("invoice_no")->limit(1)->order_by('id',"DESC")->get("invoice")->row(); 
        return $row;
    }
    public function get_invoice_list(){

        $query = $this->db->get('invoice');
        return $query;
    }
    public function get_invoiceitems($id){
        $result = $this->db->select('*')->from('line_items')->where('invoice_id',$id)->get()->result();
        return $result;
    }

    public function upddata($data) {
        $this->db->where('id', $data['id']);
        $result = $this->db->update('invoice', $data);
    }

 }