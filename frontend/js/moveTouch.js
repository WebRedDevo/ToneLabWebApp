function moveTouch(){
  const calandar = document.getElementsByClassName('section--planned__wrap')[0];

  let firstTouch;
  let left;

  calandar.addEventListener('touchstart', function(e){

    firstTouch = e.changedTouches[0].pageX;
    left = calandar.getBoundingClientRect().x;
    calandar.addEventListener('touchmove', function(e){

      let dif = e.changedTouches[0].pageX - firstTouch;

      let saveLeft = left + dif;
      
      if(saveLeft > 28) saveLeft = 28

      if(saveLeft < -866) saveLeft = -866

      calandar.style.transform = `translateX(${saveLeft}px)`

    })
  })

}

export default moveTouch
