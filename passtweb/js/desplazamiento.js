$(document).ready(function() {
    $('.start').on('click', function(){
      $(".box").velocity({
        left: "10px",
      }, {
        duration: 1000,
        easing: "linear"
      });
    });
    $('.reset').on('click', function(){
      $(".box").velocity({
        left: "10px",
      }, {
        duration: 1000,
        easing: "linear"
      });
    })
  });


  var animateProgress = anime({
    targets: 'progress',
    value: 100,
    easing: 'linear',
    autoplay: false
  });
  
  
  document.querySelector('.play-progress').onclick = animateProgress.restart;