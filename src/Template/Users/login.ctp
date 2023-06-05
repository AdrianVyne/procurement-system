<div class="container vh-100 d-flex align-items-center justify-content-center">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header">Login</div>
				<div class="card-body">
					<?= $this->Form->create() ?>
					<div class="mb-3">
						<?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email']) ?>
					</div>
					<div class="mb-3">
						<?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
					</div>
					<div class="mb-3"> 
						<?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']) ?>
					</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
		</div>
	</div>
</div>