function orderCheck(){
  const root = document;
  const body = root.body;
  const order = document.getElementsByClassName('article-planned');
  const modal = document.getElementsByClassName('modal')[0];
  for( let i = 0, max = order.length; i < max; i++){

    order[i].addEventListener('click', function(e){
      let target = e.target;

      if(target.classList.contains('article-planned__check')){
        e.preventDefault()

        body.setAttribute('calendar', 'open-modal')
        modal.classList.add('open')

      }
    });

  }

}

export default orderCheck
