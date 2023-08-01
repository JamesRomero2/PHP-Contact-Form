const form = document.querySelector('form');
const emailStatus = form.querySelector('.status');

form.onsubmit = (e) => {
  e.preventDefault();
  emailStatus.style.display = 'block';

  let xmlreq = new XMLHttpRequest();
  xmlreq.open("POST", "message.php", true);
  xmlreq.onload = () => {
    if (xmlreq.status == 200 && xmlreq.readyState == 4) {
      let res = xmlreq.response;
      
      if(res.indexOf("required") != -1 || res.indexOf("valid") != -1 || res.indexOf("failed") != -1){
        emailStatus.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          emailStatus.style.display = "none";
        }, 3000);
      }
      emailStatus.innerText = res;
    }
  }
  let formData = new FormData(form);
  xmlreq.send(formData);
}