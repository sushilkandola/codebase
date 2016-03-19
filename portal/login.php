<?php include "header.php"; ?>
<div class="container" style="padding:80px 0;">
  <div class="omb_login">
    <div class="row omb_row-sm-offset-3">
      <div class="col-xs-12 col-sm-6">
        <form class="omb_loginForm" action="varifyUser.php" autocomplete="off" method="POST">       
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="emailid" placeholder="Email ID" required>
          </div>
          <span class="help-block"></span>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input  type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <span class="help-block"><!--Password error--></span>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
    <div class="row omb_row-sm-offset-3">
      <div class="col-xs-12 col-sm-3">
        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me">
          Remember Me </label>-->
      </div>
      <div class="col-xs-12 col-sm-3">
        <p class="omb_forgotPwd"> <a href="forgot_pass.php">Forgot password?</a> </p>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>