<?php
require (base_path('views/admin/partial/head.php'));
require (base_path('views/admin/partial/sidebar.php'));
require (base_path('views/admin/partial/navbar.php'));
?>
<div class="container">
    <div class="page-title">
        <h3>FAQ
            <a href="/admin/faq/create" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus"></i> Add</a>
        </h3>
    </div>
    <?php if($edit): ?>
        <div class="card">
            <div class="card-header">Edit FAQ</div>
            <div class="card-body">
                <form accept-charset="utf-8" method="post" action="/admin/faq">
                    <?php CSRF::csrfInputField() ?>
                    <div class="mb-3">
                        <label class="form-label">Question</label>
                        <input type="text" name="question" placeholder="Question" class="form-control" value="<?= $data[0]['question'] ?>">
                    </div>
                    <div class="mb-3">
                        <textarea style="resize:none" name="answer" placeholder="Answer" class="form-control" rows="3"><?= $data[0]['answer'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="id" value="<?= $data[0]['id'] ?>" hidden>
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($data)): ?>
                        <?php foreach($data as $faq): ?>
                            <tr>
                                <td><?= $faq['question'] ?></td>
                                <td><?= $faq['answer'] ?></td>
                                <td class="text-end">
                                    <form action="/admin/faq" method="post">
                                        <?php CSRF::csrfInputField() ?>
                                        <input type="text" name="id" value="<?= $faq['id'] ?>" hidden>
                                        <a href="/admin/faq?id=<?= $faq['id']; ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
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