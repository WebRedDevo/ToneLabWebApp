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
            root.getElementsByTagName('main')[0].innerHTML = dom.getElementsByTagName('main')[0].innerHTML;
            formValidate()
          }
        }
      }
    })
  }
}

export default formValidate
