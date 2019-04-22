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
    },
    {
      tag : 'button',
      class : 'button-modal--unknown',
      text : 'Без состояния'
    }
  ]

});

function orderCheck(){
  const root = document;
  const body = root.body;
  const order = root.getElementsByClassName('article-planned');
  const modal = root.getElementsByClassName('order-check')[0];
  const button = modal.getElementsByTagName('button');

  const buttonFulfilled = modal.getElementsByClassName('button-modal--fulfilled')[0];

  for( let i = 0, max = order.length; i < max; i++){
    order[i].addEventListener('click', function(e){



      const target = e.target;

      if(target.classList.contains('article-planned__check')){

        e.preventDefault();

        window.onclick = function(e){
          const root = document;
          const body = root.body;
          console.log(e)
          root.querySelector('.section--timetable').innerHTML = e.path[2].getAttribute('href');

        }


        //const path = "/update" + e.path[2].getAttribute('href');
        body.setAttribute('modal', 'open')
        modal.classList.add('open');



        for( let i = 0, max = button.length; i < max; i++ ){
          button[i].addEventListener('click', function(e){
            e.preventDefault();

            const xhr = new XMLHttpRequest();
            xhr.open('POST', path, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            if(e.target.classList.contains('button-modal--fulfilled') ){
              xhr.send("status=1");
            }else if(e.target.classList.contains('button-modal--unfulfilled') ){
              xhr.send("status=0");
            }else{
              xhr.send("status=2");
            }


            xhr.onreadystatechange = function(){
              if(xhr.readyState === 4){
                location.href = location.href;
              }
            }


          })

        }

      }
    });

  }

}

export default orderCheck
