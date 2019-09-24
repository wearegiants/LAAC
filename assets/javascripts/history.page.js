$( document ).ready(function() {

  var ww = $(window).width();
  var wh = $(window).height();
  var hn = $('#history-nav').height();

$('#history_slider').royalSlider({
    arrowsNav: false,
    arrowsNavAutoHide: false,
    fadeinLoadedSlide: true,
    controlNavigation: 'none',
    imageScaleMode: 'fill',
    imageAlignCenter: true,
    loop: false,
    loopRewind: false,
    numImagesToPreload: 200,
    //slidesOrientation: 'vertical',
    keyboardNavEnabled: true,
    slidesSpacing: 0,
    autoScaleSlider: true, 
    autoScaleSliderWidth: ww,     
    autoScaleSliderHeight: wh,
    addActiveClass: true,

    deeplinking: {
      enabled: true,
      change: false,
      prefix: 'panel-'
    },
  });

if( $('#history_slider').length ){    

var slider = $('#history_slider').data('royalSlider'),
      oldClass = 'empty';
      
  slider.ev.on('rsBeforeMove', function() {
    $('body').removeClass(oldClass).addClass('rslide-'+slider.currSlideId);
    oldClass = 'rslide-'+slider.currSlideId;
  });

  var $pages = $('.bullet');
  
  $pages.eq(0).addClass('active');
 
  // $pages.on('click', function() {
  //   var targetIndex = $(this).data('rscount');
  //   slider.goTo(targetSlide);
  // });

  // $pages.on('click', function() {
  //   var targetIndex = $(this).data('rscount');
  //   slider.goTo(targetSlide);
  // });

  slider.ev.on('rsAfterSlideChange', function() {
    var activeIndex = $('.rsActiveSlide .panel').data('rscount');
    $pages.removeClass('active');
    $pages.eq(activeIndex-1).addClass('active');
  });


  slider.ev.on('rsBeforeAnimStart', slideHeaderSync);

  function slideHeaderSync() {
    var currentSlide = slider.currSlide.holder.find('.panel');
    if(currentSlide.hasClass('light')) {
      $('body').addClass('darkish');
    } else {
      $('body').removeClass('darkish');
    }
  }

  }

 }); 



$(window).resize(function() {

  var ww = $(window).width();
  var wh = $(window).height();
  var hn = $('#history-nav').height();

  $('#history_slider, #history_slider .panel').css({
    height: wh,
    width : ww
  });

  // $('#history-nav').css({
  //   top: '50%',
  //   marginTop: -(hn/2),
  // });
  

}).resize();



// $( window ).resize(function() {
//   var slider = $('#history_slider').data('royalSlider');
//   slider.updateSliderSize(true);
// });

$(function(){

  $('#history-nav a').click(function(){
    $(this).parent().parent().find('a').removeClass('active');
    $(this).addClass('active');
  });

});

