<br>
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
	<div class="card">
		<h2 class="card-header text-center">Please Register</h2>
		<div class="card-body">
			<?= $this->Form->create($user) ?>
			<div class="form-group">
				Role
				<?= $this->Form->select('roles', ['vendor' => 'Vendor', 'user' => 'User'], ['class' => 'form-control']) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('name', ['placeholder' => 'Organization Name', 'class' => 'form-control']) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('email', ['placeholder' => 'Email', 'class' => 'form-control']) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('password', ['placeholder' => 'Password', 'class' => 'form-control', 'type' => 'password']) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->button('Register', ['class' => 'btn btn-primary']) ?>
			</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>