const downloadBtn = document.querySelector(".download-btn");
const documentDiv = document.querySelector(".cv-div");

downloadBtn.addEventListener('click', () => {
    var opt = {
        margin: 0,
        filename: 'CV.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: {
            scale: 3,
            margin: 0,
            scrollX: 0,
            scrollY: 0,
            width: documentDiv.scrollWidth,
            height: documentDiv.scrollHeight,
        },
        jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().from(documentDiv).set(opt).save();
});

//social networks

let popup = document.querySelector("#popup");
let closeBtn = popup.querySelector("#closeBtn");
let saveBtn = popup.querySelector("#saveBtn");
let socialLinkInput = popup.querySelector("#socialLink");
let typeLbl = popup.querySelector('#type-lbl');
let clickedDiv;

window.openPopup = function (type, div) {
    clickedDiv = div;
    typeLbl.textContent = type;
    popup.style.display = "block";
}
closeBtn.onclick = function () {
    popup.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}
saveBtn.onclick = function () {
    const lbl = document.querySelector(`#${typeLbl.textContent.toLowerCase()}-lbl`);
    if (socialLinkInput.value != '') {
        clickedDiv.style.backgroundColor = '#613FE5';
        lbl.innerHTML = socialLinkInput.value;
    }
    else {
        clickedDiv.style.backgroundColor = '#fff';
        lbl.innerHTML = typeLbl.textContent;
    }
    popup.style.display = "none";
}

//skills and languages

let popupSkill = document.querySelector("#popup-skill");
let closeBtnSkill = document.querySelector("#closeBtnSkill");
let saveBtnSkill = document.querySelector("#saveBtnSkill");
let globaltype = null;
const errorLbl = document.querySelector('.error-lbl');
const deleteBtn = document.querySelector('.delete-btn');
let savedDiv = false;
let clickedSkilldDiv = null;
let connectedDivs = [];

openSkillPopup = function (type, div) {

    document.querySelector('#skill').value = !type ? div.querySelector('.skill-lbl').textContent : '';
    document.querySelector('#skill-precentage').value = !type ? div.querySelector('.skill-pr-lbl').textContent : '';

    errorLbl.style.display = 'none';
    popupSkill.style.display = "block";
    globaltype = type;
    clickedSkilldDiv = div;
    const typelbl = popupSkill.querySelector('#type-lbl');
    typelbl.textContent = type == 'skill' ? 'Naziv vestine' : 'Naziv jezika';
    if (!type) {
        deleteBtn.onclick = function () {
            deleteDiv(div);
        }
    }
}
closeBtnSkill.onclick = function () {
    popupSkill.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == popupSkill) {
        popupSkill.style.display = "none";
    }
}
saveBtnSkill.onclick = function () {
    let skillName = document.querySelector('#skill').value;
    let skillPrecentage = document.querySelector('#skill-precentage').value;
    skillPrecentage = skillPrecentage.replace(/%/g, "");
    const mainSkillsDiv = document.querySelector(`.${globaltype}s`);

    if (skillName != "" && skillPrecentage != "") {
        if (parseInt(skillPrecentage) > 100 || parseInt(skillPrecentage) < 0) {
            errorLbl.textContent = "% mora biti izmedju 0 i 100%";
            errorLbl.style.display = 'block';
            return;
        }
        if (isNaN(skillPrecentage)) {
            errorLbl.textContent = "Nevalidni podaci";
            errorLbl.style.display = 'block';
            return;
        }
        if (globaltype == null)
            updateDiv(clickedSkilldDiv, skillName, skillPrecentage);
        else
            drawSkillDiv(mainSkillsDiv, skillName, skillPrecentage);
        popupSkill.style.display = "none";
    }
    else {
        errorLbl.textContent = "Morate uneti navedene podatke";
        errorLbl.style.display = 'block';
        return;
    }
}

function updateDiv(div, name, precentage) {
    div.querySelector('.skill-lbl').innerHTML = name;
    div.querySelector('.skill-pr-lbl').innerHTML = precentage;
    let obj = connectedDivs.find(el => el.div == div);

    if (div.parentElement.classList.contains('skills')) {
        obj.sDiv.querySelector('.dinamic-progress').style.width = 100 - parseInt(precentage) + '%';
        obj.sDiv.querySelector('.dinamic-progress').style.height = 100 - parseInt(precentage) + '%';
        obj.sDiv.querySelector('.skill-precentage-div').innerHTML = precentage + '%';
        obj.sDiv.querySelector('.fixed-width').textContent = name;
    }
    else {

        let table = document.querySelector('.lang-table');
        let row = table.getElementsByTagName('tr')[obj.indeks];

        let cells = row.getElementsByTagName('td');
        cells[0].getElementsByTagName('label')[0].textContent = name.toUpperCase();
        cells[1].querySelector('.precentage-div').style.width = precentage + '%';
        cells[2].getElementsByTagName('label')[0].textContent = precentage + '%';
    }
}

