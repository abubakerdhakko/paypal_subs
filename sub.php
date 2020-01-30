<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('login-work.php'); // Include Login Script
  if ((isset($_SESSION['username']) != '')) {
    header('Location: success_page.php');
  }
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blizz Zone</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <!-- <link rel="stylesheet" href="../build/mediaelementplayer.css"> -->
  <link rel="stylesheet" href="./style.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> -->
  <link rel="stylesheet" href="https://cdn.plyr.io/1.6.16/plyr.css">
  <script src="https://cdn.plyr.io/1.6.16/plyr.js"></script>
  <style>
    .btn-dgn {
      color: white !important;
      background-color: transparent !important;
      border-color: #dddddd !important;
    }

    input.payer__email {
      width: 100%;
      background-color: #4a52526e;
      border: none;
      box-shadow: 0px 0px 5px 1px #141414b8;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      padding-left: 15px;
      color: white;
      margin-bottom: 0px;
    }

    .login_btn {
      font-size: 19px;
      */
      /* padding: 10px; */
      border-radius: 10px;
      background-color: #3c8484;
      border: navajowhite;
      /* font-size: 16px; */
      /* font-size: 20px; */
      color: white;
      box-shadow: 0px 1px 0px 0px #0000005c;
      width: 170px;
      height: 44px;
    }

    .login-bg {
      margin: 30px 10px;
      /* font-size: 50px; */
      background-color: #4a52526e;
      padding: 10px 10px 20px 5px;
      border-radius: 20px;
    }
  </style>
</head>

