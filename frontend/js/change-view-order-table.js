function changeViewOrderTable(){
  if(document.getElementsByClassName('icon-eye')[0]){
    const root = document;
    const sectionTimetable = root.getElementsByClassName('section--timetable')[0];

    const changeButton = sectionTimetable.getElementsByClassName('icon-eye')[0];

    changeButton.addEventListener('click', function(){
      if(sectionTimetable.getAttribute('view') === 'max-info'){
        sectionTimetable.setAttribute('view', 'min-info');
      }else{
        sectionTimetable.setAttribute('view', 'max-info');
      }
    })
  }


}

export default changeViewOrderTable
