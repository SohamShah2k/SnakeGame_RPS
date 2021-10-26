$(document).ready(function() {
    resize_to_fit();
  });
  
  function resize_to_fit() {
    var fontsize = $('.dropbtn').css('font-size');
    $('.dropbtn').css('fontSize', parseFloat(fontsize) - 1);
    var x = parseFloat($('#profile').width()) - 70;
    var y = parseFloat($('.dropbtn').width())
    console.log(y)
    console.log(x);
    if (y >= x) {
      resize_to_fit();
    }
    var x = parseFloat($('#profile').height());
    var y = parseFloat($('.dropbtn').height());
    console.log(x);
    console.log(y);
    if (y >= x) {
        resize_to_fit();
      }
  }