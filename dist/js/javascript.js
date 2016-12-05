$(".nav a").on("click", function(){
   $(".nav").find(".litur").removeClass("litur");
   $(".nav").find(".abc").removeClass("navbar");
   $(this).parent().addClass("litur");
});

$(function() {
    $("header a[href^='#']").click(function(e) {
        var target = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(target).offset().top - $("header").outerHeight()
        });
        e.preventDefault();
    });
});
$(document).ready(function () {
    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("navbar-collapse in");
        if (_opened === true && !clickover.hasClass("dropdown-toggle")) {
            $("button.dropdown-toggle").click();
        }
    });
});
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


