<div class="container">
    <div class="row">
        <div class="site-content container col-12 p-5">
            <h1 class="section-title">Đăng Ký Thành Viên</h1>
            <div class=" div_bor_gach text-center">
                <img src="https://chotlo.com/images/gach_title.png">
            </div>
            <p class="" style="font-size: 14px; font-weight: bold;">
                Để đăng ký thành viên bạn vui lòng điền chính xác các thông tin dưới đây để đảm bảo được hỗ trợ. <span class="text-danger">Lưu ý: Tên nick từ 5 - 16 ký tự bao gồm chữ cái, số và dấu gạch dưới không dùng các ký tự đặc biệt</span>
            </p>
            <form id="form-add" action="<?= base_url('/Dang_ky/dang_ky') ?>" method="POST">
                <!-- <input type="hidden" name="_token" value="2WgVaWmDPGg5TMoYJ8SVfyJRnrGyl98czQ2e75wD"> -->

                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input id="phone" type="tel" name="user_phone" onkeypress="return USER.keypress(event);" maxlength="12" minlength="10" required="" value="" class="form-control text_validate" aria-required="true">

                </div>
                <div class="form-group">
                    <label for="phone">Nick Name</label>
                    <input id="nickname" type="text" name="user_name" value="" required="" minlength="5" maxlength="16" class="form-control text_validate" aria-required="true">

                </div>
                <div class="form-group">
                    <label for="phone">Email:</label>
                    <input id="email" type="email" name="user_email" value="" required="" maxlength="255" class="form-control text_validate" aria-required="true" aria-invalid="true" aria-describedby="email-error"><span id="email-error" class="help-block help-block-error"><span class="span_error">Email không đúng định dạng!</span></span>
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" name="user_pass" id="password" minlength="6" maxlength="255" value="" required="" class="form-control text_validate" aria-required="true" aria-invalid="false" aria-describedby="password-error"><span id="password-error" class="help-block help-block-error"></span>
                </div>
                <div class="form-group">
                    <label for="password">Nhập lại mật khẩu</label>
                    <input type="password" name="user_repassword" id="repassword" required="" minlength="6" maxlength="255" class="form-control text_validate" aria-required="true">
                </div>

                <div id="div_noiquy">
                    Trước khi click <span class="text-danger"><b>Đăng ký</b> </span> bạn hãy dành ít thời gian xem Nội quy của diễn đàn để xây dựng diễn đàn ngày càng phát triển.
                    <h2 id="h2_noiquy" class="a_noiquy">XEM NỘI QUY</h2>
                </div>
                <div class="div_submit">
                    <button class="btn btn-success" type="submit">Đăng ký</button>
                    <a href="/" class="btn btn-warning">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div>