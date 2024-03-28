/*!

 =========================================================
 * Bootstrap Wizard - v1.1.1
 =========================================================
 
 * Product Page: https://www.creative-tim.com/product/bootstrap-wizard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/bootstrap-wizard/blob/master/LICENSE.md)
 
 =========================================================
 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */

// Get Shit Done Kit Bootstrap Wizard Functions

searchVisible = 0;
transparent = true;

$(document).ready(function(){

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();

    // Code for the Validator
    var $validator = $('.wizard-card form').validate({
		  rules: {
		    firstname: {
		      required: true,
		      minlength: 3
		    },
		    lastname: {
		      required: true,
		      minlength: 3
		    },
		    email: {
		      required: true,
		      minlength: 3,
		    }
        }
	});

    // Wizard Initialization
  	$('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function(tab, navigation, index) {
        	var $valid = $('.wizard-card form').valid();
        	if(!$valid) {
        		$validator.focusInvalid();
        		return false;
        	}
        },

        onInit : function(tab, navigation, index){

          //check number of tabs and fill the entire row
          var $total = navigation.find('li').length;
          $width = 100/$total;
          var $wizard = navigation.closest('.wizard-card');

          $display_width = $(document).width();

          if($display_width < 600 && $total > 3){
              $width = 50;
          }

           navigation.find('li').css('width',$width + '%');
           $first_li = navigation.find('li:first-child a').html();
           $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
           $('.wizard-card .wizard-navigation').append($moving_div);
           refreshAnimation($wizard, index);
           $('.moving-tab').css('transition','transform 0s');
       },

        onTabClick : function(tab, navigation, index){

            var $valid = $('.wizard-card form').valid();

            if(!$valid){
                return false;
            } else {
                return true;
            }
        },

        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;

            var $wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-finish').show();
            } else {
                $($wizard).find('.btn-next').show();
                $($wizard).find('.btn-finish').hide();
            }

            button_text = navigation.find('li:nth-child(' + $current + ') a').html();

            setTimeout(function(){
                $('.moving-tab').text(button_text);
            }, 150);

            var checkbox = $('.footer-checkbox');

            if( !index == 0 ){
                $(checkbox).css({
                    'opacity':'0',
                    'visibility':'hidden',
                    'position':'absolute'
                });
            } else {
                $(checkbox).css({
                    'opacity':'1',
                    'visibility':'visible'
                });
            }

            refreshAnimation($wizard, index);
        }
  	});


    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function(){
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked','true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function(){
        if( $(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked','true');
        }
    });

    $('.set-full-height').css('height', 'auto');

});



 //Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log('in dist gsdk readurl');
        reader.onload = function (e) {

             console.log('in logo validation!');
                var employer_logo = document.getElementById("wizard-picture");
             //([a-zA-Z0-9\s_\\(\\)\\.\-:])+(.jpg|.png|.jpeg|.JPG|.PNG|.JPEG)$
             //^(([a-zA-Z]:)|(\\{2}\w+)\$?)(\\(\w[\w].*))+(.jpg|.JPG|.jpeg|.JPEG|.bmp|.BMP|.gif|.GIF|.psd|.PSD)$
                //Check whether the file is valid Image.([^\\s]+(\\.(?i)(jpg|png|gif|bmp))$)
                var regex = new RegExp("([a-zA-Z0-9\s_\\(\\)\\.\-:])+(.jpg|.png|.jpeg|.JPG|.PNG|.JPEG)$");
                if (regex.test(employer_logo.value.toLowerCase())) {
             
                    //Check whether HTML5 is supported.
                    if (typeof (employer_logo.files) != "undefined") {
                        //Initiate the FileReader object.
                        var reader = new FileReader();
                        //Read the contents of Image File.
                        reader.readAsDataURL(employer_logo.files[0]);
                        reader.onload = function (e) {
                            //Initiate the JavaScript Image object.
                            var image = new Image();
             
                            //Set the Base64 string return from FileReader as source.
                            image.src = e.target.result;
                                   
                            //Validate the File Height and Width.
                            image.onload = function () {
                                var height = this.height;
                                var width = this.width;
                                if (height > 72 || width > 72) {
                                  document.getElementById("wizard-picture").value='';
                                  $('#wizardPicturePreview').attr('src', '');
                                  imglogo= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>Please Select Image Of 72X72.</b> </div>";
                                  document.getElementById("divimglogo").innerHTML = imglogo;
                                  document.getElementById('divimglogo').focus();
                                  
                                    return false;
                                }
                                document.getElementById("divimglogo").innerHTML = '';
                                 $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                                return true;
                            };
             
                        }
                    } else {
                        document.getElementById("wizard-picture").value='';
                        $('#wizardPicturePreview').attr('src', '');
                      imglogo= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>This browser does not support HTML5.</b> </div>";
                      document.getElementById("divimglogo").innerHTML = imglogo;
                      document.getElementById('wizard-picture').focus();
                      
                        return false;
                    }
                } else {
                    document.getElementById("wizard-picture").value='';
                        $('#wizardPicturePreview').attr('src', '');
                    imglogo= "<div style='color:#EB5E28; font-size: 0.8em;' data-toggle='tooltip' id = 'maxpkgdiv'><b>Please select a valid Image file.</b> </div>";
                      document.getElementById("divimglogo").innerHTML = imglogo;
                      document.getElementById('wizard-picture').focus();
                    return false;
                }



            
           
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(window).resize(function(){
    $('.wizard-card').each(function(){
        $wizard = $(this);
        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
            'transition': 'transform 0s'
        });
    });
});

function refreshAnimation($wizard, index){
    total_steps = $wizard.find('li').length;
    move_distance = $wizard.width() / total_steps;
    step_width = move_distance;
    move_distance *= index;

    $wizard.find('.moving-tab').css('width', step_width);
    $('.moving-tab').css({
        'transform':'translate3d(' + move_distance + 'px, 0, 0)',
        'transition': 'all 0.3s ease-out'

    });
}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};
