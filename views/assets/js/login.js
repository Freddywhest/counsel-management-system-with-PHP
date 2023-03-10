const userEmail = document.querySelector('[data-login="email"]'),
      userPassword = document.querySelector('[data-login="password"]'),
      signInBtn = document.querySelector('[data-login="sign-in"]'),
      errorDiv = document.querySelector('[class="alert-box red"]');

let form;

const errorMsg = (message) => {
    errorDiv.innerText = message;
    setTimeout(() => {
        errorDiv.style.display = 'block';
        
    }, 10);
}


const request = {
    login : () => {
        console.log('click');
        form = new FormData();
        form.append('userEmail', userEmail.value);
        form.append('userPassword', userPassword.value);
        form.append('login', true);

        fetch('/userLogIn', {
            method: 'POST',
            body: form
        })
        .then(response => response.json())
        .then((result) => {
            if(result.status){
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                  })
                customAlert.alert(result.message);
                setTimeout(() => {
                    location.href = '/';
                }, 1500);
            }else{
                errorMsg(result.message);
                setTimeout(() => {
                    errorDiv.style.display = 'none';
                    errorDiv.innerText = '';
                }, 3500);
            }
        })
        .catch(err => alert(err));
    }
}


signInBtn.addEventListener('click', (e) => {
    e.preventDefault();
    request.login();
})