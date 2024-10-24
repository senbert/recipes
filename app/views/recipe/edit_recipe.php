<div class="container">

	<h1 class="text-center">Edit recipe</h1>
	<div class="row">
		<div class="col-6 mx-auto">
		<form action="/admin/edit_recipe"  method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" value="{{recipe.name}}" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label for="price">Prep time</label>
					<input type="text" value="{{recipe.prep}}" class="form-control" name="prep">
				</div>

				<div class="form-group">
					<label for="price">Cook time</label>
					<input type="text" value="{{recipe.cook}}" class="form-control" name="cook">
				</div>
				<div class="form-group">
					<label for="price">Serving</label>
					<input type="text" value="{{recipe.server}}" class="form-control" name="server">
				</div>
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" class="form-control-file" id="image" name="img">
				</div> 
				<input type="hidden" value="{{recipe.id}}"name="id">
			  	<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
	
	
</div>