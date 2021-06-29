<div class="middledite" style="margin-bottom: 30px;">
    <h1 class="section-title">Cá Nhân</h1>
    <div class=" div_bor_gach text-center">
        <img src="https://chotlo.com/images/gach_title.png">
    </div>

    <div class="col-12">
        <form action="/updateprofile" id="updateprofile" accept-charset="utf-8" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="2WgVaWmDPGg5TMoYJ8SVfyJRnrGyl98czQ2e75wD">
            <ul class="list-group" id="ul_me">
                <li class="list-group-item">
                    <div class="row">
                        <div class="div_me_left">
                            <img src="https://chotlo.com/images/avt/soi-cau-366.png" class="" width="50" height="50">
                        </div>
                        <div class="div_me_right">
                            Tên nick: <span class="blue"><b><?=USER['user_name']?></b></span><br>
                            <span class="blue"><b>Lô: </b></span>2 điểm <span class="red" style="padding-left: 20px"><b>ĐB: </b></span>0 điểm

                        </div>
                    </div>
                </li>
                <li class="list-group-item">Thay ảnh: <input type="file" class="form-control" name="avatar"></li>
                <li class="list-group-item">Số ĐT: <span class="red"><b><?=USER['user_phone']?></b></span></li>
                <li class="list-group-item"><span style="float:left">Email:</span> <input type="text" class="form-control" style="width: 200px" size="30" value="<?=USER['user_email']?>" name="email1" id="email1"></li>
                <li class="list-group-item">Gia nhập: <b><?=USER['user_created']?></b></li>

                <li class="list-group-item">Hạn VIP còn: <b>27 ngày</b></li>

                <!-- <li class="list-group-item">Mật khẩu mới: <input type="password" class="form-control" style="width: 200px" size="30" value="" name="password" id="password"></li> -->
                <li class="list-group-item">Nhập lại mật khẩu cũ để Cập nhật: <input type="password" class="form-control" style="width: 200px" size="30" name="password1" id="password1"></li>
                <li class="list-group-item">
                    <div class="div_submit">
                        <input type="submit" class="btn btn-primary active" value="Cập nhật thông tin">
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>