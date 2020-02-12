var current_location;
var ids_for_sounds = '';
var playing = false;
var arr = [];
var global_volume = true;
var master_vol = '';

var arr_sounds = { fire: false, thunder: false, wind: false, rain: false, waves: false, birds: false, coffe_cup: false, singing_bowl: false, tv: false };

function test() {
    this.playSound = function (v) {
        var myAudio = document.getElementById(v);
        var number = v
        console.log("number", number)
        var a = $('[volumee="' + number + '"]').val(Number($('[volumee="' + number + '"]').val()) + 0.24);
        console.log('master_vol', master_vol)
        console.log("a.val()", a)
        if (a.val() >= 1) {
            a.val(0)
        }
        if (a.val() < 1) {
            if (arr_sounds[v] == false) {
                var vol_idd = document.getElementById(v)
                vol_idd.play();

                arr_sounds[v] = true;
                $('[img_op="' + v + '"]').addClass('opClass')
                var input_val = $('[volumee="' + v + '"]').val();
                if (input_val == 0) {
                    vol_idd.volume = 0;
                }

            }
        }

        if (a.val() == 0) {
            // debugger;
            $('[img_op="' + v + '"]').removeClass('opClass')
            document.getElementById(v).pause();
            arr_sounds[v] = false;
        }
        $('[volumee="' + number + '"]').trigger('change');
    };

    this.create_url = function () {

        // var idSelector = function () { return this.class; };
        // var grantedId = $(":checkbox:checked").map(idSelector).get();
        // var Denied = $(":checkbox:not(:checked)").map(idSelector).get();
        // var idSelector = "";
        // $.each($("input[name='today_check']:checked"), function () {
        //   idSelector += "," + $(this).val();
        // });

        idArray = [];
        $.each(arr_sounds, function (index, value) {
            if (value)
                idArray.push(index);
        })
        idSelector = idArray.join(',');

        if (idSelector) {
            // idSelector = idSelector.substring(1);


            var nameArr = idSelector.split(',');
            var current_location = 'https://supernaturalbp.com/apps/bliss/?sounds=';
            var sounds_array = [];
            for (j = 0; j < nameArr.length; j++) {
                console.log("idSelector:", nameArr[j]);
                // var sounds = document.getElementsByClassName(nameArr[j]);
                // for (i = 0; i < sounds.length; i++) sounds[i].play();
                // console.log('idSelector_sounds', sounds.volume)
                var number = nameArr[j];
                var myDiv = $('[volumee="' + number + '"]')
                var myValue = myDiv.val()
                var cob = nameArr[j] + ":" + myValue;
                sounds_array.push(cob);
                console.log('cob:', cob)

            }

            // alert("Granted: " + grantedId + "\nDenied: " + Denied);
            // var current_location = window.location.href;
            current_location += sounds_array.join(',');

            console.log('current_location:', current_location);
            var input_value = document.getElementById('current_shared_url').value = current_location;
            console.log('input_value:', input_value);


            // this.share_fb(current_location);
            // this.share_linkdin(current_location);
            // this.share_twitter(current_location);
        } else {
            alert('Please choose atleast one value.');
        }

    };



    this.share_fb = function () {
        console.log('fb-url: test ', current_location)
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + current_location, 'facebook-share-dialog', "width=626, height=436")
    }
    this.share_linkdin = function () {
        console.log('linkdin-url: ', current_location)
        window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + current_location, 'facebook-share-dialog', "width=626, height=436")
    }
    this.share_twitter = function () {
        console.log('twitter-url: ', current_location)
        window.open("https://twitter.com/share?url=" + current_location, 'facebook-share-dialog', "width=626, height=436")
    }
    this.create_urll = function () {
        idArray = [];
        $.each(arr_sounds, function (index, value) {
            if (value)
                idArray.push(index);
        })
        idSelector = idArray.join(',');
        console.log(idSelector)


        var sounds_array = [];
        var nameArr = idSelector.split(',');
        for (j = 0; j < nameArr.length; j++) console.log("nameArr[j]:", nameArr[j]);
        var vol_id = nameArr[j]
        var vol = 0.20;
        var interval = 5000; // 200ms interval

        var fadeout = setInterval(
            function () {
                // Reduce volume by 0.05 as long as it is above 0
                // This works as long as you start with a multiple of 0.05!
                if (vol > 0) {
                    vol = 0.05;
                    var audio_voll = document.getElementById('rain')
                    console.log('audio_voll', audio_voll)
                    // for (j = 0; j < audio_voll.length; j++)
                    audio_voll.volume = vol

                } else {
                    // Stop the setInterval when 0 is reached
                    clearInterval(fadeout);
                }
            }, interval);




    }
    //  share_linkdin(url);

}



