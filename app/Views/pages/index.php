<?= $this->extend('template/template_html'); ?>

<?= $this->section('content'); ?>

<h3>List Data Employee</h3>
<div class="d-flex justify-content-end">
    <a href="insertemployee">
        <button type="button" class="btn btn-success">Insert New Data</button>
    </a>
</div>
<?php $i = 1; ?>
<table class="table table-bordered table-hover fixed-to mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <?php foreach ($dataEmployee as $employee) : ?>
    <tbody>
        <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $employee['name']; ?></td>
            <td><?= $employee['phone']; ?></td>
            <td><?= $employee['email']; ?></td>
            <td><img src="/img/<?= $employee['image']; ?>" class="img-list rounded"></td>
        </tr>
    </tbody>
    <?php endforeach; ?>
</table>

<?= $this->endSection(); ?>