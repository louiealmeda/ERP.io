<div title = 'Purchase order' parent='Purchasing' closable></div>
<div class="buttons">
	<span class="btn" onclick="">OK</span>
</div>

<form class="purchasing" id="purchasing" >
	<div style="width: auto; padding: 1px;">
		<span class="col-sm-12" style="padding: 4px;"><select id="VendorID" class="select"><option></option></select></span>
		<table>
			<thead>
				<th>Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Total</th>
			</thead>
			<tbody>
				<tr>
					<td><input id="itemName" class="form-control"></td>
					<td><input type="text" placeholder="Quantity" class="form-control"></td>
					<td><input type="text" placeholder="Price" class="form-control"></td>
					<td><input type="text" placeholder="Total" class="form-control"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<input type="submit" style="display: none;">
</form>
<script>

modules[<?php echo $i; ?>] = {
	onLoad:function(){
		com.post("items/viewAllItems",{}, function(data){
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

		com.post("vendors/viewAllVendors", {}, function(data){
			if(data.Code == "00")
			{
				$.each(data.Data, function(i,e){
				$("#purchasing div #VendorID").append("<option value='"+e.VendorID+"'>"+e.FullName+"</option>");
				});		
			}
		});

	// onLoad: function(){
//		com.post("accounts/viewAllVendors", {}, function(data){
//			if(data.Code == "00")
//			{
//				$div = $("#purchasing div");
//				$.each(data.Data, function(i,e){
//					e.VendorID = null;
//				
//				$.each(data.Data, function(i,e){
//				$select =$("#purchasing div .VendorID").append("<option value="+e.VendorID+"></option><option value="+e.fullName+"></option>");
//				});
//				$div.append($select);
//				}
//
//			}
//		});		
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
