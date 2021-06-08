window.addEventListener('scroll', function(){
  var scroll = this.scrollY;
  if(scroll > 390 && scroll < 945)
  {
    document.getElementsByClassName('twitter-img').style.color = "#F1EEE9";
  }
});


$(document).ready(function(){
  $('.amount').prop('disabled', true);
   $(document).on('click','.plus',function(){
  $('.amount').val(parseInt($('.amount').val()) + 1 );
  });
    $(document).on('click','.minus',function(){
    $('.amount').val(parseInt($('.amount').val()) - 1 );
      if ($('.amount').val() == 0) {
      $('.amount').val(0);
    }
      });
});