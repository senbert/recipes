	<div class="container">
	<h1 class="text-center">Edit instruction</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action='/instruction/edit/' method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input name="name" value="{{instruction.name}}" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="step">Step</label>
					<input name="step" value="{{instruction.step}}" type="number" class="form-control">
				</div>
				<input type="hidden" value="{{instruction.id}}" name="id">
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>	