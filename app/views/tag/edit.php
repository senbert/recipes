<div class="container">
	<h1 class="text-center">Edit tags</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/tag/edit' method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="hidden" value="{{tag.id}}"name="id">
					<input name="name" value="{{tag.name}}" type="text" class="form-control">	
				</div>
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>	