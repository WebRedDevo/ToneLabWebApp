function formValidate(){
  if(document.getElementsByClassName('send-form')[0]){
    const form = document.getElementsByClassName('form--add-order')[0];
    const buttonAdd = document.getElementsByClassName('button--add')[0];
    const input = form.getElementsByTagName('input');

    buttonAdd.removeChild(buttonAdd.querySelector('svg'));
    buttonAdd.classList.add('active');

    buttonAdd.addEventListener('click', function(e){
      e.preventDefault();
      let quantityEmpty = 0;

      for(let i = 0, max = input.length; i < max; i++){
          if(input[i].value !== ''){
            quantityEmpty++;
          }
      }

      if(quantityEmpty === input.length){
        console.log('пустых полей нет');

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'form-add', true);

        let formData = new FormData(document.forms.addFormOrder);
        xhr.send(formData)

        xhr.onreadystatechange = function(){
          if(xhr.readyState === 4){

            console.log(xhr.response)
            document.body.innerHTML = xhr.response
            console.log(formData.get('name'))

          }
        }
      }else{
        console.log('заполненны не все поля');
      }


    })


  }

}

export default formValidate
