<?php
require (base_path('views/admin/partial/head.php'));
require (base_path('views/admin/partial/sidebar.php'));
require (base_path('views/admin/partial/navbar.php'));
?>

<div class="container">
    <div class="page-title">
        <h3>Customers
            <a href="/admin/customers/create" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus"></i> Add</a>
        </h3>
    </div>

        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($customers)): ?>
                        <?php foreach($customers as $customer): ?>
                            <tr>
                                <td><?= $customer['lastname'] . ' ' . $customer['firstname'] ?></td>
                                <td><?= $customer['email'] ?></td>
                                <td><?= $customer['phone'] ?></td>
                                <td><?= $customer['address'] ?></td>
                                <td class="text-end">
                                    <form action="/admin/customers" method="post">
                                        <?php //CSRF::csrfInputField() ?>
                                        <input type="text" name="id" value="<?= $customer['id'] ?>" hidden>
                                        <a href="/admin/customers?id=<?= $customer['id']; ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        <button name="delete"  class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>

<?php require (base_path('views/admin/partial/footer.php')); ?>
