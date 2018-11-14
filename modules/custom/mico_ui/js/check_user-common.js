jQuery( document ).ready(function($) {

    $(document.body).on('click', '.form-type-checkbox' ,function(){
        var total_checked_checkbox = $("input:checkbox:checked").length;
        if(total_checked_checkbox > 20){
            $('#myLatestModal').modal({
                show: 'true'
            });
            return false;
        }
    })

    $("#edit-profile-main-field-measurement-standard-und-metric").click(function() {
        setMeasurementStandard(true);
    });

    $("#edit-profile-main-field-measurement-standard-und-us").click(function() {
        setMeasurementStandard(false);
    });


    /* Help page js start */
    $('.page-help div.block-block').click(function() {

        var _cur_id = $(this).attr('id');

        $('.page-help div.block-block').each(function(){
            if(_cur_id != $(this).attr('id'))
                $(this).children('div.content').hide();
        });

        $(this).children('div.content').slideToggle();

    });

    $("#searchBig").keyup(function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;

        // Loop through the comment list
        $(".panel-collapse").each(function(){
            jQuery(this).unhighlight();
            jQuery(this).highlight(filter);


            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut().css('height','0px');;

                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show().css('height','auto').addClass('in');
                count++;
            }
        });

    });


    var striped_color_index = 1;
    var i = 0;
    var total_athletes = $("div.athlete-row").length;
    var all_color_bank = ['color10 stripes', 'color9 stripes', 'color8 stripes', 'color7 stripes',
        'color6 stripes', 'color5 stripes', 'color4 stripes', 'color3 stripes', 'color2 stripes', 'color1 stripes',
        'color10', 'color9','color8','color7', 'color6','color5','color4','color3', 'color2', 'color1'];
    var color_bank = new Array();

    for(i = 1; i <= total_athletes && i <= 20; i++ ){
        color_bank.push(all_color_bank.pop());
    }
    color_bank.reverse();


    if (Drupal.settings.selected_athlete_id != null &&  Drupal.settings.selected_athlete_id != ''){
        class_name = color_bank.pop();
        $('#my-athlete-list option[value='+ $(this).attr('data-id') +']').attr("selected", "selected");
        $("#athlete-row-" + Drupal.settings.selected_athlete_id).addClass('athlete-selected ' + class_name );
        $("#athlete-row-" + Drupal.settings.selected_athlete_id).attr('data-color', class_name);
    }


    function get_rearranged_color_bank(){
        var new_color_bank = ['color10 stripes', 'color9 stripes', 'color8 stripes', 'color7 stripes',
            'color6 stripes', 'color5 stripes', 'color4 stripes', 'color3 stripes', 'color2 stripes', 'color1 stripes',
            'color10', 'color9','color8','color7', 'color6','color5','color4','color3', 'color2', 'color1'];

        var a_bank = new Array();
        for(i = 1; i <= total_athletes && i <= 20; i++ ){
            a_bank.push(new_color_bank.pop());
        }
        a_bank.reverse();
        return a_bank;
    }

    $('.athlete-row').on('click', function(){

        $('.my-team-block-check-all').attr('checked', false);
        var class_name = '';
        //var color_no = parseInt($("div.athlete-selected").length) + 1;

        if(!$(this).hasClass('athlete-selected')) {
         class_name = color_bank.pop();
         if(parseInt($("div.athlete-selected").length) < 20){
             $('#my-athlete-list option[value='+ $(this).attr('data-id') +']').attr("selected", "selected");
             $(this).addClass('athlete-selected ' + class_name );
             $(this).attr('data-color', class_name);

             // remove all selection of tags
            $("#tags .user-tag-row").each(function(){
                     $(this).removeClass('tag-selected');
             })

             //var selected_tag_div = $("#tags .tag-selected");



         } else {
             $('#myLatestModal').modal({
                 show: 'true'
             });
         }

        }else {
         color_bank.push($(this).attr('data-color'));
         $(this).removeClass($(this).attr('data-color') + ' athlete-selected');
         $('#my-athlete-list option[value='+ $(this).attr('data-id') +']').attr("selected", false);
         $(this).attr('data-color', '');
        }
        team_latest_check_callback();

     })


    $('.my-team-block-check-all').on('click', function(){

        var class_name = "";
        var color_no = 0;

        //console.log( parseInt($("select#my-athlete-list :selected").length));

        // reset all the row first

        $("#my-athlete-list").find("option").attr("selected", false);
        //console.log(parseInt($("select#my-athlete-list :selected").length)); //return;
        $('.athlete-list div').each(function(){
            if ($(this).attr('data-color') != ''){
               color_bank.push($(this).attr('data-color'));
            }
            $(this).removeClass('athlete-selected ' + $(this).attr('data-color'));
            $('#my-athlete-list option[value='+ $(this).attr('data-id') +']').attr("selected", false);
            $(this).attr('data-color', '');

        })
        //color_bank.shift();


        if($(this).is(':checked')) {
            color_bank =[];
            color_bank = get_rearranged_color_bank();
            $('.athlete-list div').each(function(){
                color_no = parseInt($("div.athlete-selected").length) + 1;
                class_name = color_bank.pop();
                if (color_no < 21){
                    $('#my-athlete-list option[value='+ $(this).attr('data-id') +']').attr("selected", "selected");
                    $(this).addClass('athlete-selected ' + class_name);
                    $(this).attr('data-color', class_name);
                }
            })
        }  else {
            $('.athlete-list div').each(function(index){
                //console.log($(this).attr('data-color'));
                if ($(this).attr('data-color') != ''){
                    color_bank.push($(this).attr('data-color'));
                }
                $(this).removeClass('athlete-selected ' + $(this).attr('data-color'));
                $('#my-athlete-list option[value='+ $(this).attr('data-id') +']').attr("selected", false);
                $(this).attr('data-color', '');

            })
            color_bank.reverse();
            //console.log(color_bank);

        }

        team_latest_check_callback();
    });

    $("#tags .user-tag-row").on('click', function(){

        var selected_row = $(this).attr('id');
        $("#tags .user-tag-row").each(function(){
            if(selected_row != $(this).attr('id'))
            $(this).removeClass('tag-selected');
        })
        var tag_selected = false;
        if($(this).hasClass('tag-selected')){
            $(this).removeClass('tag-selected')
        } else {
            $(this).addClass('tag-selected')
            tag_selected = true;

            color_bank =[];
            color_bank = get_rearranged_color_bank();
        }


        $(".athlete-list .athlete-row ").each(function(){
            $(this).removeClass('athlete-selected ' + $(this).attr('data-color'));
            $('#my-athlete-list option').attr("selected", false);
        })


            $.each(jQuery.parseJSON($(this).attr('data-users')), function(i, item) {
                var div = $("#athlete-row-" + item.uid);
                if (tag_selected){
                    class_name = color_bank.pop();
                    $(div).addClass('athlete-selected ' + class_name);
                    $('#my-athlete-list option[value='+ $(div).attr('data-id') +']').attr("selected", "selected");
                    $(div).attr('data-color', class_name);
                } else {

                    /*if ($(div).attr('data-color') != ''){
                        color_bank.push($(div).attr('data-color'));
                    }*/
                    $(div).removeClass('athlete-selected ' + $(div).attr('data-color'));
                    $('#my-athlete-list option[value='+ $(div).attr('data-id') +']').attr("selected", false);
                    $(div).attr('data-color', '');
                }

            })
            //Ajax Callback for Team Readiness Graph & Team's Latest Check
            team_latest_check_callback();

    })

    $('.page-reports #graph-mode .btn-primary input').on('change', function() {
        team_latest_check_callback();
    });


    $('.page-reports #time-frame .btn-primary input').on('change', function() {
        team_latest_check_callback();
    });


    $('.page-check-user-view #edit-profile-main-field-level-of-training-und-0').attr("disabled", 'true');
    $('.page-check-user-view #edit-profile-main-field-level-of-training-und-1').attr("disabled", 'true');
    $('.page-check-user-view #edit-profile-main-field-level-of-training-und-2').attr("disabled", 'true');
    $('.page-check-user-view #edit-profile-main-field-display-results-to-athlete-und-yes').attr("disabled", 'true');
    $('.page-check-user-view #edit-profile-main-field-display-results-to-athlete-und-no').attr("disabled", 'true');

