import httpGet from './httpGet'

function autoList(){
  const root = document;
  const body = root.body;
  const inputCar = root.getElementsByName('car')[0];
  const inputPrice = root.getElementsByName('price')[0];
  const inputService = root.getElementsByName('service')[0];

  const modalAutoList = root.getElementsByClassName('modal--auto-list')[0];
  const modalModelList = root.getElementsByClassName('modal--model-list')[0];

  const modelListContainer = modalModelList.getElementsByClassName('auto-list')[0];

  const autoListItem = modalAutoList.getElementsByClassName('auto-list')[0].getElementsByClassName('auto-list__item');

  const buttonSelect = root.getElementsByClassName('button--select-car')[0];
  let nameAuto = '';



  if(inputCar){

    httpGet('/price.json')
      .then(
        response => {
          let jsonParse = JSON.parse(response)
          openList(jsonParse)
        }
      );


      function openList(autoList){
        const autoTitle = root.createElement('div');
        autoTitle.className = 'auto-list__item auto-name flex a-i__c j-c__s-b';
        buttonSelect.addEventListener('touchstart', function(e){
          e.preventDefault();
          body.setAttribute('modal', 'open');
          modalAutoList.classList.add('open');
        })

        for(let i = 0, max = autoListItem.length; i < max; i++){

          autoListItem[i].addEventListener('click', function(){
            const h6 = this.getElementsByTagName('h6')[0];
            modalAutoList.classList.remove('open');
            modalModelList.classList.add('open');
            autoTitle.innerHTML = this.innerHTML;
            modalModelList.querySelector('.modal-wrap').prepend(autoTitle);
            nameAuto = h6.innerHTML;
            inputCar.value = nameAuto;

            createListModel(autoList[nameAuto])

            const modelListItems = modelListContainer.getElementsByClassName('auto-list__item');

            for(let i = 0, max = modelListItems.length; i < max; i++){
              modelListItems[i].addEventListener('click', function(){
                let model = this.querySelector('p').innerHTML;


                createListModel(autoList[nameAuto][model]);
      
                for(let i = 0, max = modelListItems.length; i < max; i++){
                  modelListItems[i].addEventListener('click', function(){
                    let year = this.querySelector('p').innerHTML;
                    createListModel(autoList[nameAuto][model][year]);

                    for(let i = 0, max = modelListItems.length; i < max; i++){
                      modelListItems[i].addEventListener('click', function(){
                        let service = this.querySelector('p').innerHTML;
                        createListModel(autoList[nameAuto][model][year][service]);

                        for(let i = 0, max = modelListItems.length; i < max; i++){
                          modelListItems[i].addEventListener('click', function(){
                            let service2 = this.querySelector('p').innerHTML;
                            createListModel(autoList[nameAuto][model][year][service][service2]);
                            if(inputService.value !== ''){
                              inputService.value += ", " + service2;
                            }else{
                              inputService.value = service + ": " + service2;
                            }


                            for(let i = 0, max = modelListItems.length; i < max; i++){
                              modelListItems[i].addEventListener('click', function(){
                                let service3 = this.querySelector('p').innerHTML;

                                if(inputPrice.value !== ''){
                                  inputPrice.value = parseInt(inputPrice.value) + parseInt(autoList[nameAuto][model][year][service][service2][service3]);
                                }else{
                                  inputPrice.value = autoList[nameAuto][model][year][service][service2][service3];
                                }

                                modalModelList.classList.remove('open');
                                body.setAttribute('modal', '');
                              })
                            }


                          })
                        }

                      })
                    }

                  })
                }

              })
            }

          })
        }
      }


    function createListModel(modelList){
      const ul = root.createElement('ul');
      ul.className = 'auto-list';
      function createItem(title){
        const li = root.createElement('li');
        const p = root.createElement('p');
        li.className = 'auto-list__item';
        p.innerHTML = title;
        li.appendChild(p)
        return li;
      }
      for(let key in modelList){
        ul.appendChild(createItem(key))
      }
      modelListContainer.innerHTML = ul.innerHTML;
    }



    function closeModal(container){
      container.addEventListener('click', function(e){
        const target = e.target;
        if(target.classList.contains('open')){
          body.setAttribute('modal', '')
          this.classList.remove('open')
        }
      })
    }

    closeModal(modalAutoList)
    closeModal(modalModelList)

  }
}

export default autoList
