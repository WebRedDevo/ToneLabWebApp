function autoList(){
  const root = document;
  const body = root.body;
  const inputCar = root.getElementsByName('car')[0];
  const modal = root.getElementsByClassName('modal--auto-list')[0];

  if(inputCar){
    inputCar.addEventListener('click',function(){
      body.setAttribute('modal', 'open')
      modal.classList.add('open')
    })

  }
}

export default autoList
