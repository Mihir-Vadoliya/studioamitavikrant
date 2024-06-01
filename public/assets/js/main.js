// dynamically add current menu class to menu
function dynamicCurrentMenuClass(selector) {
  let FileName = window.location.href.split("/").reverse()[0];

  selector.find("li").each(function () {
    let anchor = $(this).find("a");
    if ($(anchor).attr("href") == FileName) {
      $(this).addClass("current");
    }
  });
  // if any li has .current elmnt add class
  selector.children("li").each(function () {
    if ($(this).find(".current").length) {
      $(this).addClass("current");
    }
  });
  // if no file name return
  if ("" == FileName) {
    selector.find("li").eq(0).addClass("current");
  }
}

if ($("header .desktopMenu").length) {
  // dynamic current class
  let mainNavUL = $("header .desktopMenu");
  dynamicCurrentMenuClass(mainNavUL);
}

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('#topHead').addClass('background');
    } else {
        $('#topHead').removeClass('background');
    }
});

//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}