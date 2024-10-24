<?php $num = 0; ?>
<div class="container">
	<h1 class="text-center">Recipes</h1>
	
	<a href="/admin/add_recipe" class="btn btn-primary mb-3" role="button">Add recipe</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Image</th>
			<th scope="col">Prep time</th>
			<th scope="col">Cook time</th>
			<th scope="col">Serving</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		{% for recipe in recipes %}
		<tr>
			<th scope="row">{{loop.index}}</th>
			<td>
				<a href="/admin/recipe/{{recipe.id}}">{{recipe.name}}</a>	
			</td>
			<td><img src="../assets/img/recipes/{{recipe.img}}" height="100px"></td>
			<td>{{recipe.prep}} min</td>
			<td>{{recipe.cook}} min</td>
			<td>{{recipe.server}} servings</td>
			<td>
				<a href="/admin/delete/{{recipe.id}}" class="btn-sm btn-danger">Delete</a>
				<a href="/admin/edit_recipe/{{recipe.id}}" class="btn-sm btn-primary">Edit</a>
			</td>
		</tr>
		{% endfor %}
		
		</tbody>
	</table>
</div>
