
<?php
include('login-work.php'); // Include Login Script
if ((isset($_SESSION['p_email']) != '')) 
{
header('Location: success_page.php');
}
?>
 
<!-- <div class="loginBox">
<h3>Login Form</h3>
<br><br>
<form method="post" action="">
<label>payer_email:</label><br>
<input type="text" name="p_email" placeholder="payer_email" /><br><br>
 <label>Password:</label><br>
<input type="password" name="password" placeholder="password" />  <br><br>
<input type="submit" name="submit" value="Login" /> 
</form>

</div> -->

<!-- <div class="error">< ?php echo $error;?></div> -->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="">
        <button type="button" class="close pos-close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center login-img">
        <img src="./assets/img/logo-bliss_zone.png"  alt="">
        </div>
        <div class="form-title text-center">
          <h4 class="mt-3 mb-3">Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="post" action="">
            <div class="form-group">
              <input type="email" class="form-control" id="email1"    name="p_email" placeholder="payer_email" >
            </div>
            <!-- <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Your password...">
            </div> -->
            <input type="submit" name="submit " class="btn btn-lg btn-primary btn-block mb-1" value="Login" /> 
          </form>

        </div>

        <div class="error">
          <!-- < ?php echo $error;?> -->
      <p>aaaaaaa</p>
      </div>
      </div>
    </div>
      <!-- <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
      </div> -->
  </div>
</div>


<Script>

</Script>