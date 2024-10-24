<div class="container">
	<h1 class="text-center">Add tag form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/recipe/add_tag/' method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<select name="tag_id">
						<option value="">Не вырано</option>
						{% for tag in tags %}	
							<option value="{{tag.id}}"> {{tag.name}}</option>	
						{% endfor %}
					</select>
				</div>
				<input type="hidden" value="{{recipe_id}}"name="recipe_id">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>