// document.getElementById("masterAudio").addEventListener("change", function () {

//     var masterVolume = document.getElementById('masterAudio').value;
//     var master_vol = masterVolume
//     console.log(master_vol)
//     var sounds = document.getElementsByTagName('audio');
//     for (i = 0; i < sounds.length; i++) sounds[i].volume = master_vol;
// });
function masterChangeVolume(amount) {
    var masterVolume = document.getElementById('masterAudio').value;
    var master_vol = masterVolume
    console.log(master_vol)
    var sounds = document.getElementsByTagName('audio');
    for (i = 0; i < sounds.length; i++) sounds[i].volume = master_vol;
};
jQuery(function () {
    var timer;

    $('#playButton').hide();
    document.getElementById('stopButton').onclick = function () {
        global_volume = false;
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].volume = 0;
        console.log('stopButton')
        $('#stopButton').hide();
        $('#playButton').show();
        // $('#stopButton').fadeIn(400);
        clearInterval(timer);
        $('.click-stop-stop').removeClass('add-stop-stop');
        console.log('stopButton');
        console.log('global_volume', global_volume)
    };
    document.getElementById('playButton').onclick = function () {
        global_volume = true;
        // var sounds = document.getElementsByTagName('audio');
        // for (i = 0; i < sounds.length; i++) sounds[i].volume = 0.5
        var index = 0;
        idArray = [];
        $.each(arr_sounds, function (index, value) {
            if (value)
                idArray.push(index);
        })
        idSelector = idArray.join(',');
        // if (idSelector) {
        //   // idSelector = idSelector.substring(1);
        // } else {
        //   alert('Please choose atleast one value.');
        // }
        var nameArr = idSelector.split(',');
        var sounds_names = nameArr[index];
        var a = $('[volumee="' + sounds_names + '"]').val();
        // console.log("a_before", sounds_names, a)
        if (a > 0) {
            console.log("inner_if_play")
            // debugger;
            var sounds_fade = document.getElementById(nameArr[index]);
            sounds_fade.volume = a;
            // var asd = $('[volumee="' + sounds_names + '"]').val(Number($('[volumee="' + sounds_names + '"]').val()) + 0.24);
            // console.log("a_after", sounds_fade, a)

        }

        if (index == (nameArr.length - 1))
            index = 0;
        else
            index += 1;

        $('#playButton').hide();
        $('#stopButton').show();
        // $('#stopButton').fadeIn(400);
        console.log('playButton');

        console.log('global_volume', global_volume)
    }

    var timer;
    $("#start-stop").click(function () {
        if (timer) {
            clearInterval(timer);
            timer = undefined;
            console.log('stop')
            $('.click-stop-stop').removeClass('add-stop-stop');

        } else {
            console.log('entered in else')
            if (global_volume == true) {

                $('.click-stop-stop').addClass('add-stop-stop');

                var index = 0;

                timer = setInterval(function () {

                    console.log('start');

                    idArray = [];
                    $.each(arr_sounds, function (index, value) {
                        if (value)
                            idArray.push(index);
                    })
                    idSelector = idArray.join(',');

                    // if (idSelector) {
                    //   // idSelector = idSelector.substring(1);
                    // } else {
                    //   alert('Please choose atleast one value.');
                    // }
                    var nameArr = idSelector.split(',');
                    var sounds_names = nameArr[index];


                    var a = $('[volumee="' + sounds_names + '"]').val();
                    console.log("a_before", sounds_names, a)
                    if (a > 0) {
                        console.log("inner_if")
                        // debugger;
                        var sounds_fade = document.getElementById(nameArr[index]);
                        var aaa = sounds_fade.volume = 1;
                        console.log("aa_after", sounds_fade, aaa)
                        if ((index - 1) != -1)
                            document.getElementById(nameArr[index - 1]).volume = 0.24;
                        console.log("a_after", sounds_names, a)
                    }

                    if (index == (nameArr.length - 1))
                        index = 0;
                    else
                        index += 1;
                }, 5000);
            }
        }
    });
})

