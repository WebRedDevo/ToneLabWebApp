function sliderTouch(){
    const container = document.getElementsByClassName('header--main__calendar')[0];

    let firstTouch;
    let left ;

    container.addEventListener('touchstart', function(e){

      firstTouch = e.changedTouches[0].pageX;
      left = Math.abs(container.getBoundingClientRect().x);

      container.addEventListener('touchmove', function(e){

        let dif = e.changedTouches[0].pageX - firstTouch;



        if(dif > 0 && dif > 50){
            container.style.transform = `translateX(${left + 308 - 28}px)`
            console.log('вправо:' + left)
            console.log(getComputedStyle(container).transform)
        }else if(dif < 0 && dif < -50) {

            container.style.transform = `translateX(${left - 308 - 28}px)`
            console.log('влево:' + left)
            console.log(getComputedStyle(container).transform)
        }

      })
    })

}



export default sliderTouch
