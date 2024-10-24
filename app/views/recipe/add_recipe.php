<div class="container">
	<h1 class="text-center">Add recipe form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/admin/add_recipe' method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input name="name" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="text" class="form-control" id="description" rows="3"></textarea>
				</div>
                <div class="form-group">
					<label>Prep</label>
					<input name="prep" type="number" class="form-control">
				</div>
                <div class="form-group">
					<label>Cook</label>
					<input name="cook" type="number" class="form-control">
				</div>
                <div class="form-group">
					<label>Server</label>
					<input name="server" type="number" class="form-control">
				</div>
                
				<div class="form-group">
					<label for="image">Image</label>
					<input name="img" type="file" class="form-control-file" id="image">
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
 