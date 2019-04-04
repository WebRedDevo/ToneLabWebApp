function moveTouch(container){
  if(container){

    let firstTouch;
    let left;

    const minLeft = 28;
    const maxLeft = window.screen.width - container.clientWidth - minLeft;

    container.addEventListener('touchstart', function(e){

      firstTouch = e.changedTouches[0].pageX;
      left = container.getBoundingClientRect().x;
      container.addEventListener('touchmove', function(e){

        let dif = e.changedTouches[0].pageX - firstTouch;

        let saveLeft = left + dif;

        if(saveLeft > minLeft) saveLeft = minLeft
        if(saveLeft < maxLeft) saveLeft = maxLeft

        container.style.transform = `translateX(${saveLeft}px)`

      })
    })

  }
}

export default moveTouch
