<?php
require (base_path('views/admin/partial/head.php'));
require (base_path('views/admin/partial/sidebar.php'));
require (base_path('views/admin/partial/navbar.php'));
?>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">Create Product</div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
                            <?php //CSRF::csrfInputField() ?>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="title" class="form-control" value = "<?= $products['title'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" value = "<?= $products['price'] ?>" min=0 step=1 required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" style="resize:none" required><?= $products['description'] ?></textarea>
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
                                    <input id="category" type="text" name="category" class="form-control" aria-label="Text input with dropdown button" value="<?= $products['category'] ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Images</label>
                                <input class="form-control" name="files[]" type="file" id="formFile1" multiple required>
                                <small class="text-muted">Select product images</small>
                            </div>
                            <div class="mb-3 text-end">
                                <?php
                                if ($action == "/admin/products/update"):
                                ?>
                                <input type="text" name="id" value="<?= $products['id'] ?>" hidden>
                                <?php endif; ?>
                                <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $btn?></button>
                                <button class="btn btn-danger"><a href="/admin/products"><i class="fas fa-cancel"></i> Cancel</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require (base_path('views/admin/partial/footer.php')); ?>
<script>
    $('.dropdown-item').click(function() {
        $('#category').val($(this).text())
    })
</script>
