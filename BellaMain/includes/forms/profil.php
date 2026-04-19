
<div class="modal fade pzr-modal" tabindex="-1" id="modal-profil-edit">
   <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content rounded">
				<div id="dashprofil"></div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){

$(document).on('click', '#editProfil', function(e){

   e.preventDefault();

   var uid = $(this).data('id');   // it will get id of clicked row

   $('#dashprofil').html(''); // leave it blank before ajax call
   $('#modal-loader').show();      // load ajax loader

   $.ajax({
      url: 'includes/editforms/editprofil.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
   })
   .done(function(data){
      console.log(data);	
      $('#dashprofil').html('');    
      $('#dashprofil').html(data); // load response 
      $('#modal-loader').hide();		  // hide ajax loader	
   })
   .fail(function(){
      $('#dashprofil').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
   });

});

});
</script>