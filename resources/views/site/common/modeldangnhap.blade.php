<div class="modal fade" tabindex="-1" role="dialog" id="model_dangnhap">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Đăng nhập</h4>
      </div>
      <div class="modal-body">
        <div class="col-2 registered-users"><strong>Đăng nhập</strong>
          <div class="content">
          <form action="{{ route('postDangNhap') }}" method="post">
            <p>Vui lòng nhập đầy đủ thông tin.</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="form-list">
              <li>
                <label for="email">Email: <span class="required">*</span></label>
                <br>
                <input type="email" title="Email" class="input-text required-entry" value="{{ old('email') }}" name="email" data-validation="email" data-validation-error-msg="Vui lòng nhập địa chỉ email hợp lệ" autofocus>
              </li>
              <li>
                <label for="pass">Mật khẩu: <span class="required">*</span></label>
                <br>
                <input type="password" title="Mật khẩu" id="pass" class="input-text required-entry validate-password" name="password" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập mật khẩu từ 5 ký tự">
              </li>
              <li>
                <div class="checkbox">
                  <label><input type="checkbox" value="true" name="remember">Ghi nhớ đăng nhập</label>
                </div>
              </li>
            </ul>
            <p class="required">* Là bắt buộc</p>
            <div class="buttons-set">
              <button name="login" type="submit" class="btn btn-info"><span>Đăng nhập</span></button>
              <button class="btn btn-success" onclick="window.location='{{ route('getLoginFacebook') }}';">Đăng nhập bằng facebook</button>
              <button class="btn btn-link" onclick="window.location='{{ url('password/reset') }}';">&nbsp; Quên mật khẩu?</button> </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>