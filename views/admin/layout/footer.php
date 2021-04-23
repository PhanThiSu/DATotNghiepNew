  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 1.0 -->
    </div>
    
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<div class="modal fade" tabindex="-1" role="dialog" id="changePassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thay đổi mật khẩu</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div id="change-password-status" class="alert alert-dismissible fade in" role="alert"> 
              <button type="button" class="close hide" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
              <p class="message"></p>
          </div>
          <div class="form-group">
            <label for="current_password" class="col-sm-4 control-label">Mật khẩu hiện tại</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="current_password" placeholder="Password">
            </div>
          </div>
          <div class="form-group form-group-pass">
            <label for="new_password" class="col-sm-4 control-label">Mật khẩu mới</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="new_password" placeholder="New Password">
            </div>
          </div>
          <div class="form-group form-group-pass">
            <label for="confirm_password" class="col-sm-4 control-label">Xác nhận mật khẩu</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
              <span id="error-confirm-password" class="help-block"></span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary" id="savePassword">Lưu thay đổi</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo RootREL; ?>media/admin/js/adminlte.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/demo.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/main.js"></script>
</body>
</html>