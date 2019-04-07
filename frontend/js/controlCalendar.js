function controlCalendar(){
  const root = document;
  const body = root.body;
  const calendars = root.getElementsByClassName('article-calendar');

  let coordX;
  let coordY;

  for( let i = 0, max = calendars.length; i < max; i++){

    calendars[i].querySelector('.article-calendar__header').addEventListener('touchstart', function(e){
        coordY = e.changedTouches[0].pageY;
        coordX = e.changedTouches[0].pageX;
    })

    calendars[i].querySelector('.article-calendar__header').addEventListener('touchend', function(e){

        if(coordY === e.changedTouches[0].pageY && coordX === e.changedTouches[0].pageX  ){
          openCalendar()
        }
    })
  }

  function openCalendar(){

    if(body.getAttribute('calendar')){
      body.setAttribute('calendar', '')
    }else{
      body.setAttribute('calendar', 'open')
    }

    for( let i = 0, max = calendars.length; i < max; i++){
      calendars[i].classList.toggle('open')
    }
  }

}

export default controlCalendar
