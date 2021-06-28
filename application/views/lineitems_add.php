<div class="row">
   <h2>Line Item Add</h2>
<div class="form-group">
            <form name="add_lineitem" method="POST" action="<?= base_url(); ?>lineitems/addlineitems">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dynamic_field">
                     <tr class="line-items">
                        <td><input type="text" name="name[]" placeholder="Enter  Name" class="form-control name_list" required="" /></td>
                         <td><input type="text" name="quantity[]" placeholder="Enter Quantity" class="form-control quantity_list" required="" /></td>
                         <td><input type="text" name="unit_price[]" placeholder="Enter Unit Price In $" class="form-control price_list" required="" /></td>
                          <td><select class="form-control" name="tax[]" id="tax" required>
                        <option value="">Please select tax</option>
                        <option value="0">0%</option>
                        <option value="1">1%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                       </select></td>
                       <td><button type="button" namtable table-borderede="add" id="add" class="btn btn-success">Add More</button></td>
                     </tr>
                  </table>
                  <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /> 
                 </div>
               </div>
            </form>
         </div>
      </div>
<script type="text/javascript">
       
         $(document).ready(function(){      
         var i=1;  
         $('#add').click(function(){  
         i++;  
         $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter  Name" class="form-control name_list" required="" /></td><td><input type="text" name="quantity[]" placeholder="Enter Quantity" class="form-control quantity_list" required="" /></td><td><input type="text" name="unit_price[]" placeholder="Enter Unit Price In $" class="form-control price_list" required="" /></td><td><select class="form-control" name="tax[]" id="tax" required><option value="">Please select tax</option><option value="0">0%</option><option value="1">1%</option><option value="5">5%</option><option value="10">10%</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
          });
         $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
         
           });  
         });  
   
</script>