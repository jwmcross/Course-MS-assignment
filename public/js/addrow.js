$(document).ready(function(){
   $input = $('#row1').clone();
   let rowCount = 1;
   $('#add-row').click(function(e){
       rowCount++;
       $newRow = $input.clone().attr('id','row'+rowCount);
       $newRow.children().children('.delete-row').attr('id','row-number'+rowCount);
       $newRow.children().children('.delete-row').removeClass('d-none');
       $newRow.children('input').attr('value', '');
       $newRow.insertBefore('#add-row');
   });

   $(document).on('click','.delete-row', function(){
       var rowId = $(this).attr('id').replace('row-number','');
       $row = $('#row'+rowId);
       $row.remove();
   });

});
