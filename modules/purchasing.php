<div title = 'Purchase order' parent='Purchasing' closable></div>
<div class="buttons">
	<span class="btn" onclick="submitLogin();">OK</span>
</div>

<form class="purchasing" id="purchasing" >
	<div style="width: 400px; padding: 1px;">
		<span class="col-sm-12" style="padding: 4px;"><select id="VendorID"><option></option></select></span>
		<!-- <span class="col-sm-12" style="padding: 4px;"><input type="text" name="purchase" id="purchase" placeholder="Purchase order" class="form-control"></span> -->
	</div>
	<input type="submit" style="display: none;">
</form>
<script>
modules[<?php echo $i; ?>] = {
	onLoad: function(){
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
	onRestore: function(){
		alert("Restoring");
	},
	onMinimize: function(){
		alert("Minimizing");
	}
}
</script>
