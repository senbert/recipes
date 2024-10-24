<?php $num = 0; ?>
<div class="container">
	<h1 class="text-center">Message</h1>
	
	<!-- <a href="/admin/add_recipe" class="btn btn-primary mb-3" role="button">Add recipe</a> -->
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Message</th>
			<th scope="col">Status</th>
			<th scope="col">Actions</th>

		</tr>
		</thead>
		<tbody>
		{% for contact in contacts %}
		<tr>
			<th scope="row">{{loop.index}}</th>
			<td>{{contact.name}}</td>
			<td>{{contact.email}} min</td>
			<td>{{contact.message}} min</td>
			<td>{% if contact.status == 0  %}
				<span class="red">Не прочитано</span>
				{% else  %}
				<span style="color:green;">Прочитано</span>
				{%  endif %}
			</td>
			<td>
				<a href="/contact/status/{{contact.id}}" class="btn-sm btn-primary">Status</a>
				<a href="/contact/deleteMess/{{contact.id}}" class="btn-sm btn-danger">Delete</a>
			</td>
		</tr>
		{% endfor %}
		
		</tbody>
	</table>
</div>
