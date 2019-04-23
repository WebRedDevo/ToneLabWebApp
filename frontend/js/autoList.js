import httpGet from './httpGet'

function autoList(){
  const root = document;
  const body = root.body;
  const inputCar = root.getElementsByName('car')[0];

  const modalAutoList = root.getElementsByClassName('modal--auto-list')[0];
  const modalModelList = root.getElementsByClassName('modal--model-list')[0];

  const modelListContainer = modalModelList.getElementsByClassName('auto-list')[0];

  const autoListItem = modalAutoList.getElementsByClassName('auto-list')[0].getElementsByClassName('auto-list__item');

  let nameAuto = '';



  if(inputCar){

    httpGet('price.json')
      .then(
        response => {
          let jsonParse = JSON.parse(response)

          console.log(jsonParse)
          openList(jsonParse)
        }
      );


      function openList(autoList){
        const autoTitle = root.createElement('div');
        autoTitle.className = 'auto-list__item auto-name flex a-i__c j-c__s-b';

        inputCar.addEventListener('touchstart', function(e){
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
            console.log(autoList[nameAuto])
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
