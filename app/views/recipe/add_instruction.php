<div class="container">
	<h1 class="text-center">Add instruction</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/recipe/add_instruction/' method="post">
				<div class="form-group mb-3">
					<label for="name">Добавить текст инструкции</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group mb-3">
					<label for="name">Добавить шаг</label>				
					<input type="number" class="form-control" name="step">
				</div>
				<input type="hidden" value="{{recipe.id}}"name="recipe_id">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>

