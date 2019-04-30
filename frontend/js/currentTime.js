function currentTime(){
  const currentDate = new Date();
  const currentHours = currentDate.getHours();

  const root = document;
  const body = document.body;
  const sectionTimetable = root.getElementsByClassName('section--timetable')[0];

  const currentDay = sectionTimetable.getElementsByClassName('timetable current')[0];
  const tableRow = currentDay.getElementsByClassName('timetable__item');

  for(let i = 0, max = tableRow.length; i < max; i++){

    let timeTableRow = parseInt(tableRow[i].getElementsByClassName('timetable__time')[0].innerHTML);
    if(timeTableRow === currentHours){
      tableRow[i].classList.add('active')
    }
  }



}

export default currentTime
