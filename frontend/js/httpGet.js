function httpGet(url){
  return new Promise(function(resolve,reject){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function(){
      if(this.status == 200){
        resolve(this.response);
      }else{
        let error = new Error(this.statusText);
        error.code = this.status;
        reject(error);
      }
    }

    xhr.onerror = function(){
      reject(new Error("Netwerk error"));
    }
    xhr.send();
  })
}


export default httpGet
