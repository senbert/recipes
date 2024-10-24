<div class="container">
	<h1 class="text-center">Add tool form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/recipe/add_tool/' method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<select name="tool_id">
						<option value="">Не выюрано</option>
						{% for tool in tools %}	
							<option value="{{tool.id}}"> {{tool.name}}</option>	
						{% endfor %}
					</select>
				</div>
				<input type="hidden" value="{{recipe_id}}"name="recipe_id">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>