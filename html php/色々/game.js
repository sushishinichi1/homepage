var bar =new ProgressBar.Line(splash_text,{
  easing:'easeInOut',
  duration:1000,
  strokewidth:0.2,
  color:'#555',
  trailwidth:0.2,
  trailwidth:'#bbb',
  text:{
    style:{
      position:'absolute',
      left:'50%',
      top:'50%',
      margin:  '-30px 0 0 0',
      transform:'translate(-50%,-50%)',
      'font-size':'1rem',
      color:'#fff',
    },
    autostylecontainer:false
  },
  step:function(state,bar){
    bar.setText(Math.round(bar.value()*100)+'%');
  }
});

bar.animate(1.0,function(){
  $("#splash").delay(500).fadeOut(800);
})
