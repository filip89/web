var size, lastSize, newSize;

$(document).ready(function() {
    getWSize();
});

function getWSize() {
    size = window.innerWidth;
    if (size > 767) {
        lastSize = "big";
    }
    else {
        lastSize = "sm";
    }
}

$(window).resize(function () {
    size = window.innerWidth;
    if (size > 767) {
        newSize = "big";
    }
    else {
        newSize = "sm";
    }
    if (newSize != lastSize) {
        $('body').hide().fadeIn("slow");
    }
    getWSize();
});
// onstart
$(document).ready(function(){
	 $(".hid").each(function(){
      var link = $(this).offset().top;
      var scroll = $(window).scrollTop();
        if (link < scroll + 700) {
          $(this).addClass("fadeIn");
        }
    });
});

//tada effect
$(window).scroll(function() {
    $(".hid").each(function(){
      var link = $(this).offset().top;
      var scroll = $(window).scrollTop();
        if (link < scroll + 700) {
          $(this).addClass("fadeIn");
        }
    });
});
