function formValidate(){
  if(document.getElementsByClassName('send-form')[0]){
    const form = document.getElementsByClassName('form--add-order')[0];
    const buttonAdd = document.getElementsByClassName('button--add')[0];
    const input = form.getElementsByTagName('input');

    buttonAdd.removeChild(buttonAdd.querySelector('svg'));
    buttonAdd.classList.add('active');

    buttonAdd.addEventListener('click', function(e){
      e.preventDefault();

      for(let i = 0, max = input.length; i < max; i++){
        console.log(input[i].value)
      }
    })


  }

}

export default formValidate
