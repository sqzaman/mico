// Hero full Page

jQuery(document).ready(function ($) {
  function fullscreen() {
    jQuery('#hero').css({
      width: jQuery(window).width(),
      height: jQuery(window).height() - 150
    });
  }

  fullscreen();

  jQuery(window).resize(function () {
    fullscreen();
  });


  $('.modal').on('show.bs.modal', function () {
      $('.modal').not($(this)).each(function () {
          $(this).modal('hide');
      });
  });
/*
  $('a').click(function () {
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 500);
    return false;
  });
*/
  // Check English name, Romanji
  function checkEngChar(validStr, newStr) {
    if (newStr.match(/^[a-zA-Z]+$/gi) || newStr === '') {
      return newStr;
    }
    else {
      return validStr;
    }
  }

  // Check Lastname
  var vali_lastname = "";
  $("#edit-lastname").keyup(function (evt) {
    $("#edit-lastname").val(checkEngChar(vali_lastname, $("#edit-lastname").val()));
    vali_lastname = $("#edit-lastname").val();
  });
  $("#edit-lastname").focusout(function (evt) {
    $("#edit-lastname").val(checkEngChar(vali_lastname, $("#edit-lastname").val()));
    vali_lastname = $("#edit-lastname").val();
  });

  // Check Lastname
  var valid_firstname = "";
  $("#edit-firstname").keyup(function (evt) {
    $("#edit-firstname").val(checkEngChar(valid_firstname, $("#edit-firstname").val()));
    valid_firstname = $("#edit-firstname").val();
  });
  $("#edit-firstname").focusout(function (evt) {
    $("#edit-firstname").val(checkEngChar(valid_firstname, $("#edit-firstname").val()));
    valid_firstname = $("#edit-firstname").val();
  });

  // Token amount
  // Check 0-9 both English and Japanese, then Cancle if other cases
  $("#edit-number-of-token-requested").keydown(function (evt) {
    //console.log("Key down:"+ $("#edit-number-of-token-requested").val());
    //console.log(isNaN($("#edit-number-of-token-requested").val()));

    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(evt.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Allow: Ctrl+A, Command+A
      (evt.keyCode === 65 && (evt.ctrlKey === true || evt.metaKey === true)) ||
      // Allow: home, end, left, right, down, up
      (evt.keyCode >= 35 && evt.keyCode <= 40)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((evt.shiftKey || (evt.keyCode < 48 || evt.keyCode > 57)) && (evt.keyCode < 96 || evt.keyCode > 105)) {
      evt.preventDefault();
    }
  });

  // Calculate projection
  $("#edit-number-of-token-requested").keyup(function (evt) {
    //console.log("Key down:"+ $("#edit-number-of-token-requested").val());
    //if(isNaN($("#edit-number-of-token-requested").val())){
    //    $("#edit-number-of-token-requested").val("");
    //}

    var rex = /[\uFF10-\uFF19]/g;
    var lang = "";
    var str = $("#edit-number-of-token-requested").val();
    str = str.replace(rex, function (ch) {
      return String.fromCharCode(ch.charCodeAt(0) - 65248);
    });
    setTimeout(function () {
      $("#edit-number-of-token-requested").val(str);
    }, 100);

    if (Drupal.settings.mico_core.current_lang == "ja") {
      lang = "/?q=ja";
    } else if (Drupal.settings.mico_core.current_lang == "en") {
      lang = "/?q=en";
    }
    var numberOfToken = str == "" ? 0 : str;
    var reqUrl = Drupal.settings.mico_core.base_url + lang + "/mico/profit-projection/" + numberOfToken;
    console.log(reqUrl);
    $.ajax({
      type: "POST",
      url: reqUrl,
      success: function (data) {
        var ret = JSON.parse(data);
        $("#profit-projection").html(ret.html);
      }
    });
  });


  $("#edit-number-of-token-requested").change(function () {
    var lang = "";
    if (Drupal.settings.mico_core.current_lang == "ja") {
      lang = "/?q=ja";
    } else if (Drupal.settings.mico_core.current_lang == "en") {
      lang = "/?q=en";
    }

    var rex = /[\uFF10-\uFF19]/g;
    var str = $("#edit-number-of-token-requested").val();
    str = str.replace(rex, function (ch) {
      return String.fromCharCode(ch.charCodeAt(0) - 65248);
    });


    //var numberOfToken = $("#edit-number-of-token-requested").val() == "" ? 0 : $("#edit-number-of-token-requested").val();
    var numberOfToken = str == "" ? 0 : str;
    var reqUrl = Drupal.settings.mico_core.base_url + lang + "/mico/profit-projection/" + numberOfToken;
    console.log(reqUrl);
    $.ajax({
      type: "POST",
      url: reqUrl,
      success: function (data) {
        var ret = JSON.parse(data);
        $("#profit-projection").html(ret.html);
      }
    });
  });

  /*

      */
  $("#token-reservation-request").click(function () {

    $("div#message-warning").hide();
    $("div#message-success").hide();
    $("div#message-danger").hide();



    if ($("#edit-email").val() == "" || $("#edit-firstname").val() == "" ||
      $("#edit-lastname").val() == "" || $("#edit-number-of-token-requested").val() == "") {
      $("#message-danger").show();
      return false;
    }

    if (!isEmail($("#edit-email").val())) {
      $("div#message-warning span#message").text(Drupal.t("Invalid email address!"));
      $("div#message-warning").show();
      return false;
    }

    if (!validatePhone($("#edit-phone-number").val())) {
      $("div#message-warning span#message").text(Drupal.t("Invalid phone number!"));
      $("div#message-warning").show();
      return false;
    }


    if ($("#edit-number-of-token-requested").val() < 1) {
      $("div#message-danger span#message").text(Drupal.t("Please reserve at least 1 token."));
      $("div#message-danger").show();
      return false;
    }

    if ($("#edit-number-of-token-requested").val() > 2500) {
      $("div#message-danger span#message").text(Drupal.t("You can't reserve more than 2,500 tokens at once!"));
      $("div#message-danger").show();
      return false;
    }


    $("#ajax-loader-general").show();
    $.ajax({
      type: "POST",
      url: $("#form-token-purchase-request-form").attr("action"),
      data: $("#form-token-purchase-request-form").serialize(), // serializes the form's elements.
      success: function (data) {
        var ret = JSON.parse(data);
        //alert(ret.message);
        if (ret.code == 200) {
          $("#form-token-purchase-request-form").find("input[type=text], textarea").val("");

          $("#reservation-progress").html(ret.progress_status);
          //$("div#message-success").show();
          $("div#message-success span#message").html(ret.message);
          $("div#message-success").show();
          $("#message-modal").modal('show');
        } else {
          $("div#message-warning span#message").html(ret.message);
          $("div#message-warning").show();
        }
        $("#ajax-loader-general").hide();
        //$("#form-token-purchase-request-form")[0].reset();
        //   $("#form-token-purchase-request-form").find("input[type=text], textarea").val("");
      }
    });
    //  e.preventDefault(); // avoid to execute the actual submit of the form.
    return false;

  })

    $("#membership-payment").click(function(){
        $("#membership-payment-spinner").show();
        $("#membership-payment").prop('disabled', true);
        $('#membership-payment-error-msg').hide();
        $("#payment-error-message").hide();
        var lang = "";
        if (Drupal.settings.mico_core.current_lang == "ja") {
            lang = "/ja";
        } else if (Drupal.settings.mico_core.current_lang == "en") {
            lang = "/?q=en";
        }
        var reqUrl = Drupal.settings.mico_core.base_url + lang + "/mico/membership/payment";
        //$("#ajax-loader-general").show();
        $.ajax({
            type: "POST",
            url: reqUrl,
            success: function(data){
                //var ret = JSON.parse(data);
                //console.log(data.html);
                $("#membership-payment-spinner").hide();
                $("#membership-payment").prop('disabled', false);
                if(data.status == 0){
                    $("#coinpayment-info-details").html(data.html);
                    //hide and show required modals
                    $('#getMembership').modal('hide');
                    $('#coinpayment-info').modal('show');
                }

                if(data.status == 1){
                    $("#coinpayment-info-details").html(data.html);
                    $("#payment-error-message").text(data.message).show();
                    //hide and show required modals
                    $('#getMembership').modal('hide');
                    $('#coinpayment-info').modal('show');
                }
                if(data.status == 2){
                    window.location = "/user";
                }

                if(data.status < 0){
                    $('#membership-payment-error-msg').text(data.message).show();
                }
              //$("#ajax-loader-general").hide();
            }
        });
    })

})


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function validatePhone(a) {
  //var a = document.getElementById(txtPhone).value;
  var filter = /^[0-9-+]+$/;
  return filter.test(a);
}



// Countdown

var countDownDate = new Date("Dec 31, 2017 23:59:00 GMT+9").getTime();
var x = setInterval(function () {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  var days_trans = Drupal.t('days');
  var hours_trans = Drupal.t('hours');
  var minutes_trans = Drupal.t('minutes');
  var seconds_trans = Drupal.t('seconds');


  if (document.getElementById("countdown") != null) {
    document.getElementById("countdown").innerHTML = "<div class='days'><div class='number'>" + days + "</div>" + days_trans + "</div>" + "<div class='hours'><div class='number'>" + hours + "</div>" + hours_trans + "</div> " + "<div class='minutes'><div class='number'>" + minutes + "</div> " + minutes_trans + "</div>" + "<div class='seconds'><div class='number'>" + seconds + "</div>" + seconds_trans + "</div>";
  }


  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "EXPIRED";
  }
}, 1000);


