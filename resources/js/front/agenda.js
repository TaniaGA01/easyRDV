var intervalles = document.querySelectorAll('.data-rdv');
const appBody = document.getElementById('app');

const nomsMois = {
    '1': 'janvier',
    '2': 'février',
    '3': 'mars',
    '4': 'avril',
    '5': 'mai',
    '6': 'juin',
    '7': 'juillet',
    '8': 'août',
    '9': 'septembre',
    '10': 'octobre',
    '11': 'novembre',
    '12': 'décembre'
};

function setAttributes(el, attrs) {
    for(let key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
}


function getForm(id,pro,message,token,status,content,idRdv) {
    // status : paramètre récupéré avec la variable formType, permettant de connaître le type de formulaire nécessaire.
    // 1, 2, 3 et 8(double choix) : Ajout, modif et suppression page "mon-agenda" // 4 et 5 : Ajout et annulation page pro // 6 : Double choix // 7 : suppression espace client
    let modal = document.createElement('div');//div 1
    let modalDialog = document.createElement('div');//div 2
    let modalHeader = document.createElement('div');//div 3
    let modalBody = document.createElement('div');//div 4
    let modalFooter = document.createElement('div');//div 5
    let modalTitle = document.createElement('h5');
    let modalClose = document.createElement('button');
    let modalSpan =document.createElement('span');
    setAttributes(modal, {"class": "modal fenetre-modale", "tab-index":"-1", "role":"dialog"});
    setAttributes(modalDialog, {"class": "modal-dialog", "role":"document"});
    modalHeader.classList.add("modal-header");
    modalTitle.classList.add("modal-title");
    if ((status === 1)||(status === 4)) {
        modalTitle.textContent="Ajouter";
    }else if (status === 2) {
        modalTitle.textContent="Modifier";
    }else if ((status === 3)||(status === 5)||(status === 7)) {
        modalTitle.textContent="Supprimer";
    }else if ((status === 6)||(status === 8)) {
        modalTitle.textContent="Modifier/Supprimer";
    }
    setAttributes(modalClose, {"class": "close", "type":"close", "data-dismiss":"modal","aria-label":"Close"});
    // modalSpan.setAttribute('aria-hidden', 'true');
    modalSpan.innerHTML='&times;';
    modalClose.appendChild(modalSpan);
    modalHeader.appendChild(modalTitle);
    modalHeader.appendChild(modalClose);
    modalBody.classList.add("modal-body");
    modalFooter.classList.add("modal-footer");
    let form = document.createElement('form');
    let labelText = document.createElement('label');
    let inputText = document.createElement('textarea');
    let inputId = document.createElement('input');
    let inputPro = document.createElement('input');
    let inputToken = document.createElement('input');
    let btnSubmit = document.createElement('input');
    labelText.setAttribute('for', 'content');
    setAttributes(form, {"method": "POST", "class":"modal-content"});
    setAttributes(inputText, {"type": "text", "name":"content", "placeholder":"Détails..","class":"form-control"});
    setAttributes(inputId, {"type": "hidden", "name":"data_tartempion"});
    setAttributes(inputPro, {"type": "hidden", "name":"id_pro"});
    setAttributes(inputToken, {"type": "hidden", "name":"_token", "value":""+token+""});
    setAttributes(btnSubmit, {"type": "submit", "value":"Valider mon RDV", "class":"btn btn-primary btn-pr"});
    labelText.innerText=message;
    inputId.value=id;
    inputPro.value=pro;
    modalBody.appendChild(labelText);
    if ((status === 1)||(status === 2)||(status === 6)||(status === 8)) {
        modalBody.appendChild(inputText);
    }
    modalBody.appendChild(inputId);
    modalBody.appendChild(inputPro);
    if ((status === 2)||(status === 6)||(status === 8)){
        btnSubmit.setAttribute("value", "Modifier mon RDV");
        form.setAttribute("action", '/mon-agenda/'+pro+'/agenda/update');
        if (status === 6){
            form.setAttribute("action", '/mes-rendez-vous/'+pro+'/update');
        }
        inputText.value = content;
    }
    if ((status === 3)||(status === 5)||(status === 7)){
        btnSubmit.setAttribute("value", "Supprimer mon RDV");
        if ((status === 3)) {
            form.setAttribute("action", '/mon-agenda/'+pro+'/agenda/delete');
        }else if (status === 5) {
            form.setAttribute("action", content+'/delete');
        }else if (status === 7) {
            form.setAttribute("action", pro+'/deleteAppointment');
        }
    }
    if ((status === 2)||(status === 3)||(status === 5)||(status === 6)||(status === 7)||(status === 8)) {
        let inputIdRdv = document.createElement('input');
        setAttributes(inputIdRdv, {"type": "hidden", "name":"id_rdv"});
        inputIdRdv.value=idRdv;
        modalBody.appendChild(inputIdRdv);
    }
    if (status === 4) {
        let inputIdUser = document.createElement('input');
        setAttributes(inputIdUser, {"type": "hidden", "name":"id_client"});
        inputIdUser.value=content;
        modalBody.appendChild(inputIdUser);
    }
    if ((status === 6)||(status === 8)) {
        let btnSupprimer = document.createElement('input');
        setAttributes(btnSupprimer, {"type": "submit", "value":"Supprimer mon RDV", "class":"btn btn-primary btn-qt"});
        modalFooter.appendChild(btnSupprimer);
        btnSupprimer.addEventListener('click', function(e){
            if (status === 6) {
                form.setAttribute("action", '/mes-rendez-vous/'+pro+'/delete');
            }
            if (status === 8) {
                form.setAttribute("action", '/mon-agenda/'+pro+'/agenda/delete');
            }
        })
    }
    modalBody.appendChild(inputToken);
    modalFooter.appendChild(btnSubmit);
    form.appendChild(modalHeader);
    form.appendChild(modalBody);
    form.appendChild(modalFooter);
    modalDialog.appendChild(form);
    modal.appendChild(modalDialog);
    document.body.appendChild(modal);
    /*---STYLE---*/
    form.style.textAlign='center';
    modal.style.display="block";
    modal.style.marginTop="10%";
    form.style.zIndex="101";
    /** OVERLAY */
    let over = document.createElement('div');
    over.style.width='100%';
    over.style.minHeight='100%';
    over.style.backgroundColor='rgba(255,255,255,0.5)';
    over.style.zIndex="100";
    over.style.position="absolute";
    document.body.insertBefore(over,appBody);
    /** */
    modalClose.addEventListener('click', function (e) {
        e.preventDefault();
        modal.remove();
        over.remove();
    });
    over.addEventListener('click', function (e) {
        modal.remove();
        over.remove();
    });
}


if (intervalles){
    for (let heure of intervalles) {
        heure.style.cursor='pointer';
        let tartId = heure.getAttribute('data-tartempion');
        let tartPro = heure.getAttribute('data-pro');
        let tartToken = heure.getAttribute('data-token');
        let tartYear = tartId.slice(0, 4);
        let tartMonth = tartId.slice(5, 7);
        let tartDay = tartId.slice(8, 10);
        let tartHeure = tartId.slice(11);
        let formType = 1;
        let textAction = 'Ajouter un rendez-vous le ';
        if (heure.classList.contains("page-pro")) {
            // Page Pro, vue de l'utilisateur
            if (heure.classList.contains("rdv-loaded")) {
                heure.addEventListener('click',function(e){
                    formType=5;
                    let nameUser = heure.getAttribute('data-name-pro');
                    let varForm = window.location.pathname;
                    textAction = 'Annuler le rendez-vous avec ';
                    let renseignements =textAction+nameUser+' le '+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h ?';
                    // Exception : Annulation RDV, "Mes rdv" -> mon agenda
                    if (heure.classList.contains("rdv-annul")) {
                        nameUser = heure.getAttribute('data-name');
                        formType=3;
                        if (heure.classList.contains("page-client")) {
                            formType=7;
                            tartPro = heure.getAttribute('data-client');
                        }
                        renseignements =textAction+nameUser+' le '+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h ?';
                    }else if (heure.classList.contains("activ-annul")) {
                        nameUser ='';
                        let heurePrES = heure.previousElementSibling;
                        let heurePrES2 = heurePrES.previousElementSibling;
                        let heurePrES3 = heurePrES2.previousElementSibling;
                        varForm=heurePrES3.innerText;
                        formType=6;
                        renseignements = 'Modifier ou supprimer l\'activité du '+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h?';
                    }
                    let rdvId = heure.getAttribute('data-id');
                    getForm(tartId,tartPro,renseignements,tartToken,formType,varForm,rdvId);
                });
            } else if (!heure.classList.contains("rdv-indispo")) {
                heure.addEventListener('click', function (e){
                    formType=4;
                    let nomPro = heure.getAttribute('data-name-pro');
                    let dataUser = heure.getAttribute('data-user');
                    let renseignements =textAction+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h, avec '+nomPro+' ?';
                    getForm(tartId,tartPro,renseignements,tartToken,formType,dataUser);
                });
            }
        }else if (heure.classList.contains("rdv-loaded")) {
            // Page Mon Agenda du professionnel
            let tartContent = heure.innerText;
            let rdvId = heure.getAttribute('data-id');
            if (heure.classList.contains("rdv-pro")) {
                heure.addEventListener('click', function (e){
                    formType=3;
                    textAction = 'Annuler ';
                    let renseignements =textAction+tartContent+' le '+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h ?';
                    getForm(tartId,tartPro,renseignements,tartToken,formType,tartContent,rdvId);
                });
            }else{
                heure.addEventListener('click', function (e){
                    formType=8;
                    let renseignements = 'Modifier ou supprimer l\'activité du '+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h?';
                    getForm(tartId,tartPro,renseignements,tartToken,formType,tartContent,rdvId);
                });
            }
        }else{
            heure.addEventListener('click', function (e){
                let renseignements =textAction+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h ?';
                getForm(tartId,tartPro,renseignements,tartToken,formType);
            });
        }
    }
}
