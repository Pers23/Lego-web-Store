document.addEventListener("DOMContentLoaded",function(){
   let name = document.getElementById("nom");
   let first = document.getElementById("prenom");
   let mail = document.getElementById("mail");
   let password = document.getElementById("passe");
   let password2 = document.getElementById("conf-pass");
   let formInscript = document.getElementById("formInscript");
   name.addEventListener('keyup',function(){
       if(name.value.length < 2) {
           name.setAttribute('class', 'invalid');
           name.previousElementSibling.setAttribute('class','invalid');
       }
       else {
           name.setAttribute('class','valid');
           name.previousElementSibling.setAttribute('class','valid');
       }

   })
    first.addEventListener('keyup',function(){
        if(first.value.length < 2) {
            first.setAttribute('class', 'invalid');
            first.previousElementSibling.setAttribute('class','invalid');

        }
        else {
            first.setAttribute('class','valid');
            first.previousElementSibling.setAttribute('class','valid');

        }
    })
    mail.addEventListener('keyup',function(){
        if(/^[0-9a-zA-Z._-]+@{1}[0-9a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,5}$/.test(mail.value)) {
            mail.setAttribute('class','valid');
            mail.previousElementSibling.setAttribute('class','valid');
        }
        else {
            mail.setAttribute('class','invalid');
            mail.previousElementSibling.setAttribute('class','invalid');
        }
    })
    
    password.addEventListener('keyup',function(){
        if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/.test(password.value)) {
            password.setAttribute('class','valid');
            password.previousElementSibling.setAttribute('class','valid');
        }
        else {
            password.setAttribute('class','invalid');
            password.previousElementSibling.setAttribute('class','invalid');
        }
    })

    password2.addEventListener('keyup',function(){
        if(password2.value === password.value) {
            password2.setAttribute('class','valid');
            password2.previousElementSibling.setAttribute('class','valid');
        }
        else {
            password2.setAttribute('class','invalid');
            password2.previousElementSibling.setAttribute('class','invalid');
        }
    })

    formInscript.addEventListener('submit',function(event){
        console.log("Non pas encore!!!")
        event.preventDefault();
        console.log('envoyé!!')
        if(document.getElementsByClassName('invalid').length === 0) formInscript.submit();
    })

})