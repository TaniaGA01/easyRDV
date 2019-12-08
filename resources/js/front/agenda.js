var intervalles = document.querySelectorAll('.data-rdv');

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
    // 1, 2, et 3 : Ajout, modif et suppression page "mon-agenda" // 4, 5 et 6 : pareil, mais page pro
    let form = document.createElement('form');
    let labelText = document.createElement('label');
    let inputText = document.createElement('textarea');
    let inputId = document.createElement('input');
    let inputPro = document.createElement('input');
    let inputToken = document.createElement('input');
    let btnSubmit = document.createElement('input');
    let ptiteCroix = document.createElement('div');
    labelText.setAttribute('for', 'content');
    form.setAttribute("method", "POST");
    setAttributes(inputText, {"type": "text", "name":"content", "placeholder":"// Détails.."});
    setAttributes(inputId, {"type": "hidden", "name":"data_tartempion"});
    setAttributes(inputPro, {"type": "hidden", "name":"id_pro"});
    setAttributes(inputToken, {"type": "hidden", "name":"_token", "value":""+token+""});
    setAttributes(btnSubmit, {"type": "submit", "value":"Valider mon RDV"});
    labelText.innerText=message;
    inputId.value=id;
    inputPro.value=pro;
    ptiteCroix.innerText='X';
    form.appendChild(labelText);
    if ((status === 1)||(status === 2)) {
        form.appendChild(inputText);
    }
    form.appendChild(inputId);
    form.appendChild(inputPro);
    if (status === 2){
        btnSubmit.setAttribute("value", "Modifier mon RDV");
        form.setAttribute("action", '/mon-agenda/'+pro+'/agenda/update');
        inputText.value = content;
    }
    if (status === 3){
        btnSubmit.setAttribute("value", "Supprimer mon RDV");
        form.setAttribute("action", '/mon-agenda/'+pro+'/agenda/delete');
    }
    if ((status === 2)||(status === 3)) {
        let inputIdRdv = document.createElement('input');
        setAttributes(inputIdRdv, {"type": "hidden", "name":"id_rdv"});
        inputIdRdv.value=idRdv;
        form.appendChild(inputIdRdv);
    }
    if ((status === 4)) {
        let inputIdUser = document.createElement('input');
        setAttributes(inputIdUser, {"type": "hidden", "name":"id_client"});
        inputIdUser.value=content;
        form.appendChild(inputIdUser);
    }
    form.appendChild(inputToken);
    form.appendChild(btnSubmit);
    form.appendChild(ptiteCroix);
    document.body.appendChild(form);
    /*---STYLE---*/
    ptiteCroix.style.position='absolute';
    ptiteCroix.style.right='10px';
    ptiteCroix.style.top='10px';
    ptiteCroix.style.cursor='pointer';
    ptiteCroix.style.fontWeight='bold';
    labelText.style.textAlign='center';
    form.style.width = '500px';
    form.style.minHeight = '100px';
    form.style.position = 'absolute';
    form.style.top = '35vh';
    form.style.left = '30vw';
    form.style.backgroundColor = '#ddd';
    form.style.borderRadius = '5px';
    form.style.display = 'flex';
    form.style.justifyContent = 'center';
    form.style.alignItems = 'center';
    form.style.flexDirection = 'column';
    form.style.padding = '10px';
    ptiteCroix.addEventListener('click', function (e) {
        form.remove();
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
            heure.addEventListener('click', function (e){
                formType=4;
                let nomPro = heure.getAttribute('data-name-pro');
                let dataUser = heure.getAttribute('data-user');
                let renseignements =textAction+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h, avec '+nomPro+' ?';
                getForm(tartId,tartPro,renseignements,tartToken,formType,dataUser);
            });
        }else{
            // Page Mon Agenda du professionnel
            if (heure.classList.contains("rdv-loaded")) {
                let btnModif = heure.nextSibling;
                let tartContent = heure.innerText;
                let rdvId = btnModif.getAttribute('data-id');
                btnModif.addEventListener('click', function(evt){
                    formType=2;
                    textAction = 'Modifier le rendez-vous du ';
                    let renseignements =textAction+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h ?';
                    getForm(tartId,tartPro,renseignements,tartToken,formType,tartContent,rdvId);
                });
                let btnSuppr = btnModif.nextSibling;
                btnSuppr.addEventListener('click', function(evt){
                    formType=3;
                    textAction = 'Supprimer le rendez-vous du ';
                    let renseignements =textAction+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h ?';
                    getForm(tartId,tartPro,renseignements,tartToken,formType,tartContent,rdvId);
                });
            }
            heure.addEventListener('click', function (e){
                let renseignements =textAction+tartDay+' '+nomsMois[tartMonth]+' '+tartYear+' à '+tartHeure+' h ?';
                getForm(tartId,tartPro,renseignements,tartToken,formType);
            });
        }
    }
}