// Back to Top

window.onscroll = function () {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("backToTop").style.display = "block";
  } else {
    document.getElementById("backToTop").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0; // For Chrome, Safari and Opera
  document.documentElement.scrollTop = 0; // For IE and Firefox
}

window.sr = ScrollReveal();
sr.reveal('.img-gpu');
sr.reveal('.more-informations .container');
sr.reveal('.status .container');
sr.reveal('.milestones .container');
sr.reveal('.lifecycle .container');
sr.reveal('.terms .container');
sr.reveal('.withdraw .container');
sr.reveal('.priviliege .container');
sr.reveal('.schedule .container');

jQuery("document").ready(function ($) {

  var nav = $('.nav');
  var button = $('.reservation-button');
  $(window).scroll(function () {
    if ($(this).scrollTop() > 136) {
      nav.addClass("f-nav");
      button.addClass("f-nav");
    } else {
      nav.removeClass("f-nav");
      button.removeClass("f-nav");
    }
  });
});


function maxLength(a, k) {
    if (a === undefined || a.length === 0) {
        return 0;
    }
    var maxValue = 0;
    var len = a.length;
    for (var i = 0; i < len; i++) {
        var start = a[i];
        if (start >= k) {
            if (maxValue < 1) {
                maxValue = 1;
            }
        } else {
            var sum = start;
            for (var j = i + 1; j < len; j++) {
                sum = sum + a[j];
                if (sum > k) {
                    if (maxValue < (j - i)) {
                        maxValue = j - i;
                    }
                    break;
                }
                if (sum <= k && j === (len - 1)) {
                    if (maxValue < (j - i + 1)) {
                        maxValue = j - i + 1;
                    }
                }
            }

        }
    }

    return maxValue;
}
