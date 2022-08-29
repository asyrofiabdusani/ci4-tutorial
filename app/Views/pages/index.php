<?= $this->extend('template/template_html'); ?>

<?= $this->section('content'); ?>

<h3>List Data Employee</h3>
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
            <th scope="row">1</th>
            <td><?= $employee['name']; ?></td>
            <td><?= $employee['phone']; ?></td>
            <td><?= $employee['email']; ?></td>
            <td><?= $employee['image']; ?></td>
        </tr>
    </tbody>
    <?php endforeach; ?>
</table>

<?= $this->endSection(); ?>