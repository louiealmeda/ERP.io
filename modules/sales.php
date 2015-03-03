<div title = 'Sales' parent='Sales' closable
	 minimizable
	 maximizable
	 resizable
	 ></div>

<table class="flexme">
	<thead>
		<tr>
			<th width="100">Item name</th>
			<th width="100">Description</th>
			<th width="100">Col 3 is a long header name</th>
			<th width="300">Col 4</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>This is data 1 with overflowing content</td>
			<td>This is data 2</td>
			<td>This is data 3</td>
			<td>This is data 4</td>
		</tr>
	</tbody>
</table>




<script>
	console.log("Called!");
	$('.flexme').flexigrid();
	
</script>
