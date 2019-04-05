function sliderTouch(){
    const container = document.getElementsByClassName('header--main__calendar')[0];

    let firstTouch;
    let left;
    container.addEventListener('touchstart', function(e){

      firstTouch = e.changedTouches[0].pageX;
      left = container.getBoundingClientRect().x;

      container.addEventListener('touchmove', function(e){

        let dif = e.changedTouches[0].pageX - firstTouch;


        if(dif > 0){

          if(dif > 100 && left <= -272) {
            container.style.transform = `translateX(${left + 300 - 28 }px)`
          }

        }else if(dif < 0 && left >= -2800){
          console.log(container.getBoundingClientRect())
          if(dif < -100)  container.style.transform = `translateX(${left - (300 + 28)}px)`
        }

      })
    })

}



export default sliderTouch
