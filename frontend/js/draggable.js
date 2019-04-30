function draggable(){
  const root = document;
  const body = document.body;
  const sectionTimetable = root.getElementsByClassName('section--timetable')[0];
  const task = sectionTimetable.getElementsByClassName('article-planned');

  let startPageX;
  let startPageY;


  for(let i = 0, max = task.length; i < max; i++){
    task[i].addEventListener('touchstart', function(e){

      task[i].oncontextmenu = function() {
        return false;
      };

      startPageX = e.changedTouches[0].pageX;
      startPageY = e.changedTouches[0].pageY;

      let changedX = e.changedTouches[0].pageX - startPageX;
      let changedY = e.changedTouches[0].pageY - startPageY;


      const shiftX = startPageX - task[i].getBoundingClientRect().left;
      console.log(startPageX)
      console.log(Math.floor(task[i].getBoundingClientRect().left))
      console.log(task[i])


      body.setAttribute('scroll','false')
      this.classList.add('draggable')
      task[i].style.transform = `translate3d(${Math.floor(task[i].getBoundingClientRect().left) + 60}px,${changedY}px,0) rotate(5deg)`

      root.addEventListener('touchmove', function(e){

        if(task[i].classList.contains('draggable')){
          let changedX = e.changedTouches[0].pageX - startPageX;
          let changedY = e.changedTouches[0].pageY - startPageY;
          task[i].style.transform = `translate3d(${changedX }px,${changedY}px,0) rotate(5deg)`
        }


      })

    })

    task[i].addEventListener('touchend', function(e){


      body.setAttribute('scroll','true')
      this.classList.remove('draggable')

      task[i].style.transform = `translate3d(0px,0px,0) rotate(0deg)`

    })



  }



}

export default draggable
