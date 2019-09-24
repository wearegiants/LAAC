$(document).ready(function(){

  $(".wallpaper").background();
  $(".carousel").carousel();
  $(".zoom").lightbox();
   //searchClick();
  $('.tweet').twittie({
      dateFormat: '%b. %d, %Y',
      username: 'laac',
      template: '{{tweet}} <div class="tweet-meta"><div class="date">{{date}}</div> <a class="link" href="{{url}}" target="_blank">Details</a></div>',
      count: 1,
      hideReplies: true,
      apiPath: '/wp-content/themes/laac_/lib/api/tweet.php',
      //apiPath: '/nfs/c11/h07/mnt/203672/domains/laac.com/html/wp-content/themes/laac_/lib/api/tweet.php'
  }, function(){
    $("#footer-upper").sizer({
      minWidth: 768
    });
  });
});