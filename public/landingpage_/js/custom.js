// Anim Star
$(window).scroll(function(){
    if($(window).scrollTop() > 100){
      $("#stars").css("animation", "animStardown 50s linear infinite")
      $("#stars2").css("animation", "animStardown 100s linear infinite")
      $("#stars3").css("animation", "animStardown 150s linear infinite")
    }else{
      $("#stars").css("animation", "animStar 50s linear infinite")
      $("#stars2").css("animation", "animStar 100s linear infinite")
      $("#stars3").css("animation", "animStar 150s linear infinite")
    }
});