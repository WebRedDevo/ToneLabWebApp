

function ajax(){
  const buttonBack = document.getElementsByClassName('button--back')[0];
  if(buttonBack){
    buttonBack.addEventListener('click', function(e){
      e.preventDefault();
      history.back(-1);
    })
  }

}

export default ajax