// $(document).ready(function () {
//   $("#rain").volume = 0;
//   $("#rain").animate({ volume: 1 }, 3000);
// });

// $(document).ready(function () {
//   var input_var = document.getElementById('vol');
//   for (i = 0; i < input_var.length; i++)
//     var abc = input_var[i].val();
//   console.log(abc)
//   if (abc < 0.3) {
//     var audio_var = document.getElementsByTagName('audio')
//     audio_var.volume = 0;
//     console.log('xxx')
//   }

// });


$(document).ready(function () {


    // var url_string = "http://www.example.com/t.html?a=1&b=3&c=m2-m3-m4-m5"; //window.location.href
    var url_string = window.location.href
    // console.log('url_string', url_string);
    var url = new URL(url_string);
    // console.log('url', url);
    var c = url.searchParams.get("sounds");
    console.log('c:', c)

    if (c != null) {
        $("#myModal").modal()
        // $("#popup-box").hide();
        // $('#myModal').modal({
        //   backdrop: 'static',
        //   keyboard: false
        // })
        // var word = "less than some value";
        // var split = word.split(" ");
        // var a = split[0] + " " + split[1];
        // var b = split[2] + " " + split[3];
        // console.log(a); //logged "less than"
        // console.log(b); //logged "some value"
        $(".ply-audio").click(function () {
            var nameArr = c.split(',');
            for (j = 0; j < nameArr.length; j++) {
                sound_id = nameArr[j].split(':')[0];
                volumee = nameArr[j].split(':')[1];
                console.log("volume:", volumee);
                var sounds = document.getElementsByClassName(sound_id);
                console.log('sound_id', sound_id)
                for (i = 0; i < sounds.length; i++) {
                    sounds[i].play();
                    sounds[i].volume = volumee;
                    var slider_no = sound_id;
                    var myDiv = $('[volumee="' + slider_no + '"]')
                    var myValue = myDiv.val(volumee)
                    var number = sound_id;
                    var myDiv = $('img[img_op="' + number + '"]').addClass("opClass");
                }
                // volume
                // var sounds_volume = document.getElementsByClassName(volume);
                // console.log('volume', sounds_volume)
                // for (i = 0; i < sounds.length; i++) sounds[i].volume = sounds_volume;

            }
        });
        $(".pause-audio").click(function () {
            $("#myModal").hide()
            var nameArr = c.split(',');
            for (j = 0; j < nameArr.length; j++) {
                sound_id = nameArr[j].split(':')[0];
                volumee = nameArr[j].split(':')[1];
                console.log("searchParams:", nameArr[j]);
                var sounds = document.getElementsByClassName(sound_id);
                console.log('sound_id', sound_id)
                for (i = 0; i < sounds.length; i++) sounds[i].pause();
                var number = sound_id;
                var myDiv = $('img[img_op="' + number + '"]').removeClass("opClass");
                console.log('number:', number)
            }
        });
    };
});

function copyFunction() {
    /* Get the text field */
    var copyText = document.getElementById("current_shared_url");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    // alert("Copied the text: " + copyText.value);
}





$(function () {
    // better to use `document` instead of `this` for readability
    $(document).on('click', '.my-div', function (e, animal) {
        var that = $(this);
        if (that.hasClass('already-clicked')) {
            // bail out
            console.log('Already clicked')
            return
        } else {
            that.addClass('already-clicked');
            var data = that.data();
            data.id = this.id;
            console.log(JSON.stringify(data))
            // do your ajax
        }
    });
})


