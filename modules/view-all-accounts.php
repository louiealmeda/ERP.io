<div title = 'View All Accounts' parent='Administration' 
	resizable 
	closable
	minimizable
	width = "644"
	height = "284"
	authorization = "ADMIN"
	 ></div>

<table id = "account-list" class="flexme">
	<thead>
		<tr>
			<th width="100">Username</th>
			<th width="100">Password</th>
			<th width="100">Status</th>
			<th width="100">Type</th>
			<th width="100">Name</th>
			<th width="100">Surname</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<script>
	
modules[<?php echo $i; ?>] = {
	onLoad: function(){
	},
	onRefresh: function(){

	},

	onOpen:function(){
		com.post("accounts/getAllUsers", {}, function(data){
			if(data.Code == "00")
			{
				com.bindSource("#account-list", data.Data, ["Username", "Status", "Type", "Name", "Surname"]);
				
			}
		});		
//		alert("Opening");
	},
	onRestore: function(){
//		alert("Restoring");
	},
	onClose:function(){
		
	},
	// onOpen:function(){
	// 	alert("Opening");
	// },
	// // onRestore: function(){
	// // 	alert("Restoring");
	// //},
	// onClose:function(){
	// 	alert("Closing");
		
	// },
	onMinimize: function(){
	}
};

//	
//	$(document).ready(function(){
//		
//		console.log("Called!==");
//		$('.flexme').flexigrid();
//		com.post("accounts/getAllUsers", {}, function(data){
//			alert(data);
//		});
//	});
</script>
