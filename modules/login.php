<div title = 'Login' modal></div>
<div class="buttons">
	<span class="btn" onclick="submitLogin();">OK</span>
</div>

<form class="login-admin" id="login-admin" >
	<div style="width: 400px; padding: 1px;">
		<span class="col-sm-12" style="padding: 4px;"><input type="text" name="Username" id="username" placeholder="Username" class="form-control"></span>
		<span class="col-sm-12" style="padding: 4px;"><input type="password" name="Password" id="password" placeholder="Password" class="form-control"></span>
	</div>
	<input type="submit" style="display: none;">
</form>

<script>

function submitLogin(){
	var params = {
			username :  $("#login-admin #username").val(),
			password: $("#login-admin #password").val()
		};
		com.post("accounts/Login", params,function(data){
			
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