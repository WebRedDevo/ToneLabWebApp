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

if (!("path" in Event.prototype)){
  Object.defineProperty(Event.prototype, "path", {
    get: function() {
      var path = [];
      var currentElem = this.target;
      while (currentElem) {
        path.push(currentElem);
        currentElem = currentElem.parentElement;
      }
      if (path.indexOf(window) === -1 && path.indexOf(document) === -1)
        path.push(document);
      if (path.indexOf(window) === -1)
        path.push(window);
      return path;
    }
  });
}

function orderCheck(){
  const root = document;
  const body = root.body;
  const order = root.getElementsByClassName('article-planned');
  const modal = root.getElementsByClassName('order-check')[0];
  const button = modal.getElementsByTagName('button');

  const buttonFulfilled = modal.getElementsByClassName('button-modal--fulfilled')[0];

  for( let i = 0, max = order.length; i < max; i++){

    order[i].addEventListener('click', function(e){


      const selectOrder = this;
      const target = e.target;

      if(target.classList.contains('article-planned__check')){
        e.preventDefault();

        const path = "/update" + e.path[2].getAttribute('href');

        body.setAttribute('modal', 'open')
        modal.classList.add('open');

        console.log(this)


        for( let i = 0, max = button.length; i < max; i++ ){
          button[i].addEventListener('click', function(e){
            e.preventDefault();

            //const xhr = new XMLHttpRequest();
            //xhr.open('POST', path, true);
            //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            console.log(button)


            if(this.classList.contains('button-modal--fulfilled') ){
              //xhr.send("status=1");
              selectOrder.classList.add('fulfilled')
            }else if(this.classList.contains('button-modal--unfulfilled') ){
              //xhr.send("status=0");
              selectOrder.classList.add('unfulfilled')
            }else{
              //xhr.send("status=2");
              selectOrder.classList.remove('fulfilled')
              selectOrder.classList.remove('unfulfilled')
            }


            // xhr.onreadystatechange = function(){
            //   if(xhr.readyState === 4){
            //     //location.href = location.href;
            //   }
            // }


          })

        }

      }
    });

  }

  modal.addEventListener('touchstart', function(e){
    const target = e.target;
    if(target.classList.contains('open')){
      body.setAttribute('modal', '')
      modal.classList.remove('open')
    }
  })

}

export default orderCheck
