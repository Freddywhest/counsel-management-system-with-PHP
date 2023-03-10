const stName = document.querySelector('[data-student = "name"]'),
      stIdNumber = document.querySelector('[data-student = "id-number"]'),
      stDepartment = document.querySelector('[data-student = "department"]'),
      stProgramme = document.querySelector('[data-student = "programme"]'),
      stLevel = document.querySelector('[data-student = "year"]'),
      stHall = document.querySelector('[data-student = "hall"]'),
      stRoom = document.querySelector('[data-student = "room"]'),
      stWhatsapp = document.querySelector('[data-student = "whatsapp"]'),
      stOtherContact = document.querySelector('[data-student = "other-contact"]'),
      stEmail = document.querySelector('[data-student = "email"]'),
      stDob = document.querySelector('[data-student = "dob"]'),
      stSiblings = document.querySelector('[data-student = "siblings"]'),
      stPob = document.querySelector('[data-student = "pob"]'),
      stGender = document.querySelector('[data-student = "gender"]'),
      stReligion = document.querySelector('[data-student = "religion"]'),
      stNoc = document.querySelector('[data-student = "noc"]'),
      stRelationship = document.querySelector('[data-student = "relationship"]'),
      stGuOccup = document.querySelector('[data-student = "g-occup"]'),
      stGuContact = document.querySelector('[data-student = "g-contact"]'),
      stLevelAch = document.querySelector('[data-student = "level-ach"]'),
      stGuMarried = document.querySelector('[data-student = "married"]'),
      stAnyIssue = document.querySelector('[data-student = "aoi1"]'),
      stAAcademic = document.querySelector('[data-student = "a-academic"]'),
      stASocial = document.querySelector('[data-student = "a-social"]'),
      stAPolitical = document.querySelector('[data-student = "a-political"]'),
      stAOther = document.querySelector('[data-student = "a-other"]'),
      stFAcademic = document.querySelector('[data-student = "f-academic"]'),
      stFSocial = document.querySelector('[data-student = "f-social"]'),
      stFPolitical = document.querySelector('[data-student = "f-political"]'),
      stFOther = document.querySelector('[data-student = "f-other"]'),
      stLikes = document.querySelector('[data-student = "likes"]'),
      stDislikes = document.querySelector('[data-student = "dislikes"]'),
      stCis = document.querySelector('[data-student = "cis"]'),
      stCap = document.querySelector('[data-student = "cap"]'),
      stCys = document.querySelector('[data-student = "cys"]'),
      stAmbitions = document.querySelector('[data-student = "ambitions"]'),
      stStrengths = document.querySelector('[data-student = "strengths"]'),
      stWeaknesses = document.querySelector('[data-student = "weaknesses"]'),
      stHealth = document.querySelector('[data-student = "health"]'),
      stSuicide = document.querySelector('[data-student = "suicide"]'),
      stRelative = document.querySelector('[data-student = "relative"]'),
      stFriend = document.querySelector('[data-student = "friend"]'),
      stRoommate = document.querySelector('[data-student = "roommate"]'),
      stBothering = document.querySelector('[data-student = "bothering"]'),
      stACTIVITY = document.querySelector('[data-student = "ACTIVITY"]'),
      stAddBtn = document.querySelector('[data-student = "submit"]'),
      errorDiv = document.querySelector('[data-student = "error"]');

let form;

const errorMsg = (message) => {
    errorDiv.innerText = message;
    setTimeout(() => {
        errorDiv.style.display = 'block';
        
    }, 10);
}

const request = {
    addStudent : () => {
        form = new FormData();
        form.append('stName', stName.value);
        form.append('stIdNumber', stIdNumber.value);
        form.append('stDepartment', stDepartment.value);
        form.append('stProgramme', stProgramme.value);
        form.append('stHall', stHall.value);
        form.append('stRoom', stRoom.value);
        form.append('stEmail', stEmail.value);
        form.append('stLevel', stLevel.value);
        form.append('stWhatsapp', stWhatsapp.value);
        form.append('stOtherContact', stOtherContact.value);
        form.append('stDob', stDob.value);
        form.append('stSiblings', stSiblings.value);
        form.append('stPob', stPob.value);
        form.append('stGender', stGender.value);
        form.append('stReligion', stReligion.value);
        form.append('stNoc', stNoc.value);
        form.append('stRelationship', stRelationship.value);
        form.append('stGuOccup', stGuOccup.value);
        form.append('stGuContact', stGuContact.value);
        form.append('stLevelAch', stLevelAch.value);
        form.append('stGuMarried', stGuMarried.value);
        form.append('stAnyIssue', stAnyIssue.value);
        form.append('stAAcademic', stAAcademic.value);
        form.append('stASocial', stASocial.value);
        form.append('stAPolitical', stAPolitical.value);
        form.append('stAOther', stAOther.value);
        form.append('stFAcademic', stFAcademic.value);
        form.append('stFSocial', stFSocial.value);
        form.append('stFPolitical', stFPolitical.value);
        form.append('stFOther', stFOther.value);
        form.append('stLikes', stLikes.value);
        form.append('stDislikes', stDislikes.value);
        form.append('stCis', stCis.value);
        form.append('stCap', stCap.value);
        form.append('stCys', stCys.value);
        form.append('stAmbitions', stAmbitions.value);
        form.append('stStrengths', stStrengths.value);
        form.append('stWeaknesses', stWeaknesses.value);
        form.append('stHealth', stHealth.value);
        form.append('stSuicide', stSuicide.value);
        form.append('stRelative', stRelative.value);
        form.append('stFriend', stFriend.value);
        form.append('stRoommate', stRoommate.value);
        form.append('stBothering', stBothering.value);
        form.append('stACTIVITY', stACTIVITY.value);
        form.append('addStud', true);

        fetch('/addingStudentDetails', {
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
                    location.href = '/students';
                }, 2500);
            }else{
                errorMsg(result.message);
                setTimeout(() => {
                    errorDiv.style.display = 'none';
                    errorDiv.innerText = '';
                }, 6000);
            }
        })
        .catch(err => alert(err));
    }

}

stAddBtn.addEventListener('click', (e) => {
    e.preventDefault();
    request.addStudent();
})