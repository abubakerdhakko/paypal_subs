<!DOCTYPE html>
<html lang="en">

<head>
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
.btn-dgn{
  color: white !important;
  background-color: transparent !important;
    border-color: #dddddd !important;
}
</style>
</head>
<body>
<script>
console.log('sub.php');
</script>

    <div id="load"></div>
    <div class="bg-main">
        <nav class="navbar navbar-light bg-nav">
          <a class="navbar-brand" href="index.php">
                <img src="./assets/img/logo-bliss_zone.png" width="45" height="45" alt=""><span>Bliss Zone</span>
            </a> 
            <div class="text-right fade-p">
                <div class="d-flex justify-content-start">
                    <div class="">
                        <p>master volume</p>
                    </div>
                    <div class="pl-3 pt-3">
                        <input type="range" id="vol" max="1" min="0" step="0.01" onchange="changevolume(this.value)" />
                        <div id="audioSlider"></div>
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
            <div class="v-middle">
                <div class="card-main ">
                    <div id="container ">
                        <!-- <button onclick="getvvvolume()" type="button">What is the volume?</button> -->


                            <div class="row animated  bounceInUp delay-4s">
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('fire');">
                                            <img id="sound_each4" img_op="fire" src="./assets/icons/fire.png">
                                        </a>

                                        <h3>Fire</h3>
                                        <!-- Link -->
                                        <div class="">
                                            <input type="range" id="vol" volumee="fire" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('fire',this.value)" />
                                        </div>
                                        <!--Audio File-->
                                        <audio id="fire" class="fire" src="./assets/sound/glue-fire" preload="auto"
                                            loop></audio>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('thunder');">
                                            <img id="sound_each2" img_op="thunder" src="./assets/icons/flash.png"
                                                style="width: 70px;">
                                        </a>
                                        <!-- Link -->
                                        <h3>Thunder</h3>

                                        <div class="po">
                                            <input type="range" id="vol" volumee="thunder" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('thunder',this.value)" />
                                        </div>

                                        <!--Audio File-->
                                        <audio id="thunder" class="thunder" src="./assets/sound/glue-thunder"
                                            preload="auto" loop></audio>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('wind');">
                                            <img id="sound_each3" img_op="wind" src="./assets/icons/Page-1@2x.png"> </a>
                                        <!-- Link -->
                                        <h3>Wind</h3>

                                        <div class="">
                                            <input type="range" id="vol" volumee="wind" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('wind',this.value)" />
                                        </div>

                                        <!--Audio File-->
                                        <audio id="wind" src="./assets/sound/glue-wind" preload="auto" loop></audio>
                                    </div>
                                </div>
                            </div>

                            <div class="row animated   bounceInUp  delay-5s">
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('rain');">
                                            <img id="sound_each1" img_op="rain" src="./assets/icons/storm.png">
                                        </a>
                                        <!-- Link -->
                                        <h3>Rain</h3>

                                        <div class="">
                                            <input type="range" id="vol" volumee="rain" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('rain',this.value)" />
                                        </div>

                                        <!--Audio File-->
                                        <audio id="rain" class="rain" src="./assets/sound/10-rain.mp3"></audio>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('waves');">
                                            <img id="sound_each5" img_op="waves" src="./assets/icons/wave.png"
                                                style="width: 70px;">
                                        </a>

                                        <!-- Link -->
                                        <h3>Waves</h3>

                                        <div class="po">
                                            <input type="range" id="vol" volumee="waves" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('waves',this.value)" />
                                        </div>

                                        <!--Audio File-->
                                        <audio id="waves" class="waves" src="./assets/sound/glue-waves"
                                            preload="auto" loop></audio>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('birds');">
                                            <img id="sound_each6" img_op="birds" src="./assets/icons/dove.png"> </a>
                                        <!-- Link -->
                                        <h3>Birds</h3>

                                        <div class="">
                                            <input type="range" id="vol" volumee="birds" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('birds',this.value)" />
                                        </div>
                                        <!--Audio File-->

                                        <audio id="birds" class="birds" src="./assets/sound/glue-birds"
                                            preload="auto" loop></audio>
                                    </div>
                                </div>
                            </div>

                            <div class="row animated   bounceInUp  delay-6s">
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('coffe-cup');">
                                            <img id="sound_each7" img_op="coffe-cup"
                                                src="./assets/icons/coffee-cup.png">
                                        </a>
                                        <!-- Link -->
                                        <h3>Coffee Shop</h3>

                                        <div class="">
                                            <input type="range" id="vol" volumee="coffe-cup" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('coffe-cup',this.value)" />
                                        </div>

                                        <!--Audio File-->
                                        <audio id="coffe-cup" class="coffe-cup" src="./assets/sound/main-people"
                                            preload="auto" loop></audio>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('singing_bowl');">
                                            <img id="sound_each8" img_op="singing_bowl"
                                                src="./assets/icons/singing-bowl.png" style="width: 130px;
                                            height: 130px;"> </a>

                                        <!-- Link -->
                                        <h3>Singing Bowl</h3>

                                        <div class="po">
                                            <input type="range" id="vol" volumee="singing_bowl" max="1" min="0" step="0.01"
                                                onchange="playSoundEach('singing_bowl',this.value)" />
                                        </div>

                                        <!--Audio File-->
                                        <audio id="singing_bowl" class="singing_bowl"
                                            src="./assets/sound/glue-sbowl" preload="auto" loop></audio>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="audio-div ">
                                        <!-- Image -->
                                        <a href="javascript:playSound('tv');">
                                            <img id="sound_each9" img_op="tv" src="./assets/icons/television@2x.png"
                                                style="width: 130px;
                                            height: 130px;"> </a>
                                        <!-- Link -->
                                        <h3>White Noise</h3>
                                        <div class="po">
                                            <input type="range" id="vol" max="1" volumee="tv" min="0" step="0.01"
                                                onchange="playSoundEach('tv',this.value)" />
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
                                <button type="button" class="btn-cancel pause-audio"
                                    data-dismiss="modal">pause-audio</button>
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
session_start(); 
 
