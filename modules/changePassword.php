<div title = 'Change Password' parent="Administration" closable ></div>
<div class="buttons">
	<span class="btn" onclick="changePassword();">OK</span>
</div>

<form class="change-password" id="change-password">
	<div style="width: 400px; padding: 1px;">
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="password" id="password" placeholder="password" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="new password" id="new-password" placeholder="New password" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="confirm new password" id="confirm-new-password" placeholder="Confirm new password" class="form-control"></span>
	</div>
	<input type="submit" style="display: none;">
</form>

<script>

function changePassword(){
	var params = {
			password: $("#change-password #password").val(),
			newPassword : $("#change-password #new-password").val()
		};
		
		if($("#change-password #confirm-new-password").val() != params.newPassword){
			alert("Confirm new password doesn't match!");
			return;
		}
		com.post("accounts/changePassword", params,function(data){
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