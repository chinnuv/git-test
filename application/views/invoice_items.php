
<div class="table" id="invoice-table" width="500px;">
<table class="table table-bordered">
  <tr>
    <th>Sl.No</th>
    <th>Name</th>
    <th>Quantity</th>
    <th>Unit Price($)</th>
    <th>Tax</th>
    <th>Total</th>
    <th>Total With Tax</th>
  </tr>
  <?php 
  $subtotal_with_tax  = 0 ; 
  $subtotal_without_tax  = 0 ; 
  $i = 1; 
  foreach ($invoice_items as $key => $value) {
    $salestax_percentage = $value->item_total * ($value->tax / 100);
    $totalamount_withtax = $value->item_total + $salestax_percentage;
    $subtotal_with_tax = $totalamount_withtax + $subtotal_with_tax;
    $subtotal_without_tax = $value->item_total + $subtotal_without_tax;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $value->name; ?></td>
    <td><?php echo $value->quantity; ?></td>
    <td><?php echo $value->unit_price; ?></td>
    <td><?php echo $value->tax; ?>%</td>
    <td><?php echo $value->item_total; ?></td>
    <td><?php echo $totalamount_withtax; ?></td>
   
  </tr>
<?php $i++;} ?>
  <tr>
    <td colspan="7"></td>
  <tr>
    <tr>
    <td colspan="6" style="text-align:right">Subtotal(without Tax)</td>
    <td id="subtotal_without_tax"><?php echo $subtotal_without_tax ?></td>
  <tr>
    <td colspan="6" style="text-align:right">Discount %</td>
    <td><input type="text" name="discount" placeholder="Enter Discount" id="discount" class="form-control discount" required="" /></td>
  <tr>
    <tr>
    <td colspan="6" style="text-align:right">Subtotal(with Tax)</td>
    <td id="subtotal_tax"><?php echo $subtotal_with_tax ?></td>
  <tr>
  <tr class="total-discount" style="display:none;">
    <td colspan="6" style="text-align:right">Total</td>
    <td id="total"></td>
  <tr>
 </tr>
</table>
</div>
<script>
  $('#discount').blur(function(e){
      var discount = $('#discount').val(); 
      var subtotal_with_tax = $('#subtotal_tax').text(); 
      var discountval = parseFloat(subtotal_with_tax * 20/100);
      var total =  parseFloat(subtotal_with_tax - discountval);
      $('#total').text(total);
      if(discount!=''){
      $('.total-discount').show();
      }else{
      $('.total-discount').hide();
      }
   });     
</script>