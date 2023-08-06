<?php
require (base_path('views/admin/partial/head.php'));
require (base_path('views/admin/partial/sidebar.php'));
require (base_path('views/admin/partial/navbar.php'));
?>

    <div class="container">
        <div class="page-title">
            <h3>Products
                <a href="/admin/products/create" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus"></i> Add</a>
            </h3>
        </div>
        <?php if($edit): ?>
            <div class="card">
                <div class="card-header">Create Product</div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="/admin/products" method="post" enctype="multipart/form-data">
                            <?php //CSRF::csrfInputField() ?>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $items[0]['title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" value="<?= $items[0]['price'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" style="resize:none"><?= $items[0]['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="language" class="form-label">Category</label>
                                <div class="input-group mb3">
                                    <div class="dropdown input-group-prepend">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Choose
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <?php foreach($categories as $category): ?>
                                                <li><a class="dropdown-item"><?= $category['title'] ?></a></li>
                                                <div role="separator" class="dropdown-divider"></div>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <input id="category" type="text" name="category" class="form-control" aria-label="Text input with dropdown button" value="<?= $items[0]['category'] ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Images</label>
                                <input class="form-control" name="files[]" type="file" id="formFile1" multiple>
                                <small class="text-muted">Select product images</small>
                            </div>
                            <div class="mb-3 text-end">
                                <input type="text" name="id" value="<?= $items[0]['id'] ?>" hidden>
                                <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="box box-primary">
                <div class="box-body">
                    <table width="100%" class="table table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <!-- todo add image to product -->
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($items)): ?>
                            <?php foreach($items as $item): ?>
                                <tr>
                                    <td><?= $item['title'] ?></td>
                                    <td>$ <?= number_format($item['price'], 2) ?></td>
                                    <td><?= $item['description'] ?></td>
                                    <td><?= $item['category'] ?></td>
                                    <td class="text-end">
                                        <form action="/admin/products" method="post">
                                            <?php //CSRF::csrfInputField() ?>
                                            <input type="text" name="id" value="<?= $item['id'] ?>" hidden>
                                            <a href="/admin/products/update?id=<?= $item['id']; ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <button name="delete" type="submit" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif ?>
    </div>


<?php require (base_path('views/admin/partial/footer.php')); ?>
<script>
    $('.dropdown-item').click(function() {
        $('#category').val($(this).text())
    })
</script>