function myFunction() {
    var x = document.getElementById("Selector").value;
    if (x === 'wet') {
        $('a img').removeClass('opClass');
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].pause();
        setTimeout(function () {
            var birds_mix = document.getElementById('rain');
            birds_mix.play();
            var birds_sound = document.getElementById('fire');
            birds_sound.play();
            $('#sound_each1').addClass('opClass ');
            $('#sound_each4').addClass('opClass ');
        }, 500);
    }
    if (x === 'airy') {
        $('a img').removeClass('opClass');
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].pause();
        var sounds = document.getElementsByTagName('audio');
        setTimeout(function () {
            var wind_mix = document.getElementById('wind');
            wind_mix.play();
            var tv_sound = document.getElementById('tv');
            tv_sound.play();
            $('#sound_each3').addClass('opClass ');
            $('#sound_each9').addClass('opClass ');
        }, 500);
    }
    if (x === 'High_tide') {
        $('a img').removeClass('opClass');
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].pause();
        setTimeout(function () {
            var wind_mix = document.getElementById('waves');
            wind_mix.play();
            var tv_sound = document.getElementById('coffe_cup');
            tv_sound.play();
            $('#sound_each5').addClass('opClass ');
            $('#sound_each7').addClass('opClass ');
        }, 500);
    }
    if (x === 'Ambient') {
        $('a img').removeClass('opClass');
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].pause();
        setTimeout(function () {
            var singing_bowl_mix = document.getElementById('singing_bowl');
            singing_bowl_mix.play();
            var coffeCup_sound = document.getElementById('coffe_cup');
            coffeCup_sound.play();
            $('#sound_each8').addClass('opClass ');
            $('#sound_each7').addClass('opClass ');
        }, 500);
    }
    if (x === 'turbulent') {
        $('a img').removeClass('opClass');
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].pause();
        setTimeout(function () {
            var thunder_mix = document.getElementById('thunder');
            thunder_mix.play();
            var coffeCup_sound = document.getElementById('waves');
            coffeCup_sound.play();
            $('#sound_each2').addClass('opClass ');
            $('#sound_each5').addClass('opClass ');
        }, 500);
    }


}
$("#random_mix_items").hide();
$("#shared-items").hide();
$("#start_stop-items").hide();
$("#login-sec").hide();

$(document).ready(function () {
    $("#button_share").click(function () {
        $("#start_stop-items").hide();
        $("#random_mix_items").hide();
        $("#shared-items").fadeToggle();
        // $("#div2").fadeToggle("slow");
        // $("#div3").fadeToggle(3000);
    });

});

$(document).ready(function () {

    $("#start_stop").click(function () {

        $("#shared-items").hide();
        $("#random_mix_items").hide();
        $("#start_stop-items").fadeToggle();
        // $("#div2").fadeToggle("slow");
        // $("#div3").fadeToggle(3000);
    });
});

$(document).ready(function () {
    $("#random_mix_items").hide();

    $("#random_mix").click(function () {

        $("#shared-items").hide();
        $("#start_stop-items").hide();

        $("#random_mix_items").fadeToggle();
        // $("#div2").fadeToggle("slow");
        // $("#div3").fadeToggle(3000);
    });
});

$("input[type=time]").on("change", function () {
    console.log(this.valueAsDate)
})
// function playSound(animal, amount) {
//   var sound_each = document.getElementById(animal);
//   // for (i = 0; i < sound_each.length; i++) {
//   // console.log('sound_each: ', sound_each);
//   // for (i = 0; i < sound_each.length; i++) sound_each[i].play();

//   return sound_each.paused() ? sound_each.play() : sound_each.pause();
//   console.log(sound_each);
//   // }
// };



$('div.pinIt').click(function () {
    var url = $(this).closest('.showPin').find('img.lazy').attr('src');
    alert(url);
});
$(document).ready(function () {

});


plyr.setup(document.querySelectorAll('.js-plyr'), {});
// master volume

$("input[type=time]").on("change", function () {
    console.log(this.valueAsDate)
})

function countdown() {
    var t = document.getElementById('number').value;
    var check = t * 60000;
    setTimeout(function () {
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].volume = 0.4;
        $('#playButton').hide();
        $('#stopButton').show();

    }, check);
    console.log('t', check)

    document.getElementById("div_timer").innerHTML = check; // this is the same as $("div_timer").html(timer) in       jquery.

}




