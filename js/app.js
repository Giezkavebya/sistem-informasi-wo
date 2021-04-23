jQuery(function()
{		
	// function untuk mengambil semua data
	function getAll()
	{
		$.ajax({
			Url: 'vendor.php',
			Data: 'action=show-all',
			Cache: false,
			success: function(response){
				// jika berhasil 
				$("#container").html(Response);
			}
		});			
	}
	
	getAll(); // load ketika document ready

	// ketika ada event change
	$("#layanan").change(function()
	{				
		var Id = $(this).find(":selected").val();
		var DataString = 'action='+ Id;
				
		$.ajax({
			Url: 'vendor.php',
			Data: DataString,
			Cache: false,
			success: function(response){
				// jika berhasil 
				$("#container").html(Response);
			} 
		});
	})
});