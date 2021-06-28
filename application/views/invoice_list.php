<div class="table" id="invoice-table" width="500px;">
<table class="table table-bordered">
  <tr>
    <th>Sl.No</th>
    <th>Invoice No</th>
    <th>Discount Percentage</th>
    <th>Discount Amount</th>
    <th>Total Without Tax</th>
    <th>Total With Tax</th>
    <th>Total</th>
  </tr>
  <?php 
  $i = 1; 
  foreach ($invoice as $row) {  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row->invoice_no; ?></td>
    <td><?php echo $row->discount_percentage; ?>%</td>
    <td><?php echo $row->discount_amount; ?></td>
    <td><?php echo $row->subtotal_without_tax; ?>%</td>
    <td><?php echo $row->subtotal_with_tax; ?></td>
    <td><?php echo $row->total; ?></td>
   
  </tr>
<?php $i++;} ?>
</table>
</div>