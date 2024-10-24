<div class="container">
	<h1 class="text-center">Edit tool</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/tool/edit' method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="hidden" value="{{tool.id}}" name="id">
					<input name="name" value="{{tool.name}}" type="text" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>	