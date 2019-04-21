import modal from './modal'

modal({
  className : 'modal-add',
  container : 'div',
  buttons : [
    {
      tag : 'a',
      class : 'button-modal--add',
      text : 'Добавить заказ',
      href : 'order-form.html'
    },
    {
      tag : 'a',
      class : 'button-modal--add',
      text : 'Мне нужно',
      href : '/form-wish'
    }
  ]

});

function buttonAdd(){
 const root = document;
 const body = root.body;
 const buttonAdd = root.getElementsByClassName('button--add')[0];
 const modal = root.getElementsByClassName('modal-add')[0];

 if(!root.forms.addFormOrder){
   buttonAdd.addEventListener('click', function(){
     body.setAttribute('modal', 'open')
     modal.classList.add('open')
   })
 }

}

export default buttonAdd
