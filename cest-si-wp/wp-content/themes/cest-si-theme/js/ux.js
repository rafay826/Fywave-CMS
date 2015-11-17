var $ = jQuery;

$(document).ready(function(){
    //Google Fonts
var $ = jQuery;
  WebFontConfig = {
    google: { families: [ 'Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic:latin', 'Pacifico::latin', 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
    
//HOME SLIDESHOW

$('#scene-1').on('hover', function () {
    $('.headerImg').slideShow({
        timeOut: 2000,
        showNavigation: true,
        pauseOnHover: true,
        swipeNavigation: true
    })} );
   
//NAV
//$(".nav").hide();
    
    $(".nav-bttn").click(
            function(){
        //    $(".nav").slideToggle("slow");
                        $(".nav").animate({
                            "left": "38%",
                        }, 700, "easeOutQuad"),
                        $(".nav-bttn").hide();
//                        $("body").animate({
//                        "left": "38%",
//                        }, 1000, "easeOutQuad")
                    }
                    );
    $(".nav-bttn-open").click(
        function(){
                        $(".nav").animate({
                            "left": "0%",
                        }, 700, "easeOutQuad"),
                        $(".nav-bttn").show();
//                        $("body").animate({
//                        "left": "0%",
//                        }, 1000, "easeOutQuad")
                    }
    );
    
});