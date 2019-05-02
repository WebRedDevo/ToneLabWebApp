function moveTouch(object){
  if(object.container){


    const touchMove = object.touch;
    const container = object.container;
    const control = object.controlContainer;
    const current = container.getElementsByClassName('current')[0];
    const currentLeft = object.currentLeft ? object.currentLeft : object.padding;
    let childrenMas = [
      container
    ]

    let firstTouch;
    let left;
    let saveLeft;
    let dif
    const minLeft = object.padding ? object.padding : 0;
    const maxLeft = container.parentElement.offsetWidth - container.offsetWidth - minLeft;


    if(current){
        container.style.transform = `translate3d(-${current.offsetLeft - currentLeft}px, 0, 0)`
    }

    if(control){
      let coordX;
      let coordY;

      childrenMas.push(control)

      for(let i = 0, max = control.children.length; i < max; i++){
        control.children[i].addEventListener('touchstart', function(e){
            e.preventDefault();
            coordY = e.changedTouches[0].pageY;
            coordX = e.changedTouches[0].pageX;
        })

        control.children[i].addEventListener('touchend', function(e){
          e.preventDefault();
          if(coordY === e.changedTouches[0].pageY && coordX === e.changedTouches[0].pageX  ){
            changeControlButton()
          }
        })

        function changeControlButton(e){


          for(let children in childrenMas){
            for(let i = 0, max = childrenMas[children].children.length; i < max; i++){
              childrenMas[children].children[i].classList.remove('active')
            }
            childrenMas[children].children[i].classList.add('active')
          }

          container.style.transition = '0.33s'
          console.log(container.children[i].offsetLeft)
          console.log(container.children[i].getBoundingClientRect().left)
          container.style.transform = `translate3d(-${container.children[i].offsetLeft - 28 }px, 0, 0)`
        }
      }



    }

    container.ondragstart = function() {
      return false;
    };

    if(touchMove){
      container.addEventListener('touchstart', function(e){
        container.style.willChange = 'transform';
        container.style.transition = ''

        firstTouch = e.changedTouches[0].pageX;
        left = container.getBoundingClientRect().x;

        container.addEventListener('touchmove', function(e){

          dif = e.changedTouches[0].pageX - firstTouch;
          saveLeft = left + dif;

          if(saveLeft > minLeft) saveLeft = minLeft
          if(saveLeft < maxLeft) saveLeft = maxLeft

          container.style.transform = `translate3d(${saveLeft}px, 0, 0)`
        })
      })

      container.addEventListener('touchend', function(){

        container.style.willChange = 'auto';

        for(let i = 0, max = container.children.length; i < max; i++){

          let deltaLeft = dif < 0 ? 6 : 2;

          if( Math.abs(container.getBoundingClientRect().x) > container.children[i].offsetLeft + container.children[i].offsetWidth / deltaLeft){

              saveLeft = -container.children[i+1].offsetLeft + minLeft;

              for(let children in childrenMas){
                for(let i = 0, max = childrenMas[children].children.length; i < max; i++){
                  childrenMas[children].children[i].classList.remove('active')
                }
                childrenMas[children].children[i+1].classList.add('active')
              }

              container.style.transition = '0.33s'

          }else if(Math.abs(container.getBoundingClientRect().x) < container.children[0].offsetLeft + container.children[0].offsetWidth / deltaLeft){
            saveLeft = minLeft

            for(let children in childrenMas){
              childrenMas[children].children[1].classList.remove('active')
              childrenMas[children].children[0].classList.add('active')
            }
            container.style.transition = '0.33s'
          }

        }
        container.style.transform = `translate3d(${saveLeft}px, 0, 0)`
      })

    }

  }
}

export default moveTouch