// Get logged-in user ID from sesion 
// Session name need to be changed as per your system 
$loggedInUserID = !empty($_SESSION['userID'])?$_SESSION['userID']:11; 
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

      <div class="form-group">
    <label>Subscription Validity:</label>
    <select name="validity" onchange="getSubsPrice(this);">
        <option value="1" selected="selected">1 Month</option>
        <!-- <option value="3">3 Month</option>
        <option value="6">6 Month</option> -->
        <option value="9">9 Month</option>
        <!-- <option value="12">12 Month</option> -->
    </select>
</div>
<div class="form-group">
    <p><b>Total Price:</b> <span id="subPrice"><?php echo '$'.$itemPrice.' USD'; ?></span></p>
</div>

<!-- Buy button -->
<form action="<?php echo PAYPAL_URL; ?>" method="post">
    <!-- Identify your business so that you can collect the payments -->
    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
    <!-- Specify a subscriptions button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- Specify details about the subscription that buyers will purchase -->
    <input type="hidden" name="item_name" value="<?php echo $itemName; ?>">
    <input type="hidden" name="item_number" value="<?php echo $itemNumber; ?>">
    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
    <input type="hidden" name="a3" id="paypalAmt" value="<?php echo $itemPrice; ?>">
    <input type="hidden" name="p3" id="paypalValid" value="1">
    <input type="hidden" name="t3" value="M">
    <!-- Custom variable user ID -->
    <input type="hidden" name="custom" value="<?php echo $loggedInUserID; ?>">
    <!-- Specify urls -->
    <input type="hidden" name="cancel_return" value="http://bliss-zone.herokuapp.com/cancel.php">
    <input type="hidden" name="return" value="http://bliss-zone.herokuapp.com/success.php">
    <input type="hidden" name="notify_url" value="http://bliss-zone.herokuapp.com/paypal_ipn.php">
    <!-- Display the payment button -->
    <input class="buy-btn btn-success" type="submit" value="Buy Subscription">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
function getSubsPrice(obj){
  var month = obj.value;
  // itemPrice
	var price = itemPrice
	document.getElementById('subPrice').innerHTML = '$'+price+' USD';
	document.getElementById('paypalValid').value = month;
	document.getElementById('paypalAmt').value = price;
}
</script>
</html>