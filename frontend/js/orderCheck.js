import modal from './modal'

modal({
  className : 'order-check',
  container : 'form',
  buttons : [
    {
      tag : 'button',
      class : 'button-modal--fulfilled',
      text : 'Заказ выполнен'
    },
    {
      tag : 'button',
      class : 'button-modal--unfulfilled',
      text : 'Заказ не выполнен'
    }
  ]

});

function orderCheck(){
  const root = document;
  const body = root.body;
  const order = root.getElementsByClassName('article-planned');
  const modal = root.getElementsByClassName('order-check')[0];

  for( let i = 0, max = order.length; i < max; i++){
    order[i].addEventListener('click', function(e){
      const target = e.target;

      if(target.classList.contains('article-planned__check')){
        e.preventDefault();
        body.setAttribute('modal', 'open')
        modal.classList.add('open')
      }
    });

  }

}

export default orderCheck
