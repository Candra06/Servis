<div class="d-flex align-items-center justify-content-center ht-100v">

<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-br-primary rounded bd bd-white-1">
  <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> PRIMA <span class="tx-info">comp</span> <span class="tx-normal">]</span></div>
  <div class="tx-center mg-b-60">Alamat Kantor</div>

<form action="" method="POST"> 
    <?php
        if (isset($_SESSION['message'])) {
            echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                 ".$_SESSION['message'][1]."
                 </div>";
        }
    ?> 
  <div class="form-group">
    <input type="email" class="form-control form-control-dark" name="email" placeholder="Email">
  </div><!-- form-group -->
  <div class="form-group">
    <input type="password" class="form-control form-control-dark" name="password" placeholder="Password">
    <!-- <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> -->
  </div><!-- form-group -->
  <button type="submit" class="btn btn-info btn-block">Sign In</button>

  <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div> -->
</form>

</div><!-- login-wrapper -->
</div><!-- d-flex -->