function toPounds(kilograms) {
    return Math.round(kilograms / 0.45359237);
}

function toKilograms(pounds) {
    return Math.round(pounds * 0.45359237);
}

function heightToMetric(us_height) {
    var feet = parseInt(us_height.substr(0, us_height.indexOf("'")), 10);
    var inches = us_height.substr(us_height.indexOf("'") + 1);
    inches = parseInt(inches.substr(0, inches.indexOf("\"")), 10);
    return toCentimeters(feet, inches);
}

function heightToUS(metric_height) {
    var feet = 0;
    var inches = toInches(metric_height);
    while (12 < inches) {
        feet++;
        inches -= 12;
    }
    return feet + "' " + inches + "\"";
}

function toCentimeters(feet, inches) {
    return Math.round(((feet * 12) + inches) * 2,54);
}

function toInches(centimeters) {
    return Math.round(centimeters / 2,54);
}

function setMeasurementStandard(is_metric) {
    var _height = "edit-profile-main-field-height-und-0-value";
    var _width = "edit-profile-main-field-weight-und-0-value";

    if (!is_metric) {
        if ($("#" + _height).val() && $("#" + _height).val().indexOf("'") < 0) {
            $("#" + _height).val(heightToUS($("#" + _height).val()));
            if ($("#" + _width).val()) {
                $("#" + _width).val(toPounds($("#" + _width).val()));
            }
        }
    }
    else {
        if ($("#" + _height).val() && -1 < $("#" + _height).val().indexOf("'")) {
            $("#" + _height).val(heightToMetric($("#" + _height).val()));
            if ($("#" + _width).val()) {
                $("#" + _width).val(toKilograms($("#" + _width).val()));
            }
        }
    }
}


