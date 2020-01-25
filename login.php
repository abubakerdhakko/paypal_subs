
<?php
include('login-work.php'); // Include Login Script
if ((isset($_SESSION['username']) != '')) 
{
header('Location: success_page.php');
}
?>
<!--  
<div class="loginBox">
<h3>Login Form</h3>
<br><br>
<form method="post" action="">
<label>payer_email:</label><br>
<input type="text" name="p_email" placeholder="payer_email" /><br><br>

<input type="submit" name="submit" value="Login" /> 
</form>

</div>

 <div class="error">< ?php echo $error;?></div> --> 


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
            <div class="loginBox">
            <h3>Login Form</h3>
            <br><br>
            <form method="post" action="" id="search_form">
            <label>payer_email:</label><br>
            <input type="text" name="username" placeholder="payer_email" /><br><br>
            <input type="submit" name="submit" value="Login" onclick="submitmyinfo();"/> 
            </form>
            </div>
        </div>
        <div class="error"><?php echo $error;?></div>
      </div>
    </div>
  </div>
</div>

<Script>
function submitmyinfo(event) {
  console.log('vvvv')
  event.preventDefault();
    document.getElementById("search_form").submit();
   }  
</Script>