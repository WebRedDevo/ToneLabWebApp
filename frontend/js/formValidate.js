import modal from './modal'

modal({
  className : 'modal-warning',
  container : 'div',
  title : 'Заказ успешно добавлен',
  buttons : [
    {
      tag : 'a',
      class : 'button-modal--add',
      text : 'Открыть заказы',
      href : '/'
    },
    {
      tag : 'a',
      class : 'button-modal--add',
      text : 'Добавить еще',
      href : '/form-add'
    }
  ]

});

function formValidate(){
  const root = document;
  const body = root.body;
  const modal = root.getElementsByClassName('modal-warning')[0];
  if(root.getElementsByClassName('send-form')[0]){
    const form = root.getElementsByClassName('form--add-order')[0];
    const buttonAdd = root.getElementsByClassName('button--add')[0];
    const input = form.getElementsByTagName('input');

    buttonAdd.removeChild(buttonAdd.querySelector('svg'));
    buttonAdd.classList.add('active');

    buttonAdd.addEventListener('click', function validate(e){
      e.preventDefault();
      let formCheck = false;
      let inputCheck = 0;
      let masRequiredInput = [];

      for(let i = 0, max = input.length; i < max; i++){
          if(input[i].required){
            masRequiredInput.push(input[i])
          }
      }
      for(let input in masRequiredInput){
        if(masRequiredInput[input].value === ''){
          masRequiredInput[input].classList.add('warning');
        }else{
          masRequiredInput[input].classList.remove('warning');
          inputCheck += 1;
        }
      }
      if(inputCheck === masRequiredInput.length){
        formCheck = true;
      }
      if(formCheck){
        const xhr = new XMLHttpRequest();
        xhr.open('POST', location.pathname, true);

        let formData = new FormData(root.forms.addFormOrder);
        xhr.send(formData)

        xhr.onreadystatechange = function(){
          if(xhr.readyState === 4){
            let dom = new DOMParser().parseFromString(xhr.response, 'text/html');
            root.getElementsByTagName('form')[0].innerHTML = dom.getElementsByTagName('form')[0].innerHTML;
            formCheck = false;
            body.setAttribute('modal', 'open');
            modal.classList.add('open');

          }
        }
      }
    })
  }
}

export default formValidate