function countdown_stop() {
    var t = document.getElementById('number_stop').value;
    var check = t * 60000;
    setTimeout(function () {
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].volume = 0;
        $('#playButton').show();
        $('#stopButton').hide();
    }, check);
    console.log('t', check)
}
// fade in
var elem = document.getElementById('fadeInVolume');

var timerId = null;

var rangeValue = function () {
    clearInterval(timerId);
    var delay = elem.value;
    timerId = setTimeout(function () {
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].play();
    }, delay);
    console.log('delay:', delay);
    console.log('timerId:', timerId)

}

// elem.addEventListener("input", rangeValue);


// fade out
var elem = document.getElementById('fadeOutVolume');

var timerId = null;

var rangeValue = function () {
    clearInterval(timerId);
    var delay = elem.value;
    timerId = setTimeout(function () {
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].pause();
    }, delay);
}

// elem.addEventListener("input", rangeValue);

function sliderChange(val) {
    document.getElementById('output').innerHTML = val; // get
}
// document.getElementById('slider').value = 50; // set


function sliderChangeFadeOut(val) {
    document.getElementById('outputFadeOut').innerHTML = val; // get
}
// document.getElementById('slider').value = 50; // set



function playSoundEach(animal, amount) {
    var sound_each = document.getElementById(animal);

    var masterVolume = document.getElementById('masterAudio').value;
    var master_vol = masterVolume
    if (global_volume == true) {
        if (master_vol > amount) {
            sound_each.volume = amount;
        }
        if (master_vol < amount) {
            sound_each.volume = master_vol;
        }
        console.log('master_vol', master_vol, "amount", amount)
    }
};






$('.vol-down').hide()
function setVolume(numbers) {
    var number = numbers
    console.log("number", number)
    var a = $('[volumee="' + number + '"]').val(Number($('[volumee="' + number + '"]').val()) + 0.24);
    console.log('master_vol', master_vol)
    console.log("a", a)
    if (a.val() >= 1) {
        a.val(0)
    }
    $('[volumee="' + number + '"]').trigger('change');
};

if (typeof (Storage) === "undefined") {
    alert('Your browser is outdated!');
}
// var aNumber = [];
function setLocalStorage() {
    if (localStorage.getItem('server') != "") {

        var data = document.getElementById('current_shared_url').value;
        if (data != '') {
            // aNumber.push(number);
            // localStorage.setItem('server', JSON.stringify(aNumber));
            // console.log(localStorage.getItem('server'));

            var mix = JSON.parse(localStorage.getItem('server') || "[]");

            // var data = document.getElementById("locationName").value;
            mix.push(data);
            localStorage.setItem('server', JSON.stringify(mix));

            // console.log(asd) 
            getLocalStorage()
        } else {

            var temp = "";
            temp += '<p>Please Create Mix First</p>';
            var c = document.getElementById('data').innerHTML = temp;
        }
    }
}


function getLocalStorage() {
    // var storedMix = localStorage.getItem('server');
    var storedMix = JSON.parse(localStorage.getItem("server"));

    var temp = "";
    if (!storedMix) {
        console.log('jjjj')
        temp += '<p>Nothing To Show</p>';
        var c = document.getElementById('data').innerHTML = temp;

        return []; // return empty array

    } else {
        var str = '<ul>'
        for (var i = 0; i < storedMix.length; i++) {
            temp += '<li class="li-mix"> <div class="d-flex justify-content-between"> ' + storedMix[i] + '<button id="' + i.toString() + '" onclick="playTune(this)" class="ml-3 mix-btn-st btn btn-primary fs-btn-ply">Play Mix</button>' +
                '<button id="' + i.toString() + '" onclick="removeItem(this)" class="ml-3 mix-btn-st btn btn-primary fs-btn-ply">Remove Mix</button>'
                + '</div> </li>';
        }
        str += '</ul>';
        var c = document.getElementById('data').innerHTML = temp;
    }
}
$(document).ready(function () {
    getLocalStorage();
});



function removeItem(id) {
    index = parseInt($(id).attr('id'));
    // var obj = JSON.parse(localStorage.getItem("server"));
    // var a = obj[index];

    var obj = JSON.parse(localStorage.getItem("server"));
    obj.splice(index, 1); // delete item at index
    localStorage.setItem("server", JSON.stringify(obj)); //set item back into storage
    if (obj == '') {
        console.log('jjjj')
        getLocalStorage();
    }

}





