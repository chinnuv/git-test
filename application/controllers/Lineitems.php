<?php

class Lineitems extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
        $this->load->model('LineitemsModel', 'lineitems');
    }

    public function index() {
        $this->load->view('header');
        $data['invoice'] = $this->lineitems->get_invoice_list()->result();
        $this->load->view('lineitems_list',$data);
        $this->load->view('footer');
    }
 
    public function addLineitems() {

        if(!empty($this->input->post())){
        $count =  count($this->input->post('name'));
        $name = $_POST["name"];
        $quantity = $_POST['quantity'];
        $price = $_POST["unit_price"];
        $tax = $_POST['tax'];
        $invoice_number = $this->getInvoiceNumber();
        $invoice_data = array(
            'invoice_no' => $invoice_number
            );
        $last_id = '';
        if(!empty($invoice_data)){
        $data = $this->db->insert('invoice',$invoice_data); 
        $last_id = $this->db->insert_id();
        }
        
        for($i = 0; $i < $count; $i++){ 
            if(!empty($name[$i])){
             $data_value = array(
             'name' =>$name[$i],
             'quantity' => $quantity[$i],
             'unit_price' => $price[$i],
             'item_total' => $quantity[$i]*$price[$i],
             'tax' => $tax[$i],
             'date_time'=> date('Y-m-d H:i:s'),
             'invoice_id' => $last_id
             );
             $this->db->insert('line_items',$data_value);
            }
        }
            $this->session->set_flashdata('msg', 'Items Added Successfully');
            redirect(base_url() . 'lineitems');
        }else{
        $this->load->view('header');
        $this->load->view('lineitems_add');
        $this->load->view('footer'); 
        }
    }

    public function  getInvoiceNumber(){

        $invoice_no = $this->db->select("invoice_no")->limit(1)->order_by('id',"DESC")->get("invoice")->row();
        if($invoice_no->invoice_no) {
                $value2 = $invoice_no->invoice_no;
                $value2 = substr($value2, 10, 13);//separating numeric part
                $value2 = $value2 + 1;//Incrementing numeric part
                $value2 = "INV/19-20/" . sprintf('%03s', $value2);//concatenating incremented value
                $value = $value2; 
         }else {
           
            $value2 = "INV/19-20/001";
            $value = $value2;
        }
       return $value;
  }

  public function getinvoicelist(){
    $invoice_id = $_POST['invoice_id'];
    $data['invoice_items'] = $this->lineitems->get_invoiceitems($invoice_id);
    $data['controller'] = $this; 
    $this->load->view('invoice_items', $data, FALSE);

  }

  public function getTaxPercent($id){
    $row = $this->db->select("tax_percentage")->get("tax")->row(); 
    return $row;
 }

 public function addinvoice(){
     $discount_percentage = $this->input->post('discount');
     $subtotal_with_tax = $this->input->post('subtotal_with_tax');
     $subtotal_without_tax = $this->input->post('subtotal_without_tax');
     $discount_amount = $this->input->post('discount_amount');
     $total = $this->input->post('total');
     $invoice_id = $this->input->post('invoice_id');
     $data_array = array(
        'total' => $total,
        'subtotal_with_tax' => $total,
        'subtotal_without_tax' => $total,
        'discount_percentage' => $total,
        'discount_amount' => $total,
        'id' => $invoice_id,
     );
    $result = $this->lineitems->upddata($data_array);
    $success = 1;
    $this->session->set_flashdata('msg', 'Items Added Successfully');
    echo $success;
   }

   public function invoicelist(){
   $this->load->view('header');
   $data['invoice'] = $this->lineitems->get_invoice_list()->result();
   $this->load->view('invoice_list',$data);
   $this->load->view('footer');
    }
   
}