<style type="text/css">
    .flashmsg-success{
    font-family:georgia,garamond,serif;
    font-size:20px;
    font-style:italic;
    color:green;
    margin-top:20px;
    }
</style>
<?php if ($this->session->flashdata()) { ?>
    <?php if($this->session->flashdata('msg')): ?>
    <p class="flashmsg-success"><?php echo $this->session->flashdata('msg'); ?></p>
    <?php endif;
}?>
<div class="row">
<form name="add_lineitem" method="POST" action="<?= base_url(); ?>lineitems/addinvoice">
<div>
<label>Invoice Number</label>
<select class="form-control" name="invoice_number" id="invoice_number" required>
<option value="">Please select Invoice Number</option>
<?php foreach($invoice as $row):?>
<option value="<?php echo $row->id;?>"><?php echo $row->invoice_no;?></option>
<?php endforeach;?>
</select>
</div><br>
<div id="invoice_items" style="margin-top:50px;"></div>
</div>
<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> 
</form>

<script>
   $(function(){ 
   $("#invoice_number").change(function(e){
      e.preventDefault();  
      var invoice_id = $('#invoice_number').val(); 
        $.ajax({
        url: '<?=base_url().'lineitems/getinvoicelist';?>',
        data: {'invoice_id': invoice_id}, 
        type: "post",
        success: function(data){
        $('#invoice_items').html(data);
        }
      });
   });
 });

   $("#submit").click(function(e){
     e.preventDefault(); 
     var invoice_id =  $('#invoice_number').val();
      var discount = $('#discount').val();
      if(discount =='') {
        alert('Please Enter Discount');
        return false;
      }
    var subtotal_with_tax = $('#subtotal_tax').text(); 
    var subtotal_without_tax = $('#subtotal_without_tax').text(); 
    var discount_amount = parseFloat(subtotal_with_tax * 20/100);
    if(discount!=''){
        var total =  parseFloat(subtotal_with_tax - discount_amount);
    }else{
        var total =  parseFloat(subtotal_with_tax);
    }
    var url = '<?=base_url().'lineitems/invoiceList';?>'
    $('#total').text(total);
        $.ajax({
        url: '<?=base_url().'lineitems/addinvoice';?>',
        data: {'discount': discount,'subtotal_with_tax':subtotal_with_tax,'discount_amount':discount_amount,'total':total,'invoice_id':invoice_id}, 
        type: "post",
        success: function(data){
        if(data == 1){
           window.location.href='<?=base_url().'lineitems/invoicelist';?>';
        }
        }
    });
   });
</script>
