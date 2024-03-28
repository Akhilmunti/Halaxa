searchVisible = 0;
transparent = true;

$(document).ready(function () {

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();

    // Code for the Validator
    var $validator = $('.wizard-card form').validate({
        rules: {
            editor2: {
                required: true,
                minlength: 32
            },
            lastname: {
                required: true,
                minlength: 3
            },
            email: {
                required: true
            },
            role: {
                required: true
            }
        },
    });

    // Wizard Initialization
    $('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'savepage': '.btn-save',
        'previousSelector': '.btn-previous',

        onNext: function (tab, navigation, index) {
            var $valid = $('.wizard-card form').valid();
            var roleDescription = CKEDITOR.instances.editor1.getData();
            // if(roleDescription.trim().length==0 || RoleRequisites.trim().length==0 || divUGs.trim().length==0 ||divLocations.trim().length==0){
            if (roleDescription.trim().length == 0) {
                rderror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
                document.getElementById("rd-error").innerHTML = rderror;
            }

            var RoleRequisites = CKEDITOR.instances.editor2.getData();
            if (RoleRequisites.trim().length == 0) {
                rrerror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
                document.getElementById("rr-error").innerHTML = rrerror;
                return false;
            }

            var divUGs = document.getElementById('divUG').innerHTML;
            var divLocations = document.getElementById('divLocation').innerHTML;
            if (divUGs.trim().length == 0 || divLocations.trim().length == 0) {
                if (divUGs.trim().length == 0) {
                    console.log('in if divUGs');
                    ugerror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select UG Cource and Stream and click ADD Button.</b> </div>";
                    document.getElementById("ug-error").innerHTML = ugerror;
                }
                if (divLocations.trim().length == 0) {
                    console.log('in if divLocations');
                    locationerror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select country, State and City and click ADD Button.</b> </div>";
                    document.getElementById("location-error").innerHTML = locationerror;
                }
                return false;
            }
            if (!$valid) {
                $validator.focusInvalid();

                return false;
            }
        },

        onInit: function (tab, navigation, index) {

            //check number of tabs and fill the entire row
            var $total = navigation.find('li').length;
            $width = 100 / $total;

            navigation.find('li').css('width', $width + '%');

        },

        onTabClick: function (tab, navigation, index) {
            var $valid = $('.wizard-card form').valid();
            var roleDescription = CKEDITOR.instances.editor1.getData();
            var RoleRequisites = CKEDITOR.instances.editor2.getData();
            var divUGs = document.getElementById('divUG').innerHTML;
            var divLocations = document.getElementById('divLocation').innerHTML;
            if(roleDescription.trim().length==0 || RoleRequisites.trim().length==0 || divUGs.trim().length==0 ||divLocations.trim().length==0){
            
                if (roleDescription.trim().length == 0) {
                rderror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
                document.getElementById("rd-error").innerHTML = rderror;
                
            }
            else{
                document.getElementById("rd-error").innerHTML = '';
            }
         
            if (RoleRequisites.trim().length == 0) {
                rrerror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>This field is required.</b> </div>";
                document.getElementById("rr-error").innerHTML = rrerror;
                
               
            }
           else {
            document.getElementById("rr-error").innerHTML = '';
           }

                if (divUGs.trim().length == 0) {
                    console.log('in if divUGs');
                    ugerror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select UG Cource and Stream and click ADD Button.</b> </div>";
                    document.getElementById("ug-error").innerHTML = ugerror;
                }
                if (divLocations.trim().length == 0) {
                    console.log('in if divLocations');
                    locationerror = "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' ><b>Please Select country, State and City and click ADD Button.</b> </div>";
                    document.getElementById("location-error").innerHTML = locationerror;
                }
                return false;
            }
            if (!$valid) {
                $validator.focusInvalid();

                return false;
            }
            var $valid = $('.wizard-card form').valid();

            if (!$valid) {
                return false;
            } else {
                return true;
            }

        },

        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;

            var $wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-save').hide();
                $($wizard).find('.btn-reset').hide();
                $($wizard).find('.btn-finish').show();
            } else {
                if ($current == 2) {
                    $($wizard).find('.btn-save').hide();
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-reset').hide();
                    $($wizard).find('.btn-finish').hide();
                } else {
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-save').show();
                    $($wizard).find('.btn-reset').show();
                    $($wizard).find('.btn-finish').hide();
                }
            }

            //update progress
            var move_distance = 100 / $total;
            move_distance = move_distance * (index) + move_distance / 2;

            $wizard.find($('.progress-bar')).css({
                width: move_distance + '%'
            });
            //e.relatedTarget // previous tab

            $wizard.find($('.wizard-card .nav-pills li.active a .icon-circle')).addClass('checked');

        }
    });


    // Prepare the preview for profile picture
    $("#wizard-picture").change(function () {
        readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function () {
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked', 'true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked', 'true');
        }
    });

    //$('.set-full-height').css('height', 'auto');

});



//Function to show image before upload

//     function readURL(input) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();
//             console.log('in read url');
//             reader.onload = function (e) {
//                 console.log('inreadurl');
//                 $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
//             }
//             reader.readAsDataURL(input.files[0]);
//         }
//    }