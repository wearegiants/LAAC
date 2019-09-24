// @codekit-prepend "../bower_components/royalslider/jquery.royalslider.min.js"; 
// @codekit-prepend "../bower_components/flexslider/jquery.flexslider.js"; 
// @codekit-prepend "../bower_components/scroll-up-bar-master/dist/scroll-up-bar.min.js";
// @codekit-prepend "../bower_components/skrollr-master/dist/skrollr.min.js";
// @codekit-prepend "../bower_components/FitVids.js-master/jquery.fitvids.js";
// @codekit-prepend "../bower_components/superfish/dist/js/superfish.js";
// @codekit-prepend "../bower_components/pickadate/lib/picker.js";
// @codekit-prepend "../bower_components/pickadate/lib/picker.date.js";
// @codekit-prepend "../bower_components/Sizer/jquery.fs.sizer.min.js";
// @codekit-prepend "../bower_components/magnific-popup/dist/jquery.magnific-popup.js";
// @codekit-prepend "../bower_components/Naver/jquery.fs.naver.js";
// @codekit-prepend "../bower_components/Shifter/jquery.fs.shifter.min.js";

// @codekit-prepend "../bower_components/social-fonts/ss-glyphish-outlined.js";
// @codekit-prepend "../bower_components/social-fonts/ss-gizmo.js";
// @codekit-prepend "../bower_components/social-fonts/ss-social.js";
// @codekit-prepend "pickerstuff.js";



$(function(){

  // Scrollr

  // var s = skrollr.init({
  //   forceHeight: false
  // });

  $('.current-menu-item').parent().parent().addClass('current-menu-item');

  var wh = $(window).height();
  var ww = $(window).width();

  $('.flexslider').flexslider({
    animationSpeed: 1500
  });

  // $("#main-nav").naver();

  // Footer Sizing
  $("#middle-footer").sizer();

  // Date Picker
  $('.datepicker .picker-btn').pickadate();

  $(".royalslider").royalSlider({
    keyboardNavEnabled: true,
    autoScaleSlider : true,
    autoScaleSliderWidth: 1200,
    autoScaleSliderHeight: 450,
    imageScaleMode: 'fill',
    slidesSpacing: 0,
    loop: true,
    transitionType: 'fade'
  }); 

  $(".wide .royalslider").royalSlider({
    keyboardNavEnabled: true,
    autoScaleSlider : true,
    autoScaleSliderWidth: 1200,
    autoScaleSliderHeight: 600,
    imageScaleMode: 'fill',
    slidesSpacing: 0,
    loop: true,
    transitionType: 'fade'
  }); 

  $(".royalsliderArticle").royalSlider({
    keyboardNavEnabled: true,
    autoScaleSlider : true,
    autoScaleSliderWidth: 1200,
    autoScaleSliderHeight: 700,
    imageScaleMode: 'fill',
    slidesSpacing: 0,
    loop: true,
    transitionType: 'fade'
  }); 

  

  //var slider = $('#history_slider').data('royalSlider');

  

  // ScrollUpBar

  // $('#header2').scrollupbar();
  // $('#header').scrollupbar();


  $('ul.menu-athletics').superfish({
    pathClass:  'current',
    delay:       1000,                            // one second delay on mouseout
    animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
    speed:       'fast',                          // faster animation speed
    autoArrows:  true                            // disable generation of arrow mark-up
  });

  // Target your .container, .wrapper, .post, etc.
  $("#player").fitVids();
  $(".video").fitVids();
  $("#footer-upper, #events").sizer({
    minWidth: 768
  });
  $('#grid').sizer();
  $('#press-links').sizer();

  // Home Sizing
  
  $(window).resize(function() {

    var wh = $(window).height();
    var hh = $('.main-header').height();

    // $("#wrapper").css({
    //   paddintTop: hh,
    // });

    $('#section_home .item').css({
      height: wh*.8,
      minHeight: 500,
    });

    $('.featured-image, #picker-wrapper').css({
      height: wh*.6,
      minHeight: 550,
    });

  }).resize();

  $( window ).load(function() {
    $('#loading').fadeOut();
  });

  $('.popup-with-form').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#input_1_1',
    closeBtnInside:true,

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      beforeOpen: function() {
        if($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#input_1_1';
        }
      }
    }
  });

  $('.ext-login').magnificPopup({
    type: 'ajax',
    callbacks : {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('#wrapLogin374610');
      },
    },
    //alignTop: center,
    overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
  });

  $('.lightbox').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
  });


});

// @codekit-append "history.page.js";