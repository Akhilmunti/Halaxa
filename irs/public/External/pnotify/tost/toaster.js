 "function"!=typeof Object.create&&(Object.create=function(t){function o(){}return o.prototype=t,new o}),function(t,o){"use strict";var i={_positionClasses:["bottom-left","bottom-right","top-right","top-left","bottom-center","top-center","mid-center"],_defaultIcons:["success","error","info","warning"],init:function(o){this.prepareOptions(o,t.toast.options),this.process()},prepareOptions:function(o,i){var s={};"string"==typeof o||o instanceof Array?s.text=o:s=o,this.options=t.extend({},i,s)},process:function(){this.setup(),this.addToDom(),this.position(),this.bindToast(),this.animate()},setup:function(){var o="";if(this._toastEl=this._toastEl||t("<div></div>",{"class":"jq-toast-single"}),o+='<span class="jq-toast-loader"></span>',this.options.allowToastClose&&(o+='<span class="close-jq-toast-single">&times;</span>'),this.options.text instanceof Array){this.options.heading&&(o+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),o+='<ul class="jq-toast-ul">';for(var i=0;i<this.options.text.length;i++)o+='<li class="jq-toast-li" id="jq-toast-item-'+i+'">'+this.options.text[i]+"</li>";o+="</ul>"}else this.options.heading&&(o+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),o+=this.options.text;this._toastEl.html(o),this.options.bgColor!==!1&&this._toastEl.css("background-color",this.options.bgColor),this.options.textColor!==!1&&this._toastEl.css("color",this.options.textColor),this.options.textAlign&&this._toastEl.css("text-align",this.options.textAlign),this.options.icon!==!1&&(this._toastEl.addClass("jq-has-icon"),-1!==t.inArray(this.options.icon,this._defaultIcons)&&this._toastEl.addClass("jq-icon-"+this.options.icon))},position:function(){"string"==typeof this.options.position&&-1!==t.inArray(this.options.position,this._positionClasses)?"bottom-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,bottom:20}):"top-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,top:20}):"mid-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,top:t(o).outerHeight()/2-this._container.outerHeight()/2}):this._container.addClass(this.options.position):"object"==typeof this.options.position?this._container.css({top:this.options.position.top?this.options.position.top:"auto",bottom:this.options.position.bottom?this.options.position.bottom:"auto",left:this.options.position.left?this.options.position.left:"auto",right:this.options.position.right?this.options.position.right:"auto"}):this._container.addClass("bottom-left")},bindToast:function(){var t=this;this._toastEl.on("afterShown",function(){t.processLoader()}),this._toastEl.find(".close-jq-toast-single").on("click",function(o){o.preventDefault(),"fade"===t.options.showHideTransition?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):"slide"===t.options.showHideTransition?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))}),"function"==typeof this.options.beforeShow&&this._toastEl.on("beforeShow",function(){t.options.beforeShow()}),"function"==typeof this.options.afterShown&&this._toastEl.on("afterShown",function(){t.options.afterShown()}),"function"==typeof this.options.beforeHide&&this._toastEl.on("beforeHide",function(){t.options.beforeHide()}),"function"==typeof this.options.afterHidden&&this._toastEl.on("afterHidden",function(){t.options.afterHidden()})},addToDom:function(){var o=t(".jq-toast-wrap");if(0===o.length?(o=t("<div></div>",{"class":"jq-toast-wrap"}),t("body").append(o)):(!this.options.stack||isNaN(parseInt(this.options.stack,10)))&&o.empty(),o.find(".jq-toast-single:hidden").remove(),o.append(this._toastEl),this.options.stack&&!isNaN(parseInt(this.options.stack),10)){var i=o.find(".jq-toast-single").length,s=i-this.options.stack;s>0&&t(".jq-toast-wrap").find(".jq-toast-single").slice(0,s).remove()}this._container=o},canAutoHide:function(){return this.options.hideAfter!==!1&&!isNaN(parseInt(this.options.hideAfter,10))},processLoader:function(){if(!this.canAutoHide()||this.options.loader===!1)return!1;var t=this._toastEl.find(".jq-toast-loader"),o=(this.options.hideAfter-400)/1e3+"s",i=this.options.loaderBg,s=t.attr("style")||"";s=s.substring(0,s.indexOf("-webkit-transition")),s+="-webkit-transition: width "+o+" ease-in;                       -o-transition: width "+o+" ease-in;                       transition: width "+o+" ease-in;                       background-color: "+i+";",t.attr("style",s).addClass("")},animate:function(){var t=this;if(this._toastEl.hide(),this._toastEl.trigger("beforeShow"),"fade"===this.options.showHideTransition.toLowerCase()?this._toastEl.fadeIn(function(){t._toastEl.trigger("afterShown")}):"slide"===this.options.showHideTransition.toLowerCase()?this._toastEl.slideDown(function(){t._toastEl.trigger("afterShown")}):this._toastEl.show(function(){t._toastEl.trigger("afterShown")}),this.canAutoHide()){var t=this;o.setTimeout(function(){"fade"===t.options.showHideTransition.toLowerCase()?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):"slide"===t.options.showHideTransition.toLowerCase()?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))},this.options.hideAfter)}},reset:function(o){"all"===o?t(".jq-toast-wrap").remove():this._toastEl.remove()},update:function(t){this.prepareOptions(t,this.options),this.setup(),this.bindToast()}};t.toast=function(t){var o=Object.create(i);return o.init(t,this),{reset:function(t){o.reset(t)},update:function(t){o.update(t)}}},t.toast.options={text:"",heading:"",showHideTransition:"fade",allowToastClose:!0,hideAfter:3e3,loader:!0,loaderBg:"#9EC600",stack:5,position:"bottom-left",bgColor:!1,textColor:!1,textAlign:"left",icon:!1,beforeShow:function(){},afterShown:function(){},beforeHide:function(){},afterHidden:function(){}}}(jQuery,window,document);
  

   
        $(document).ready(function() {
            
            $('.eval-js').on('click', function ( e ) {
                e.preventDefault();

                if ( !$(this).hasClass('generate-toast') ) {
                    var code = $(this).siblings('pre').find('code').text();
                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval( code );
                };
            });

            $('#icon-type').on('change', function () {
                if ( !$(this).val() ) {
                    $('.custom-color-info').show();
                    $('.toast-icon-line').hide();
                    $('.toast-bgColor-line').show();
                    $('.toast-textColor-line').show();
                } else {
                    $('.toast-icon-line').show();
                    $('.custom-color-info').hide();
                    $('.toast-bgColor-line').hide();
                    $('.toast-textColor-line').hide();
                    $('.toast-icon-line span.toast-icon').text( $(this).val() );
                }
            });

            // You are about to see some extremely horrible code that can be MUCH MUCH improved,
            // I've knowlingly done it that way, please don't judge me based upon this ;)
            $(document).ready(function () {
                
                function generateCode () {
                    var text = $('.plugin-options #toast-text').val(); 
                    var heading = $('.plugin-options #toast-heading').val(); 
                    var transition = $('.toast-transition').val(); 
                    var allowToastClose = $('#allow-toast-close').val(); 
                    var autoHide = $('#auto-hide-toast').val(); 
                    var stackToasts = $('#stack-toasts').val(); 
                    var toastPosition = $('#toast-position').val() 
                    var toastBg = $('#toast-bg').val(); 
                    var toastTextColor = $('#toast-text-color').val();
                    var toastIcon = $('#icon-type').val();
                    var textAlign = $('#text-align').val() 
                    var toastEvents = $('#add-toast-events').val() 

                    if ( text ) {
                        $('.toast-text-line').show(); 
                        $('.toast-text-line .toast-text').text( text ); 
                    } else {
                        $('.toast-text-line').hide() 
                        $('.toast-text-line .toast-text').text(''); 
                    };

                    if ( heading ) {
                        $('.toast-heading-line').show(); 
                        $('.toast-heading-line .toast-heading').text( heading ); 
                    } else {
                        $('.toast-heading-line').hide() 
                        $('.toast-heading-line .toast-heading').text(''); 
                    }; 

                    if ( transition ) {
                        $('.toast-transition-line').show() 
                        $('.toast-transition-line .toast-transition').text( transition ); 
                    } else {
                        $('.toast-transition-line').hide(); 
                        $('.toast-transition-line .toast-transition').text('fade'); 
                    } 

                    if ( allowToastClose ) {
                        $('.toast-allowToastClose-line').show(); 
                        $('.toast-allowToastClose-line .toast-allowToastClose').text( allowToastClose ); 
                    } else {
                        $('.toast-allowToastClose-line').hide(); 
                        $('.toast-allowToastClose-line .toast-allowToastClose').text( false ); 
                    } 

                    if ( autoHide && ( autoHide == 'false' ) ) {
                        $('.toast-hideAfter-line').show(); 
                        $('.toast-hideAfter-line .toast-hideAfter').text('false'); 
                        $('.autohide-after').hide(); 
                    } else {
                        $('.toast-hideAfter-line').show(); 
                        $('.toast-hideAfter-line .toast-hideAfter').text( $('#autohide-after').val() ? $('#autohide-after').val() : 3000 ); 
                        $('.autohide-after').show(); 
                    } 

                    if ( stackToasts && stackToasts != 'true') {
                        $('.toast-stackLength-line').show(); 
                        $('.toast-stackLength-line .toast-stackLength').text( stackToasts ); 
                        $('.stack-length').hide(); 
                    } else {
                        $('.stack-length').show(); 
                        $('.toast-stackLength-line').show(); 
                        $('.toast-stackLength-line .toast-stackLength').text( $('#stack-length').val() ? $('#stack-length').val() : 5 ); 
                    } 

                    if ( toastPosition && ( toastPosition !== 'custom-position' ) ) {
                        $('.toast-position-string-line').show(); 
                        $('.custom-toast-position').hide(); 
                        $('.toast-position-string-line .toast-position').text( toastPosition ); 
                    } else {
                        $('.toast-position-string-line').hide(); 
                        $('.toast-position-string-line .toast-position').text(''); 
                    } 

                    if ( toastPosition && ( toastPosition === 'custom-position' ) ) {
                        $('.custom-toast-position').show(); 
                        $('.toast-position-string-obj').show(); 
                        var left = $('#left-position').val() ? $('#left-position').val() : 'auto'; 
                        var right = $('#right-position').val() ? $('#right-position').val() : 'auto'; 
                        var top = $('#top-position').val() ? $('#top-position').val() : 'auto'; 
                        var bottom = $('#bottom-position').val() ? $('#bottom-position').val() : 'auto'; 
                        $('.toast-position-string-obj .toast-position-left').text( ( left !== 'auto' ) ? left : "'" + left + "'" ); 
                        $('.toast-position-string-obj .toast-position-right').text( ( right !== 'auto' ) ? right : "'" + right + "'" ); 
                        $('.toast-position-string-obj .toast-position-top').text( ( top !== 'auto' ) ? top : "'" + top + "'" ); 
                        $('.toast-position-string-obj .toast-position-bottom').text(  ( bottom !== 'auto' ) ? bottom : "'" + bottom + "'"  ); 
                    } else {
                        $('.toast-position-string-obj').hide(); 
                        // $('.toast-position-string-obj toast-position').text('');
                    } 

                    if ( !toastIcon ) {
                        if ( toastBg ) {
                            $('.toast-bgColor-line').show(); 
                            $('.toast-bgColor-line .toast-bgColor').text( toastBg ); 
                        } else {
                            $('.toast-bgColor-line').hide(); 
                            $('.toast-bgColor-line .toast-bgColor').text(''); 
                        } 

                        if ( toastTextColor ) {
                            $('.toast-textColor-line').show(); 
                            $('.toast-textColor-line .toast-textColor').text( toastTextColor ); 
                        } else {
                            $('.toast-textColor-line').hide(); 
                            $('.toast-textColor-line .toast-textColor').text(''); 
                        } 
                    }

                    if ( textAlign ) {
                        $('.toast-textAlign-line').show(); 
                        $('.toast-textAlign-line .toast-textAlign').text( textAlign ); 
                    } else {
                        $('.toast-textAlign-line').hide(); 
                        $('.toast-textAlign-line .toast-textAlign').text( ''); 
                    } 

                    if ( toastEvents == 'false' ) {
                        $('.toast-beforeShow-line').hide(); 
                        $('.toast-afterShown-line').hide(); 
                        $('.toast-beforeHide-line').hide(); 
                        $('.toast-afterHidden-line').hide(); 
                    } else {
                        $('.toast-beforeShow-line').show(); 
                        $('.toast-afterShown-line').show(); 
                        $('.toast-beforeHide-line').show(); 
                        $('.toast-afterHidden-line').show(); 
                    } 
                }

                $('#top-position').on('change', function () { $('#bottom-position').val('auto'); });
                $('#bottom-position').on('change', function () { $('#top-position').val('auto'); });
                $('#left-position').on('change', function () { $('#right-position').val('auto'); });
                $('#right-position').on('change', function () {$('#left-position').val('auto'); });
                $('.plugin-options :input').on('change', function () {
                  $.toast().reset('all');
                  generateCode();
                });

                $('.generate-toast').on('click', function( e ) {
                  e.preventDefault();
                  generateToast();
                });

                function generateToast () {
                    alert("rohut");
                    var options = {};

                    if ( $('.toast-text-line').is(':visible') ) {
                        options.text = $('.toast-text-line .toast-text').text();
                    } 

                    if ( $('.toast-heading-line').is(':visible') ) {
                        options.heading = $('.toast-heading').text(); 
                    }; 

                    if ( $('.toast-transition-line').is(':visible') ) {
                        options.showHideTransition = $('.toast-transition-line .toast-transition').text(); 
                    }; 

                    if ( $('.toast-allowToastClose-line').is(':visible') ) {
                        options.allowToastClose = ( $('.toast-allowToastClose-line .toast-allowToastClose').text() === 'true' ) ? true : false; 
                    }; 

                    if ( $('.toast-hideAfter-line').is(':visible') ) {
                        options.hideAfter = parseInt($('.toast-hideAfter-line .toast-hideAfter').text(), 10) || false; 
                    }; 

                    if ( $('.toast-stackLength-line').is(':visible') ) {
                        options.stack = parseInt($('.toast-stackLength-line .toast-stackLength').text(), 10) || false; 
                    }; 

                    if ( $('.toast-position-string-line').is(':visible') ) {
                        options.position = $('.toast-position-string-line .toast-position').text(); 
                    }; 

                    if ( $('.toast-position-string-obj').is(':visible') ) {
                        options.position = {}; 
                        options.position.left =  parseFloat( $('.toast-position .toast-position-left').text() ) || 'auto'; 
                        options.position.right =  parseFloat( $('.toast-position .toast-position-right').text() ) || 'auto'; 
                        options.position.top =  parseFloat( $('.toast-position .toast-position-top').text() ) || 'auto'; 
                        options.position.bottom =  parseFloat( $('.toast-position .toast-position-bottom').text() ) || 'auto'; 
                    }; 

                    if ( $('.toast-icon-line').is(':visible') ) {
                        options.icon = $('.toast-icon-line .toast-icon').text();
                    };

                    if ( $('.toast-bgColor-line').is(':visible') ) {
                        options.bgColor = $('#toast-bg').val(); 
                    }; 

                    if ( $('.toast-text-color').is(':visible') ) {
                        options.textColor = $('#toast-text-color').val(); 
                    }; 

                    if ( $("#text-align").is(':visible') ) {
                        options.textAlign = $('#text-align').val(); 
                    };

                    $.toast( options ); 
                }

                generateCode(); 
            });
        });
  



  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-58155965-1', 'auto');
  ga('send', 'pageview');