// console.log(localStorage.cart);
// removeItem("01");
// console.log(localStorage.cart);

function playTune(object) {
    index = parseInt($(object).attr('id'));
    var storedMix = JSON.parse(localStorage.getItem("server"));
    var a = storedMix[index];
    // debugger;
    var c = a.split('sounds=')[1];
    console.log(c)
    var nameArr = c.split(',');
    for (j = 0; j < nameArr.length; j++) {
        sound_id = nameArr[j].split(':')[0];
        volumee = nameArr[j].split(':')[1];
        console.log("volume:", volumee);
        var sounds = document.getElementsByClassName(sound_id);
        console.log('sound_id', sound_id)
        for (i = 0; i < sounds.length; i++) {
            sounds[i].play();
            sounds[i].volume = volumee;
            var slider_no = sound_id;
            var myDiv = $('[volumee="' + slider_no + '"]')
            var myValue = myDiv.val(volumee)
            var number = sound_id;
            var myDiv = $('img[img_op="' + number + '"]').addClass("opClass");
        }
        // volume
        // var sounds_volume = document.getElementsByClassName(volume);
        // console.log('volume', sounds_volume)
        // for (i = 0; i < sounds.length; i++) sounds[i].volume = sounds_volume;

    }

}
function clearMix() {
    console.log('clear')
    localStorage.clear();
    getLocalStorage();


};
$('.revert').hide();
function create_trash() {
    $('.revert').show();
    $('.trash').hide();

    idArray = [];
    $.each(arr_sounds, function (index, value) {
        if (value)
            idArray.push(index);
    })
    idSelector = idArray.join(',');

    if (idSelector) {

        var nameArr = idSelector.split(',');
        var sounds_array = [];
        for (j = 0; j < nameArr.length; j++) {
            console.log("idSelector:", nameArr[j]);
            var number = nameArr[j];
            var myDiv = $('[volumee="' + number + '"]')
            var myValue = myDiv.val()
            var cob = nameArr[j] + ":" + myValue;
            sounds_array.push(cob);
            console.log('cob:', cob)

        }
        var current_locationv = sounds_array.join(',');
        console.log('current_locationv:', current_locationv);
        var input_value = document.getElementById('revert').value = current_locationv;
        console.log('input_valuev:', input_value);
    }


    var c = 'fire:0,thunder:0,wind:0,rain:0,waves:0,birds:0,coffe_cup:0,singing_bowl:0';
    console.log(c)
    var nameArr = c.split(',');
    for (j = 0; j < nameArr.length; j++) {
        sound_id = nameArr[j].split(':')[0];
        volumee = nameArr[j].split(':')[1];
        console.log("volume:", volumee);
        var sounds = document.getElementsByClassName(sound_id);
        console.log('sound_id', sound_id)
        for (i = 0; i < sounds.length; i++) {
            sounds[i].play();
            sounds[i].volume = volumee;
            var slider_no = sound_id;
            var myDiv = $('[volumee="' + slider_no + '"]')
            var myValue = myDiv.val(volumee)
            var number = sound_id;
            var myDiv = $('img[img_op="' + number + '"]').removeClass("opClass");

        }

    }

}

function create_revert() {
    $('.revert').hide();
    $('.trash').show();
    var c = document.getElementById('revert').value;
    console.log('revert_var:', c)
    var nameArr = c.split(',');
    for (j = 0; j < nameArr.length; j++) {
        sound_id = nameArr[j].split(':')[0];
        volumee = nameArr[j].split(':')[1];
        console.log("volume:", volumee);
        var sounds = document.getElementsByClassName(sound_id);
        console.log('sound_id', sound_id)
        for (i = 0; i < sounds.length; i++) {
            sounds[i].play();
            sounds[i].volume = volumee;
            var slider_no = sound_id;
            var myDiv = $('[volumee="' + slider_no + '"]')
            var myValue = myDiv.val(volumee)
            var number = sound_id;
            var myDiv = $('img[img_op="' + number + '"]').addClass("opClass");
        }

    }

}



