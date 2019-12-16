// On sélectionne tous les éléments contenant la classe "data-rdv" (stockés dans un tableau), qui représente chaque créneau de rdv
var intervalles = document.querySelectorAll('.data-rdv');
// On récupère l'élément "app", premier enfant de body. Ne servira que pour l'overlay.
const appBody = document.getElementById('app');

// Petit tableau permettant de récupérer le nom d'un mois en fonction de son numéro
const nomsMois = {
    '01': 'janvier',
    '02': 'février',
    '03': 'mars',
    '04': 'avril',
    '05': 'mai',
    '06': 'juin',
    '07': 'juillet',
    '08': 'août',
    '09': 'septembre',
    '10': 'octobre',
    '11': 'novembre',
    '12': 'décembre'
};

// Fonction qui permet de créer plusieurs attributs d'un seul coup
function setAttributes(el, attrs) {
    for(let key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
}


function getForm(id,pro,message,token,status,content,idRdv) {
    // status : paramètre récupéré avec la variable formType, permettant de connaître le type de formulaire nécessaire.
    // Création des élément pour la fenêtre modal bootstrap
    let modal = document.createElement('div');
    let modalDialog = document.createElement('div');
    let modalHeader = document.createElement('div');
    let modalBody = document.createElement('div');
    let modalFooter = document.createElement('div');
    let modalTitle = document.createElement('h5');
    let modalClose = document.createElement('button');
    let modalSpan =document.createElement('span');
    setAttributes(modal, {"class": "modal fenetre-modale", "tab-index":"-1", "role":"dialog"});
    setAttributes(modalDialog, {"class": "modal-dialog", "role":"document"});
    modalHeader.classList.add("modal-header");
    modalTitle.classList.add("modal-title");
    // On change l'en-tête de la modale en fonction de l'action désirée
    if ((status === 1)||(status === 4)) {
        modalTitle.textContent="Ajouter";
    }else if ((status === 3)||(status === 5)||(status === 7)) {
        modalTitle.textContent="Supprimer";
    }else if ((status === 6)||(status === 8)) {
        modalTitle.textContent="Modifier/Supprimer";
    }
    setAttributes(modalClose, {"class": "close", "type":"close", "data-dismiss":"modal","aria-label":"Close"});
    modalSpan.innerHTML='&times;';
    modalClose.appendChild(modalSpan);
    modalHeader.appendChild(modalTitle);
    modalHeader.appendChild(modalClose);
    modalBody.classList.add("modal-body");
    modalFooter.classList.add("modal-footer");
    // Création des élements du formulaire
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
    // À partir d'ici, on va faire en sorte de modifier le formulaire et son contenu en fonction des besoins
    if ((status === 1)||(status === 6)||(status === 8)) {
        modalBody.appendChild(inputText);
    }
    modalBody.appendChild(inputId);
    modalBody.appendChild(inputPro);
    if ((status === 6)||(status === 8)){
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
    if ((status === 3)||(status === 5)||(status === 6)||(status === 7)||(status === 8)) {
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
    // Tous les cas sont traités, on assemble les éléments de la bonne façon
    modalBody.appendChild(inputToken);
    modalFooter.appendChild(btnSubmit);
    form.appendChild(modalHeader);
    form.appendChild(modalBody);
    form.appendChild(modalFooter);
    modalDialog.appendChild(form);
    modal.appendChild(modalDialog);
    // Puis on ajoute le tout dans la page
    document.body.appendChild(modal);
    /*---STYLE---*/
    form.style.textAlign='center';
    modal.style.display="block";
    modal.style.marginTop="10%";
    form.style.zIndex="101";
    /** OVERLAY */
    // On créée l'overlay
    let over = document.createElement('div');
    over.style.width='100%';
    over.style.minHeight='100%';
    over.style.backgroundColor='rgba(255,255,255,0.5)';
    over.style.zIndex="100";
    over.style.position="absolute";
    document.body.insertBefore(over,appBody);
    // Gestion de la fermeture de la modale et de l'overlay
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


// On vérifie la présence des éléments ciblés, puis on parcourt le tableau
// Les différents cas de figure sont triés grâce à des conditions et aux classes présentes dans le HTML
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
