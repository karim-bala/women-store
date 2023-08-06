<?php
require (base_path('views/admin/partial/head.php'));
require (base_path('views/admin/partial/sidebar.php'));
require (base_path('views/admin/partial/navbar.php'));
?>

    <div class="container">
        <div class="page-title">
            <h3>Settings</h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="system-tab" data-bs-toggle="tab" href="#system" role="tab" aria-controls="system" aria-selected="false">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="attributions-tab" data-bs-toggle="tab" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">Privacy Policy</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="col-md-6">
                            <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                                <?php //CSRF::csrfInputField() ?>
                                <div class="mb-3">
                                    <textarea class="form-control" style="resize:none" required rows="20" name="about"><?= $about['about'] ?></textarea>
                                </div>
                                <div class="mb-3 text-end">
                                    <button name="about-submit" class="btn btn-success" type="submit"><i class="fas fa-check"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
                        <div class="col-md-6">
                            <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <?php CSRF::csrfInputField() ?>
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                                        <input type="text" name="address" class="form-control" value="<?= $address[0]['value'] ?>">
                                        <input name="ad-id" value="<?= $address[0]['id'] ?>" hidden>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><b>@</b></span>
                                        <input type="email" name="email" class="form-control" value="<?= $email[0]['value'] ?>">
                                        <input name="em-id" value="<?= $email[0]['id'] ?>" hidden>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                        <input type="tel" name="phone" class="form-control" value="<?= $phone[0]['value'] ?>">
                                        <input name="ph-id" value="<?= $phone[0]['id'] ?>" hidden>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><b>f</b></span>
                                        <input type="text" name="facebook" class="form-control" value="<?= $fb[0]['value'] ?>">
                                        <input name="fb-id" value="<?= $fb[0]['id'] ?>" hidden>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><b>IG</b></span>
                                        <input type="text" name="instagram" class="form-control" value="<?= $ig[0]['value'] ?>">
                                        <input name="ig-id" value="<?= $if[0]['id'] ?>" hidden>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-retweet"></i></span>
                                        <input type="text" name="twitter" class="form-control" value="<?= $tw[0]['value'] ?>">
                                        <input name="tw-id" value="<?= $tw[0]['id'] ?>" hidden>
                                    </div>
                                </div>
                                <div class="mb-3 text-end">
                                    <button class="btn btn-success" name="contact-submit" type="submit"><i class="fas fa-check"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="attributions" role="tabpanel" aria-labelledby="attributions-tab">
                        <h4 class="mb-0">Legal Notice</h4>
                        <p class="text-muted">Copyright (c) <script>document.write(new Date().getFullYear());</script> Yem-Yem. All rights reserved.</p>
                        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                            <?php //CSRF::csrfInputField() ?>
                            <textarea class="form-control" name="policy" style="resize:none" required rows="20"><?= $privacyPolicy['policy'] ?></textarea>
                            <div class="mb-3 text-end">
                                <button class="btn btn-success" name="policy-submit" type="submit"><i class="fas fa-check"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require (base_path('views/admin/partial/footer.php')); ?>