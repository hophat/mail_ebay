<div class="container">
    <div class="row">
        <div class="col-12 p-4">
            <?php if (isset($_SESSION['alert_error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    Thông báo: <b> <?= $_SESSION['alert_error'] ?> </b>
                </div>
            <?php endif; ?>

            <div class="card p-4">
                <h1>Login</h1>
                <div class="card-body">
                    <form action="<?= base_url("/Auth/login") ?>" method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">account:</label>
                            <input type="text" required name="user_name" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">pass:</label>
                            <input class="form-control" required name="user_pass" min="5" type="password"></input>
                        </div>
                        <div class="form-gruop">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>