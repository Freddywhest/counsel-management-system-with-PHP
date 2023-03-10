const sfName = document.querySelector('[data-staff = "name"]'),
      sfGender = document.querySelector('[data-staff = "gender"]'),
      sfCategory = document.querySelector('[data-staff = "cat"]'),
      sfDepartment = document.querySelector('[data-staff = "department"]'),
      sfPosition = document.querySelector('[data-staff = "pos"]'),
      sfOtherPosition = document.querySelector('[data-staff = "otherpos"]'),
      sfWhatsappNo = document.querySelector('[data-staff = "whatsapp"]'),
      sfAnyContact = document.querySelector('[data-staff = "anycon"]'),
      sfEmail = document.querySelector('[data-staff = "email"]'),
      sfPersonalIssue = document.querySelector('[data-staff = "personal"]'),
      updateStaffBtn = document.querySelector('[data-staff = "submit"]'),
      errorDiv = document.querySelector('[data-staff = "error"]');

let form;

const errorMsg = (message) => {
    errorDiv.innerText = message;
    setTimeout(() => {
        errorDiv.style.display = 'block';
        
    }, 10);
}

const request = {
    add: () => {
        form = new FormData();
        form.append('sfName', sfName.value);
        form.append('sfGender', sfGender.value);
        form.append('sfCategory', sfCategory.value);
        form.append('sfDepartment', sfDepartment.value);
        form.append('sfPosition', sfPosition.value);
        form.append('sfOtherPosition', sfOtherPosition.value);
        form.append('sfWhatsappNo', sfWhatsappNo.value);
        form.append('sfAnyContact', sfAnyContact.value);
        form.append('sfEmail', sfEmail.value);
        form.append('sfPersonalIssue', sfPersonalIssue.value);
        form.append('addStaff', true);

        fetch('/addingStaffDetails', {
            method : 'POST',
            body : form
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
                    location.href = '/staffs';
                }, 2500);
            }else{
                errorMsg(result.message);
                setTimeout(() => {
                    errorDiv.style.display = 'none';
                    errorDiv.innerText = '';
                }, 5000);
            }
        })
        .catch(err=>alert(err));
    }
}

updateStaffBtn.addEventListener('click', (e) => {
    e.preventDefault();
    request.add();
})