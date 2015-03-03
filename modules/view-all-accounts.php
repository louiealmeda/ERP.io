<div title = 'View All Accounts' parent='Administration' closable
	minimizable></div>

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
	
//
modules[<?php echo $i; ?>] = {
	onLoad: function(){
		com.post("accounts/getAllUsers", {}, function(data){
			if(data.Code == "00")
			{
				$table = $("#account-list tbody");

				$.each(data.Data, function(i,e){
					e.AccountID = null;


					$row = $("<tr>");
					$.each(e, function(itemI, itemE){
						$td = $("<td>");
						$td.html(itemE);
						$row.append($td);
					});
					$table.append($row);
				});

			}
		});		
	},
	onRefresh: function(){
		alert("Refreshing");
	},
	onRestore: function(){
		alert("Restoring");
	},
	onClose:function(){
		alert("Closing");
		
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
		alert("Minimizing");
	}
}

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