function drawSkillDiv(mainSkillsDiv, skillName, skillPrecentage) {
    const skillDiv = document.createElement('div');
    skillDiv.style.fontSize = "12px";
    skillDiv.classList.add(`${globaltype}-div-pr`, 'p-2');

    const lbl = document.createElement('i');
    lbl.classList.add('skill-lbl');
    lbl.textContent = skillName;
    skillDiv.appendChild(lbl);

    const lbl1 = document.createElement('i');
    lbl1.textContent = skillPrecentage;
    lbl1.classList.add('skill-pr-lbl');
    lbl1.style.display = 'none';
    skillDiv.appendChild(lbl1);
    skillDiv.onclick = function () {
        openSkillPopup(null, this);
    };
    mainSkillsDiv.appendChild(skillDiv);

    if (globaltype == 'language') {
        createLangView(skillDiv, skillName, skillPrecentage);
    }
    else if (globaltype == 'skill') {
        createSkillView(skillDiv, skillName, skillPrecentage);
    }
}

function removeChilds() {
    const table = document.querySelector('.lang-table');
    while (table.firstChild) {
        table.removeChild(table.firstChild);
    }
}

function createLangView(div, name, precetange) {
    if (savedDiv == false) {
        removeChilds();
        savedDiv = true;
    }
    const table = document.querySelector('.lang-table');
    const tr = document.createElement('tr');
    table.appendChild(tr);

    let arr = [
        { type: 'label', value: name, childs: 0 },
        { type: 'div', value: precetange, childs: 1 },
        { type: 'label', value: precetange + '%', childs: 0 },
    ]

    arr.forEach(element => {
        let td = document.createElement('td');
        let forCreateEl = document.createElement(`${element.type}`);
        if (element.childs === 0)
            forCreateEl.textContent = element.value.toUpperCase();
        else {
            forCreateEl.classList.add('progres-div');
            const precentageDiv = document.createElement('div');
            precentageDiv.classList.add('precentage-div');
            precentageDiv.style.width = precetange + '%';
            forCreateEl.appendChild(precentageDiv)
        }
        td.appendChild(forCreateEl);
        tr.appendChild(td);
    });

    connectedDivs.push({ div: div, indeks: table.rows.length - 1 });
}

function createSkillView(div, name, precentage) {
    const skillsDiv = document.querySelector('#skill-cont');
    if (savedDiv == false) {
        while (skillsDiv.firstChild) {
            skillsDiv.removeChild(skillsDiv.firstChild);
        }
        savedDiv = true;
    }

    const cardDiv = document.createElement('div');
    cardDiv.classList.add('card-skill');
    const progresssDiv = document.createElement('div');
    progresssDiv.classList.add('progresss-bar');
    const dinamicDiv = document.createElement('div');
    dinamicDiv.classList.add('dinamic-progress');
    const skillPrec = document.createElement('div');
    skillPrec.classList.add('skill-precentage-div');
    const lbl = document.createElement('label');
    lbl.classList.add('fixed-width', 'white-text');

    dinamicDiv.style.width = 100 - parseInt(precentage) + '%';
    dinamicDiv.style.height = 100 - parseInt(precentage) + '%';
    lbl.textContent = name;
    skillPrec.innerHTML = precentage + '%';

    progresssDiv.appendChild(dinamicDiv);
    progresssDiv.appendChild(skillPrec);
    cardDiv.appendChild(progresssDiv);
    cardDiv.appendChild(lbl);
    skillsDiv.appendChild(cardDiv);

    connectedDivs.push({ div: div, sDiv: cardDiv });
}

function deleteDiv(div) {
    let obj = connectedDivs.find(el => el.div == div);
    div.remove();
    if ('indeks' in obj) {
        if (obj.indeks != -1) {
            connectedDivs.splice(obj.indeks, 1);
            for (let i = obj.indeks; i < connectedDivs.length; i++) {
                connectedDivs[i].indeks--;
            }
        }

        let table = document.querySelector('.lang-table');
        let row = table.getElementsByTagName('tr')[obj.indeks];
        table.removeChild(row);
    }
    else {
        obj.sDiv.remove();
    }
    popupSkill.style.display = 'none';
}


