<div title = 'Sales order' parent='Sales' closable></div>
<div class="buttons">
	<span class="btn" onclick="">OK</span>
</div>

<form class="sales" id="sales" >
	<div style="width: auto; padding: 1px;">
		<table>
			<thead>
				<th>Name</th>
				<th>Quantity</th>
				<th>Total</th>
			</thead>
			<tbody>
				<tr>
					<td><input id="itemName" class="form-control"></td>
					<td><input type="text" id="quantity" placeholder="Quantity" class="form-control"></td>
					<td><input type="text" id="quantity" placeholder="Price" class="form-control"></td>
					<td><input type="text" id="total" placeholder="Total" class="form-control"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<input type="submit" style="display: none;">
</form>
<script>

modules[<?php echo $i; ?>] = {
	onLoad:function(){
		com.post("inventory/viewItemDetails",{}, function(data){
			var names = [];
			if (data.Code == "00") 
			{
				$.each(data.Data, function(i,e){
					names[names.length] = e.Name;
				});
				
				$(function(){
					$('#itemName').autocomplete({
						source: names,
						minLength: 0 ,
						appendTo: "body"
					});
				}).click(function(){
					$(this).trigger('keydown');
				})

			}
		});		
	},
	onRefresh: function(){
		alert("Refreshing");
	},
	// onRestore: function(){
	// 	alert("Restoring");
	// },
	onMinimize: function(){
		alert("Minimizing");
	}
}
</script>
