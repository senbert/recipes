<!--  -->
<div class="container">
	<h1 class="text-center">Tags</h1>
	
	<a href="/tag/add" class="btn btn-primary mb-3" role="button">Add tag</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
        {% for tag in tags %}
		<tr>
			<th>{{loop.index}}</th>
			<td>{{tag.name}}</td>
			<td>
				<a href="/tag/delete/{{tag.id}}" class="btn-sm btn-danger">Delete</a>
				<a href="/tag/edit/{{tag.id}}" class="btn-sm btn-primary">Edit</a>
			</td>
		</tr>
		{%  endfor %}
		</tbody>
	</table>
</div>
