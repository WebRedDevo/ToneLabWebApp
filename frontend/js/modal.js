function modal(modalInfo){
    const root = document;
    const body = root.body;

    const modal = root.createElement('div');
    const container = root.createElement(modalInfo.container);

    /*

    */
    function createdButton(tag,className,text,href = ''){
      const button = root.createElement(tag);
      button.className = "button-modal flex j-c__c " + className;
      button.innerHTML = text;
      if(href){
        button.href = href;
      }
      return button;
    }

    modal.className = "modal flex j-c__c a-i__c";
    modal.classList.add(modalInfo.className);
    container.className = "form--order-check flex f-d__c a-i__c";

    for(let i = 0, max = modalInfo.buttons.length; i < max; i++){
      container.appendChild(createdButton(
        modalInfo.buttons[i].tag,
        modalInfo.buttons[i].class,
        modalInfo.buttons[i].text,
        modalInfo.buttons[i].href
      ))
    }

    modal.appendChild(container);
    body.appendChild(modal);

    modal.addEventListener('touchstart', function(e){
      const target = e.target;
      if(target.classList.contains('open')){
        body.setAttribute('modal', '')
        modal.classList.remove('open')
      }
    })

}

export default modal
