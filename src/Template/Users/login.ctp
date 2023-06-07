<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <?= $this->Form->create(null, ['class' => 'needs-validation']) ?>
          <div class="form-group">
            <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email', 'required']) ?>
            <div class="invalid-feedback">Please enter a valid email.</div>
          </div>
          <div class="form-group">
            <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) ?>
            <div class="invalid-feedback">Please enter a password.</div>
          </div>
          <div class="form-group">
            <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']) ?>
          </div>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
  </div>
</div>
