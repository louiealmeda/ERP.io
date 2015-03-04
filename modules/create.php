<div title = 'Create Account' 
	 parent='Administration' 
	 authorization = "ADMIN"
	closable
	 ></div>

<div class="buttons">
	<span class="btn" onclick="createAccounts();">OK</span>
</div>
<form role="form" id="create-user">
<div style="width: 400px; padding: 1px;">
		<span class="col-sm-6" style="padding: 4px;"><input type="text" name="name" id="name" placeholder="Name" class="form-control"></span>
		<span class="col-sm-6" style="padding: 4px;"><input type="text" name="surname" id="surname" placeholder="Surname" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="text" name="username" id="username" placeholder="Username" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="password" id="password" placeholder="Password" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="confirmPassword" id="confirm-password" placeholder="Confirm Password" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="adminPassword" id="adminPassword"placeholder="Admin password" class="form-control"></span>
		<span  class="col-sm-12" style="padding: 4px;"><select name="type" class="select" id="type">
		<option value="ADMIN">Administrator</option>
		<option value="CASHIER">Cashier</option>
		<option value="PURCHASING">Purchasing</option></select></span>
</div>
	<input type="submit" style="display: none;">
</form>

<script>

function createAccounts(){
	var params = {
			name :  $("#create-user #name").val(),
			surname: $("#create-user #surname").val(),
			username : $("#create-user #username").val(),
			password : $("#create-user #password").val(),			
			adminPassword : $("#create-user #adminPassword").val(),
			type : $("#create-user #type").val()
		};
		if($("#create-user #confirm-password").val() != params.password){
			alert("Confrim Password doesn't match!");
			return;
		}
		com.post("accounts/createUser", params,function(data){
			//alert(data);
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