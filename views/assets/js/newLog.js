const issue = document.querySelector('[data-student = "issue"]'),
      goal = document.querySelector('[data-student = "goals"]'),
      intervention = document.querySelector('[data-student = "interven"]'),
      skills = document.querySelector('[data-student = "employed"]'),
      evaluation = document.querySelector('[data-student = "closure"]'),
      logBtn = document.querySelector('[data-student = "submit"]'),
      errorDiv = document.querySelector('[data-student = "error"]');

let form;

const errorMsg = (message) => {
    errorDiv.innerText = message;
    setTimeout(() => {
        errorDiv.style.display = 'block';
        
    }, 10);
}

const request = {
    add : () => {
        form = new FormData();
        form.append('issue', issue.value);
        form.append('goal', goal.value);
        form.append('intervention', intervention.value);
        form.append('skills', skills.value);
        form.append('evaluation', evaluation.value);
        form.append('addLog', true);

        fetch('/addingNewLog/'+parseInt(new URL(document.location).pathname.split("/").filter(id=>id).at(-1))+'?etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a='+new URL(document.location).searchParams.get('etr3545-3656-32dsdf-32dsd-fdhg-323-sads-23-sddfds-a'), {
            method: 'POST',
            body : form
        })
        .then(res => res.json())
        .then((result) => {
            if(result.status){
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                  })
                customAlert.alert(result.message);
                setTimeout(() => {
                    location.href = '/reports';
                }, 2500);
            }else{
                errorMsg(result.message);
                setTimeout(() => {
                    errorDiv.style.display = 'none';
                    errorDiv.innerText = '';
                }, 5000);
            }
        })
        .catch(err => alert(err));
    }
}

logBtn.addEventListener('click', (e) => {
    e.preventDefault();
    request.add();
});