function readURL(input) {

    if($('#edit-picture-upload_preview').length==0) {
        $('#edit-picture-upload').before("<img id='edit-picture-upload_preview' width='210' height='145' style='display: block;'>");
    }

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#edit-picture-upload_preview').attr('src', e.target.result);

            if($('.profile-pic').length != 0) {
               $('.profile-pic img').attr('height', '200');
               $('.profile-pic img').attr('width', '200');
               $('.profile-pic img').attr('src', e.target.result);
            }
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#edit-picture-upload").change(function(){
    readURL(this);
});


    $(document.body).on('click', '#check-add-member-tags-form .group-tag', function(){

        if(!$(this).hasClass('tag-selected')) {

            $('#edit-tags .form-type-checkbox #edit-tags-' + $(this).attr('data-id') + '').attr("checked", "checked");
            $(this).addClass('tag-selected')
        }else {
            $(this).removeClass('tag-selected')
            $('#edit-tags .form-type-checkbox #edit-tags-' + $(this).attr('data-id') + '').attr("checked", "");
        }
    })

    $('.bs-example-modal-md').on('hidden.bs.modal', function (e) {
        $('.bs-example-modal-sm .modal-content').html('');
        $('.bs-example-modal-md .modal-content').html('');
    })
});

function isEmail(value) {
    var validator = /^([a-zA-Z0-9\_\-\.\+]+)@([a-zA-Z0-9\_\-\+\.]+)\.([a-z]{2,6})$/;
    if (validator.test(value)) {
        return true;
    }
    return false;
}

function team_latest_check_callback() {
    var select = new Array();
    //alert($("#my-athlete-list  option:selected").length);
    $("div.athlete-selected").each(function(i){
        select[i]  = {athelete_id: $(this).attr('data-id'), selected_color: $(this).attr('data-color')};
    });

    var start_date = $("#datetimepicker1 input#start-date").val();
    var end_date = $("#datetimepicker2 input#end-date").val();

    var time_frame = $("div#time-frame input:radio[name=time-frame-options]:checked").val();
    var graph_mode = $("div#graph-mode input:radio[name=graph-mode-options]:checked").val();

    drupal_ajax_call({athlets: select, start_date: start_date, end_date: end_date, time_frame: time_frame, graph_mode: graph_mode});

}

var getCSS = function (prop, fromClass) {

    var $inspector = $("<div>").css('display', 'none').addClass(fromClass);
    $("body").append($inspector); // add to DOM, in order to read the CSS property
    try {
        return $inspector.css(prop);
    } finally {
        $inspector.remove(); // and remove from DOM
    }
};

function drupal_ajax_call(params) {

    $.ajax({
        'url': Drupal.settings.baseUrl +"/ajax/reports/load",
        'type': 'POST',
        'dataType': 'json',
        data: params,
        'success': function(data) {

            $("div#graph").html(data.graph_html);
            $("section.table-area table").html(data.latest_checks_html);

        },
        beforeSend: function()
        {
            $(document).ready(function () {
                $('section.table-area table').html("Loading....");

            });
        },
        'error': function(data)
        {
            $(document).ready(function () {
                $('#status:first').html("ERROR OCCURRED!");
            });
        }
    });
}

