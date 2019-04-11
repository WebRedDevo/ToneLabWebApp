function moveTouch(container){
  if(container){

    const current = container.getElementsByClassName('current')[0];

    let firstTouch;
    let left;
    let saveLeft;
    let dif
    const minLeft = 28;
    const maxLeft = 375 - container.offsetWidth - minLeft;

    if(current){
        container.style.transform = `translateX(-${current.offsetLeft - 28}px)`
    }

    container.ondragstart = function() {
      return false;
    };

    container.addEventListener('touchstart', function(e){

      container.style.transition = ''

      firstTouch = e.changedTouches[0].pageX;
      left = container.getBoundingClientRect().x;

      container.addEventListener('touchmove', function(e){

        dif = e.changedTouches[0].pageX - firstTouch;
        saveLeft = left + dif;

        if(saveLeft > minLeft) saveLeft = minLeft
        if(saveLeft < maxLeft) saveLeft = maxLeft

        container.style.transform = `translateX(${saveLeft}px)`
      })
    })


    container.addEventListener('touchend', function(){

      for(let i = 0, max = container.children.length; i < max; i++){

        let deltaLeft = dif < 0 ? 6 : 2;

        if( Math.abs(container.getBoundingClientRect().x) > container.children[i].offsetLeft + container.children[i].offsetWidth / deltaLeft){

            saveLeft = -container.children[i+1].offsetLeft + 28;

            for(let i = 0, max = container.children.length; i < max; i++){
              container.children[i].classList.remove('active')
            }

            container.children[i+1].classList.add('active')
            container.style.transition = '0.33s'

        }else if(Math.abs(container.getBoundingClientRect().x) < container.children[0].offsetLeft + container.children[0].offsetWidth / deltaLeft){
          saveLeft = minLeft

          container.children[1].classList.remove('active')
          container.children[0].classList.add('active')

          container.style.transition = '0.33s'
        }

      }
      container.style.transform = `translateX(${saveLeft}px)`
    })


  }
}

export default moveTouch
