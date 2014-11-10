function verifyPassword(){
    var password = document.getElementById('password');
    var verifypass = document.getElementById('verify password');

      var bool = true;
      if(password.value != verifypass.value){
        verifypass.setAttribute('style', 'background-color: pink');
        password.setAttribute('style', 'background-color: pink');
        
        bool = false;
        
      }
}

