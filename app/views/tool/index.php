<div class="container">

	<h1 class="text-center">Tools</h1>
	
	<a href="/tool/add" class="btn btn-primary mb-3" role="button">Add tool</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
        {% for tool in tools %}
		<tr>
          
			<th>{{loop.index}}</th>
			<td>{{tool.name}}</td>
			<td>
				<a href="/tool/delete/{{tool.id}}" class="btn-sm btn-danger">Delete</a>
				<a href="/tool/edit/{{tool.id}}" class="btn-sm btn-primary">Edit</a>
			</td>
        </tr>
            {%  endfor %}
		
		</tbody>
	</table>
</div>