<body>

  <div class="bg-main">
    <nav class="navbar navbar-light bg-nav">
      <a class="navbar-brand" href="#">
        <img src="./assets/img/logo-bliss_zone.png" width="45" height="45" alt=""><span>Bliss Zone</span>
      </a>
      <div class="text-right fade-p">
        <div class="d-flex justify-content-start">
          <div class="">
            <button type="button" class="btn btn-info btn-round btn-dgn" id="button_login">
              Login
            </button>
          </div>
          <div class="pl-3">
            <button type="button" class="btn btn-primary btn-dgn" data-toggle="modal" data-target="#exampleModal">
              Subscribe
            </button>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="text-center p-extra">
        <p id="paragraph">
          Upgrade for access to extra web sounds.
          <br />
          You'll also get access to any new web sounds released in the future.
        </p>
        <!-- <form method="post" action="" id="search_form">
            <label>payer_email:</label><br>
            <input type="text" name="p_email" placeholder="payer_email" /><br><br>
            <input type="submit" name="submit" value="Login" /> 
            </form>-->
        <div class="login-bg" id="search_form_sec">
          <form method="post" action="" id="search_form" class="mb-0 mt-3">
            <div class="row">
              <div class="col-md-2 pt-2">
                <label>Payer E-mail:</label>
              </div>
              <div class="col-md-7">
                <input type="text" name="username" placeholder="payer_email" class="payer__email" />
              </div>
              <div class="col-md-2">
                <input type="submit" name="submit" value="Login" class=login_btn />
              </div>
            </div>
          </form>
          <div class="error"><?php echo $error; ?></div>
        </div>
      </div>
      <div class="v-middle">
        <div class="card-main ">
          <div id="container ">
            <!-- <button onclick="getvvvolume()" type="button">What is the volume?</button> -->
            <br>
            <hr>
            <div class="players" id="player2-container">

              <div class="row animated  bounceInUp delay-4s">
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('fire');">
                      <img id="sound_each4" img_op="fire" src="./assets/icons/fire.png">
                    </a>

                    <h3>Fire</h3>
                    <!-- Link -->
                    <div class="">
                      <input type="range" id="vol" volumee="fire" max="1" min="0" step="0.01" onchange="playSoundEach('fire',this.value)" />
                    </div>
                    <!--Audio File-->
                    <audio id="fire" class="fire" src="./assets/sound/glue-fire.mp4" preload="auto" loop></audio>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('thunder');">
                      <img id="sound_each2" img_op="thunder" src="./assets/icons/flash.png" style="width: 70px;">
                    </a>
                    <!-- Link -->
                    <h3>Thunder</h3>

                    <div class="po">
                      <input type="range" id="vol" volumee="thunder" max="1" min="0" step="0.01" onchange="playSoundEach('thunder',this.value)" />
                    </div>

                    <!--Audio File-->
                    <audio id="thunder" class="thunder" src="./assets/sound/glue-thunder.mp4" preload="auto" loop></audio>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('wind');">
                      <img id="sound_each3" img_op="wind" src="./assets/icons/Page-1@2x.png"> </a>
                    <!-- Link -->
                    <h3>Wind</h3>

                    <div class="">
                      <input type="range" id="vol" volumee="wind" max="1" min="0" step="0.01" onchange="playSoundEach('wind',this.value)" />
                    </div>

                    <!--Audio File-->
                    <audio id="wind" src="./assets/sound/glue-wind.mp4" preload="auto" loop></audio>
                  </div>
                </div>
              </div>

              <div class="row animated   bounceInUp  delay-5s">
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('rain');">
                      <img id="sound_each1" img_op="rain" src="./assets/icons/storm.png">
                    </a>
                    <!-- Link -->
                    <h3>Rain</h3>

                    <div class="">
                      <input type="range" id="vol" volumee="rain" max="1" min="0" step="0.01" onchange="playSoundEach('rain',this.value)" />
                    </div>

                    <!--Audio File-->
                    <audio id="rain" class="rain" src="./assets/sound/10-rain.mp3"></audio>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('waves');">
                      <img id="sound_each5" img_op="waves" src="./assets/icons/wave.png" style="width: 70px;">
                    </a>

                    <!-- Link -->
                    <h3>Waves</h3>

                    <div class="po">
                      <input type="range" id="vol" volumee="waves" max="1" min="0" step="0.01" onchange="playSoundEach('waves',this.value)" />
                    </div>

                    <!--Audio File-->
                    <audio id="waves" class="waves" src="./assets/sound/glue-waves.mp4" preload="auto" loop></audio>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('birds');">
                      <img id="sound_each6" img_op="birds" src="./assets/icons/dove.png"> </a>
                    <!-- Link -->
                    <h3>Birds</h3>

                    <div class="">
                      <input type="range" id="vol" volumee="birds" max="1" min="0" step="0.01" onchange="playSoundEach('birds',this.value)" />
                    </div>
                    <!--Audio File-->

                    <audio id="birds" class="birds" src="./assets/sound/glue-birds.mp4" preload="auto" loop></audio>
                  </div>
                </div>
              </div>

              <div class="row animated   bounceInUp  delay-6s">
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('coffe_cup');">
                      <img id="sound_each7" img_op="coffe_cup" src="./assets/icons/coffee-cup.png">
                    </a>
                    <!-- Link -->
                    <h3>Coffee Shop</h3>

                    <div class="">
                      <input type="range" id="vol" volumee="coffe_cup" max="1" min="0" step="0.01" onchange="playSoundEach('coffe_cup',this.value)" />
                    </div>

                    <!--Audio File-->
                    <audio id="coffe_cup" class="coffe_cup" src="./assets/sound/main-people.mp4" preload="auto" loop></audio>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('singing_bowl');">
                      <img id="sound_each8" img_op="singing_bowl" src="./assets/icons/singing-bowl.png" style="width: 130px;
                                            height: 130px;"> </a>

                    <!-- Link -->
                    <h3>Singing Bowl</h3>

                    <div class="po">
                      <input type="range" id="vol" volumee="singing_bowl" max="1" min="0" step="0.01" onchange="playSoundEach('singing_bowl',this.value)" />
                    </div>

                    <!--Audio File-->
                    <audio id="singing_bowl" class="singing_bowl" src="./assets/sound/glue-sbowl.mp4" preload="auto" loop></audio>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="audio-div ">
                    <!-- Image -->
                    <a href="javascript:(new test()).playSound('tv');">
                      <img id="sound_each9" img_op="tv" src="./assets/icons/television@2x.png" style="width: 130px;
                                            height: 130px;"> </a>
                    <!-- Link -->
                    <h3>White Noise</h3>
                    <div class="po">
                      <input type="range" id="vol" max="1" volumee="tv" min="0" step="0.01" onchange="playSoundEach('tv',this.value)" />
                    </div>
                    <!--Audio File-->
                    <audio id="tvvv" class="tvvv" src="./assets/sound/" preload="auto" loop></audio>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body pb-0">
          <div class="text-center pading">
            <p class="font-color pb-4">Play Mix or cancel to Make your own mix</p>
            <div class="row">
              <div class="col-md-6 p-0">
                <button type="button" class="btn-play ply-audio">play</button>
              </div>
              <div class="col-md-6  p-0">
                <button type="button" class="btn-cancel pause-audio" data-dismiss="modal">pause-audio</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php
  // Include configuration file 
  include_once 'config.php';

  // Include database connection file  
  include_once 'dbConnect.php';

  // Start session 
  // session_start(); 

  // Get logged-in user ID from sesion 
  // Session name need to be changed as per your system 
  // $loggedInUserID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; 
  ?>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">subscribe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <div class="">
              <div class="form-group  text-center">
                <label>Subscription Validity:</label>
                <select name="validity" onchange="getSubsPrice(this);">
                  <!-- <option value="1">1 Month</option>
                  <option value="3">3 Month</option>
                  <option value="6">6 Month</option>
                  <option value="9">9 Month</option> -->
                  <option value="12" selected="selected">12 Month</option>
                </select>
              </div>


              <div class="form-group text-center">
                <p><b>Total Price:</b> <span id="subPrice"><?php echo '$' . $itemPrice . ' USD'; ?></span></p>
              </div>


              <form action="<?php echo PAYPAL_URL; ?>" method="post" class="text-center">
                <!-- Identify your business so that you can collect the payments -->
                <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                <!-- Specify a subscriptions button. -->
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <!-- Specify details about the subscription that buyers will purchase -->
                <input type="hidden" name="item_name" value="<?php echo $itemName; ?>">
                <input type="hidden" name="item_number" value="<?php echo $itemNumber; ?>">
                <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
                <input type="hidden" name="a3" id="paypalAmt" value="<?php echo $itemPrice; ?>">
                <input type="hidden" name="p3" id="paypalValid" value="12">
                <input type="hidden" name="t3" value="M">
                <!-- Custom variable user ID -->
                <input type="hidden" name="custom" value="<?php echo $loggedInUserID; ?>">
                <!-- Specify urls -->
                <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                <input type="hidden" name="return" value="   <?php echo PAYPAL_RETURN_URL; ?>">
                <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
                <!-- Display the payment button -->
                <input class="buy-btn btn-success b-radius" type="submit" value="Buy Subscription">
              </form>
            </div>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> 
      </div> -->
      </div>
    </div>
  </div>
  </div>


</body>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>

<script src="./script.js"></script>

<!--  echo $itemPrice; ?> -->

<script>
  // function getSubsPrice(obj) {
  //   var month = obj.value;
  //   var price = (< ?php echo $itemPrice; ?>);
  //   document.getElementById('subPrice').innerHTML = '$' + price + ' USD';
  //   document.getElementById('paypalValid').value = month;
  //   document.getElementById('paypalAmt').value = price;
  //   console.log(month);
  // }

  function getSubsPrice(obj) {
    var month = obj.value;
    var price = 9;
    document.getElementById('subPrice').innerHTML = '$' + price + ' USD';
    document.getElementById('paypalValid').value = month;
    document.getElementById('paypalAmt').value = price;
  }
  $("#search_form_sec").hide();
  $(document).ready(function() {
    $("#button_login").click(function() {
      $("#search_form_sec").fadeToggle();
      $("#paragraph").fadeToggle();


      // $("#div2").fadeToggle("slow");
      // $("#div3").fadeToggle(3000);
    });
  });
</script>

</html>