// education / experience

let popupEduExp = document.querySelector('#popup-experience');
let closeBtnExp = popupEduExp.querySelector("#closeBtnExp");
let saveBtnExp = popupEduExp.querySelector("#saveBtnExp");
let errorLblExp = popupEduExp.querySelector('.error-lbl');
let deleteEBtn = popupEduExp.querySelector('.delete-btn');

const certificateLabel = document.querySelector('#type-lbl[for="sertificate"]');
const certificateInput = document.querySelector('#sertificate');
const yearLabel = document.querySelector('#type-lbl[for="year"]');
const yearInput = document.querySelector('#year');
const institutionLabel = document.querySelector('#type-lbl[for="institution"]');
const institutionInput = document.querySelector('#institution');
const aboutLabel = document.querySelector('#type-lbl[for="about-sc"]');
const aboutTextarea = document.querySelector('#about-sc');

let globalEType, savedEDiv = null, savedSdiv = null, clickedEDiv, connectedEDivs = [];
openExpPopup = function (type, div) {
    globalEType = type;
    clickedEDiv = div;
    errorLblExp.style.display = 'none';

    certificateInput.value = '';
    yearInput.value = '';
    institutionInput.value = '';
    aboutTextarea.value = '';
    if (type == null) {
        deleteEBtn.onclick = function () {
            deleteEDiv(div);
        }
    }
    if (type == 'education') {
        certificateInput.placeholder = 'Naziv diplome/sertifikata';
        yearInput.placeholder = 'Godina sticanja diplome';
        institutionInput.placeholder = 'Naziv visokosolske ustanove';
        aboutTextarea.placeholder = 'Kratak opis...';

        if (certificateLabel) {
            certificateLabel.textContent = 'Naziv diplome/sertifikata';
        }
        if (yearLabel) {
            yearLabel.textContent = 'Godina sticanja diplome';
        }
        if (institutionLabel) {
            institutionLabel.textContent = 'Institucija';
        }
        if (aboutLabel) {
            aboutLabel.textContent = 'Kratak opis';
        }
    }
    else if (type == 'experience') {
        certificateInput.placeholder = 'Naziv radnog mesta';
        yearInput.placeholder = 'Godina zavrsetka poslovanja u datoj firmi';
        institutionInput.placeholder = 'Naziv firme';
        aboutTextarea.placeholder = 'Kratak opis...';

        // Dodavanje tekstova za labele preko JavaScript-a
        if (certificateLabel) {
            certificateLabel.textContent = 'Naziv radnog mesta';
        }
        if (yearLabel) {
            yearLabel.textContent = 'Godina zavrsetka poslovanja';
        }
        if (institutionLabel) {
            institutionLabel.textContent = 'Firma';
        }
        if (aboutLabel) {
            aboutLabel.textContent = 'Kratak opis';
        }
    } else if (type == null) {
        certificateInput.value = div.querySelector('.firstVal').textContent;
        yearInput.value = div.querySelector('.yearVal').textContent;
        institutionInput.value = div.querySelector('.thirdVal').textContent;
        aboutTextarea.value = div.querySelector('.descrp').textContent;
    }
    popupEduExp.style.display = "block";
}

closeBtnExp.onclick = function () {
    popupEduExp.style.display = "none";
}

saveBtnExp.onclick = function () {
    let firstVal = certificateInput.value;
    let yearVal = yearInput.value;
    let thirdVal = institutionInput.value;
    let descrp = aboutTextarea.value;
    const mainExpDiv = globalEType == 'education' ? document.querySelector('.certificates') : document.querySelector('.experience');

    let vals = [
        { value: firstVal, class: 'firstVal' },
        { value: yearVal, class: 'yearVal' },
        { value: thirdVal, class: 'thirdVal' },
        { value: descrp, class: 'descrp' }
    ];

    if (!firstVal || !yearVal || !thirdVal || !descrp) {
        errorLblExp.textContent = "Morate uneti navedene podatke";
        errorLblExp.style.display = 'block';
        return;
    }

    if (globalEType != null)
        drawEDiv(mainExpDiv, vals);
    else
        updateEDiv(clickedEDiv);
    popupEduExp.style.display = "none";
}


