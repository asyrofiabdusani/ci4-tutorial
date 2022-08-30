<?= $this->extend('template/template_html'); ?>

<?= $this->section('content'); ?>

<h3 class="mb-3">Insert New Data Employee</h3>

<?php if (session()->getFlashdata('error')) : ?>
<div class="alert alert-danger m-3" role="alert">
    <?= session()->getFlashdata('error'); ?>
</div>
<?php endif; ?>
<form method="post" action="save" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" required id="name" value="<?= old('name'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="phone" required id="phone" value="<?= old('phone'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" required id="email" value="<?= old('email'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" required id="address" value="<?= old('address'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="image" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="image" required id="image" value="<?= old('image'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
            <input type="hidden" id="input-other" name="input-other" value="0">
            <input class="form-check-input me-1" type="checkbox" id="input-other" name="input-other" value="1">
            <label class="form-check-label" for="input-other">
                Input other data
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Insert data</button>
</form>

<?= $this->endSection(); ?>