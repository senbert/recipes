<div class="container">
	<h1 class="text-center">Edit ingredient</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/ingredient/edit/' method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="hidden" value="{{ingredient.id}}"name="id">
					<input name="name" value="{{ingredient.name}}" type="text" class="form-control">
					
				</div>
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>	