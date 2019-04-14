function selectedMonth(){
  if(/([0-9]{4})-([0-9]{2})-([0-9]{2})/.test(location.pathname)){
    const date = location.pathname.slice(1).split('/')[1].split('-');
    const month = parseInt(date[1]) - 1;
    const day = parseInt(date[2]);

    const calendar = document.getElementsByClassName('header--main__calendar')[0];
    const selectedMonth = calendar.getElementsByClassName('article-calendar')[month];
    const selectedDay = selectedMonth.getElementsByTagName('a')[day - 1].parentElement;
    const title = selectedMonth.getElementsByTagName('h3')[0];
    const calendarOrdersLength = selectedMonth.getElementsByTagName('p')[0];

    const sectionPlanned = document.getElementsByClassName('section--planned__wrap')[0];

    if(sectionPlanned){
      const ordersLength = sectionPlanned.getElementsByTagName('article').length;
      calendarOrdersLength.innerHTML = "заказов: " +  ordersLength;
    }else{
      calendarOrdersLength.innerHTML = "заказов нету";
    }
    if(month == 0 ){
      calendar.style.transform = `translate3d(${28}px, 0, 0)`;
    }else{
      calendar.style.transform = `translate3d(-${selectedMonth.offsetLeft - 28}px, 0, 0)`;
    }


    let titleText = day + " " + title.innerHTML;
    title.innerHTML = titleText;

    selectedDay.classList.add('selected');
  }

}

export default selectedMonth
