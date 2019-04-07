function moveTouch(container){
  if(container){

    let firstTouch;
    let left;
    let saveLeft;

    const minLeft = 28;
    const maxLeft = 375 - container.offsetWidth - minLeft;

    container.addEventListener('touchstart', function(e){

      container.style.transition = ''

      firstTouch = e.changedTouches[0].pageX;
      left = container.getBoundingClientRect().x;

      container.addEventListener('touchmove', function(e){

        let dif = e.changedTouches[0].pageX - firstTouch;



        saveLeft = left + dif ;


        if(saveLeft > minLeft) saveLeft = minLeft
        if(saveLeft < maxLeft) saveLeft = maxLeft

        container.style.transform = `translateX(${saveLeft}px)`



      })
    })


    container.addEventListener('touchend', function(){

      for(let i = 0, max = container.children.length; i < max; i++){
        console.log(i + ": "+ container.children[i].offsetLeft )

        if(Math.abs(container.getBoundingClientRect().x) > container.children[i].offsetLeft + container.children[i].offsetWidth / 2){

            saveLeft = -container.children[i+1].offsetLeft + 28;
            console.log(container.children[i+1])
            console.log(saveLeft)
            container.style.transition = '0.33s'
        }
      }

      container.style.transform = `translateX(${saveLeft}px)`

    })


  }
}

export default moveTouch
