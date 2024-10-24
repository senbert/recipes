<div class="container">
	<h1 class="text-center">Add ingredient</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/ingredient/add/' method="post">		
				<div class="form-group mb-3">
                        <label for="name">Добавить ингредиент</label>
                        <input type="text" class="form-control" name="name">
                    </div>
				<input type="hidden" value="{{recipe_id}}"name="recipe_id">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
