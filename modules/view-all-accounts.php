<div title = 'View All Accounts' parent='Administration'></div>

<table class="flexme">
	<thead>
		<tr>
			<th width="100">Name</th>
			<th width="300">Surname</th>
			<th width="100">Username</th>
			<th width="100">Type</th>
			<th width="100">Status</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>This is data 1 with overflowing content</td>
			<td>This is data 2</td>
			<td>This is data 3</td>
			<td>This is data 4</td>
			<td>This is data 4</td>
		</tr>
		<tr>
			<td>This is data 1</td>
			<td>This is data 2</td>
			<td>This is data 3</td>
			<td>This is data 3</td>
			<td>This is data 4</td>
		</tr>
	</tbody>
</table>

<script>
	
	{
		function onLoad(){
			alert("Loading");		
		},
		function onRefresh(){
			
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
