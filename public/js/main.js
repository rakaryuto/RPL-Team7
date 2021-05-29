window.addEventListener('scroll', function(){
  var scroll = this.scrollY;
  if(scroll > 390 && scroll < 945)
  {
    document.getElementsByClassName('twitter-img').style.color = "#F1EEE9";
  }
});