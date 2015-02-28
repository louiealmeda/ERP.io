<div title = 'Login'  caller="test-btn" modal></div>
<div class="buttons">
	<span class="btn">Test Button</span>
	<span class="btn">Lorem</span>
</div>

<form class="login-admin">
	<div class="form-group">
		<div class="col-sm-10">
		<input type="text" name="Username" placeholder="Username" class="form-control"></div>
		<div class="col-sm-10">
		<input type="password" name="Password" placeholder="Password" class="form-control"></div>
	</div>
</form>

<script>
modules[<?php echo $i; ?>] = {
	onLoad: function(){
		alert("Loading");		
	},
	onRefresh: function(){
		alert("Refreshing");
	},
	onOpen:function(){
		alert("Opening");
	},
	onRestore: function(){
		alert("Restoring");
	},
	onClose:function(){
		alert("Closing");
		
	},
	onMinimize: function(){
		alert("Minimizing");
	}
}
</script>