<div title = 'Create Vendors' closable></div>

<div class="buttons">
	<span class="btn" onclick="createVendors();">Create</span>
</div>
<form role="form" id="create-vendors">
<div style="width: 400px; padding: 1px;">
		<span class="col-sm-12" style="padding: 4px;"><input type="text" name="fullName" id="fullName" placeholder="Fullname" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="text" name="website" id="website" placeholder="Website" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="text" name="contactNumber" id="contactNumber" placeholder="Contact number" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="email" name="email" id="email" placeholder="Email" class="form-control"></span>
</div>
	<input type="submit" style="display: none;">
</form>

<script>
	function createVendors(){
	var params = {
			fullname: $("#createVendors #fullName").val(),
			website : $("createVendors #website").val(),
			contactNumber : $("createVendors #contactNumber").val(),
			email : $("#createVendors #email").val()
		};
		com.post("vendors/createVendor", params,function(data){
			//alert(data);
			if(data.Code == "00"){
				$("#createVendors").dialog("close");
			}
			else{
				alert("Some fields are not yet done!");
				windowManager.reset("#createVendors");
			}
		});

}

modules[<?php echo $i; ?>] = {
	onLoad: function(){
		// alert("Loading");	
		
	},
	onRefresh: function(){
		alert("Refreshing");
	},
	onMinimize: function(){
		alert("Minimizing");
	}
}
</script>
</script>
