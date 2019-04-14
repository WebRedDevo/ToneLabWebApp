function formValidate(){
  const root = document;

  if(root.getElementsByClassName('send-form')[0]){
    const form = root.getElementsByClassName('form--add-order')[0];
    const buttonAdd = root.getElementsByClassName('button--add')[0];
    const input = form.getElementsByTagName('input');

    buttonAdd.removeChild(buttonAdd.querySelector('svg'));
    buttonAdd.classList.add('active');

    buttonAdd.addEventListener('click', function(e){
      e.preventDefault();
      let quantityEmpty = 0;

      for(let i = 0, max = input.length; i < max; i++){
          if(input[i].value !== '' && input[i].name !== 'name' && input[i].name !== 'telephone' && input[i].name !== 'notice'){
            quantityEmpty++;
          }
      }

      if(quantityEmpty === input.length - 3){

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/form-add', true);

        let formData = new FormData(root.forms.addFormOrder);
        xhr.send(formData)

        xhr.onreadystatechange = function(){
          if(xhr.readyState === 4){
            let dom = new DOMParser().parseFromString(xhr.response, 'text/html');
            root.getElementsByTagName('main')[0].innerHTML = dom.getElementsByTagName('main')[0].innerHTML;
          }
        }
      }else{

        for(let i = 0, max = input.length; i < max; i++){
            if(input[i].value === '' && input[i].name !== 'name' && input[i].name !== 'telephone' && input[i].name !== 'notice'){
              input[i].classList.add('warning');
            }
        }

      }


    })


  }

}

export default formValidate
