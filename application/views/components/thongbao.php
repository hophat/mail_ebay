<div class="container">
    <div class="row">
        <div class="col-12 p-2">
            <?php if (isset($_SESSION['alert_success'])) : ?>
                <div class="alert alert-success" role="alert">
                    Thông báo: <b> <?= $_SESSION['alert_success'] ?> </b>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['alert_error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    Thông báo: <b> <?= $_SESSION['alert_error'] ?> </b>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>