<div class="container-fliud">
    <!-- <div class="row"> -->
    <nav class="navbar  navbar-light ">
        <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <a class="navbar-brand text-white" href="#"><img src="https://chotlo.com/upload/files/2017/12/logo-chotlo-tetpng1514512694.png" alt="" srcset=""></a>
        <a class="navbar-title text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><img width="30px" src="https://chotlo.com/images/avt/soi-cau-366.png" alt="" srcset=""></a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin Tức</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Số mơ</a>
                </li>

            </ul>
        </div>
    </nav>

    <?php
    if (AUTHED != 1) :
    ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url("/Auth/login") ?>" method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                                <input type="text" required name="user_phone" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mật khẩu:</label>
                                <input class="form-control" required name="user_pass" min="5" type="password"></input>
                            </div>
                            <div class="form-gruop">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12">
                            <p>Bạn chưa có tài khoản trên <span class="red">Lode</span> hãy bấm vào đăng ký</p>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success btn-sm" ><a class="text-light" href="<?= base_url('/dang_ky') ?>">Đăng ký</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>

    <?php
    if (AUTHED == 1) :
    ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalLabel"><?=USER['user_phone']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="">
                        <ul class="list-group">
                            <!-- <li class="list-group-item " > -->
                                <a class="list-group-item " href="<?= base_url('/profile') ?>">Thông tin</a>
                            <!-- </li> -->
                            <!-- <li class="list-group-item " > -->
                                <a class="list-group-item " href="<?= base_url('/Auth/logout') ?>">Thoát</a>
                            <!-- </li> -->

                        </ul>

                    </div>
                    <!-- <div class="modal-footer">
                        <div class="col-12">
                            <p>Bạn chưa có tài khoản trên <span class="red">Chot</span><span class="blue">lo</span><span class="orange">.</span><span class="green">com</span> hãy bấm vào đăng ký</p>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-success btn-sm" href="<?= base_url('/dang_ky') ?>">Đăng ký</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>
    <!-- </div> -->
</div>
<ul id="menu2">
    <li><a href="<?= base_url('/') ?>">Soi cầu</a></li>
    <li><a href="<?= base_url('/quay_thu') ?>">Quay thử KQXS</a></li>
    <li><a href="<?= base_url('/tim_tv') ?>">Tìm thành viên</a></li>
</ul>