<div title = 'Login' modal></div>
<div class="buttons">
	<span class="status-field"></span>
	<span class="btn" onclick="submitLogin();">OK</span>
</div>

<form class="login-admin" id="login-admin" onsubmit="submitLogin();">
	<div style="width: 400px; padding: 1px;">
		<span class="col-sm-12" style="padding: 4px;"><input type="text" name="Username" id="username" placeholder="Username" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="Password" id="password" placeholder="Password" class="form-control"></span>
	</div>
	<input type="submit" style="display: none;">
</form>

<script>

function submitLogin(){
	var params = {
			username : $("#login-admin #username").val(),
			password: $("#login-admin #password").val()
		};
		com.post("accounts/Login", params,function(data){
			if(data.Code == "00")
			{	
				window.location.reload();
			}
			else
			{
				windowManager.setStatus("#login", data.Message, windowManager.statusType.ERROR);
//				$("#login").parents(".ui-dialog").find(".status-field").html(data.Message);
			}
		});
	event.preventDefault();
//	return false;
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