function drawEDiv(mainExpDiv, vals) {
    const eDiv = document.createElement('div');
    eDiv.classList.add(`${globalEType}-divs`);
    eDiv.style.fontSize = '12px';
    mainExpDiv.appendChild(eDiv);

    vals.forEach(p => {
        let lbl = document.createElement('i');
        lbl.textContent = p.value;
        lbl.classList.add(`${p.class}`);
        lbl.style.display = p.class == 'yearVal' ? 'block' : 'none';
        eDiv.appendChild(lbl);
    });

    eDiv.onclick = function () {
        openExpPopup(null, this);
    }

    createEView(mainExpDiv.className, eDiv);
}

function updateEDiv(div) {
    let obj = connectedEDivs.find(el => el.div == div);

    div.querySelector('.firstVal').textContent = certificateInput.value;
    div.querySelector('.yearVal').textContent = yearInput.value;
    div.querySelector('.thirdVal').textContent = institutionInput.value;
    div.querySelector('.descrp').textContent = aboutTextarea.value;

    obj.groupDiv.getElementsByTagName('p')[0].innerHTML = certificateInput.value + ` (${yearInput.value})`;
    obj.groupDiv.getElementsByTagName('p')[1].innerHTML = institutionInput.value;
    obj.groupDiv.getElementsByTagName('div')[0].innerHTML = aboutTextarea.value;
}

function createEView(nameOFClass, eDiv) {
    const mainEDiv = document.querySelector(`.${nameOFClass}-subdiv`);

    const mainGroupDiv = document.createElement('div');
    mainGroupDiv.classList.add(`${nameOFClass}-group`);

    if (nameOFClass == 'experience' && savedEDiv == null) {
        savedEDiv = true;
        while (mainEDiv.firstChild)
            mainEDiv.removeChild(mainEDiv.firstChild);
    }
    if (nameOFClass == 'certificates' && savedSdiv == null) {
        savedSdiv = true;
        while (mainEDiv.firstChild)
            mainEDiv.removeChild(mainEDiv.firstChild);
    }

    mainEDiv.appendChild(mainGroupDiv);

    const diploma = document.createElement('p');
    diploma.classList.add('m-0', 'font-weight-bold');
    diploma.style.fontSize = '9px';
    diploma.innerHTML = certificateInput.value + ` (${yearInput.value})`;

    const skola = document.createElement('p');
    skola.classList.add('m-0', 'mb-1', 'font-weight-bold');
    skola.style.fontSize = '8px';
    skola.innerHTML = institutionInput.value;

    const opis = document.createElement('div');
    opis.classList.add('text-div');
    opis.style.fontSize = '7px';
    opis.innerHTML = aboutTextarea.value;

    mainGroupDiv.appendChild(diploma);
    mainGroupDiv.appendChild(skola);
    mainGroupDiv.appendChild(opis);

    connectedEDivs.push({ div: eDiv, groupDiv: mainGroupDiv });
}

window.onclick = function (event) {
    if (event.target == popupEduExp) {
        popupEduExp.style.display = "none";
    }
}

function deleteEDiv(div) {
    let obj = connectedEDivs.find(el => el.div == div);
    let indeks = connectedEDivs.indexOf(obj);
    connectedEDivs.slice(indeks, 1);
    div.remove();
    obj.groupDiv.remove();
    popupEduExp.style.display = "none";
}

const connect = [
    { input_id: 'name', lbl_id: 'name-lbl' },
    { input_id: 'profession', lbl_id: 'profesion-lbl' },
    { input_id: 'age', lbl_id: 'age-lbl' },
    { input_id: 'phone', lbl_id: 'phone-lbl' },
    { input_id: 'email', lbl_id: 'email-lbl' },
    { input_id: 'website', lbl_id: 'website-lbl' },
    { input_id: 'address', lbl_id: 'adress-lbl' },
    { input_id: 'about', lbl_id: 'about-lbl' }
]

function change(event) {
    const inputId = event.target.id;
    // console.log("ID input polja:", inputId)
    const inputEl = document.querySelector(`#${inputId}`);

    const conObj = connect.find(item => item.input_id === inputId)
    // console.log(conObj)
    const lblEl = document.querySelector(`#${conObj.lbl_id}`);
    let timer;

    inputEl.addEventListener('input', () => {
        clearTimeout(timer);
        timer = setTimeout(() => doneTyping(inputEl, lblEl), 500);
    });
}

function doneTyping(input, label) {
    label.textContent = input.value;
}

document.querySelector('#image').addEventListener('change', function (event) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.querySelector('.profile-img');
            img.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
});
