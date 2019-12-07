var intervalles = document.querySelectorAll('.data-rdv');
// var gridMobile = document.getElementById('gridMobile');
// var btnSuppr = document.querySelectorAll('.btn-agenda.agenda-suppr');

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
    let form = document.createElement('form');
    let labelText = document.createElement('label');
    let inputText = document.createElement('textarea');
    let inputId = document.createElement('input');
    let inputPro = document.createElement('input');
    let inputToken = document.createElement('input');
    let btnSubmit = document.createElement('input');
    let ptiteCroix = document.createElement('div');
    labelText.setAttribute('for', 'entree');
    form.setAttribute("method", "POST");
    // form.setAttribute("action", '/mon-agenda/'+pro+'/agenda');
    setAttributes(inputText, {"type": "text", "name":"content", "placeholder":"// Détails.."});
    setAttributes(inputId, {"type": "hidden", "name":"data_tartempion"});
    setAttributes(inputPro, {"type": "hidden", "name":"id_pro"});
    setAttributes(inputToken, {"type": "hidden", "name":"_token", "value":""+token+""});
    setAttributes(btnSubmit, {"type": "submit", "value":"Valider mon RDV"});
    labelText.innerText=message;
    inputId.value=id;
    inputPro.value=pro;
    ptiteCroix.innerText=status;
    // ptiteCroix.innerText='X';
    form.appendChild(labelText);
    form.appendChild(inputText);
    form.appendChild(inputId);
    form.appendChild(inputPro);
    form.appendChild(inputToken);
    if (status === 2) {
        form.setAttribute("action", '/mon-agenda/'+pro+'/agenda/update');
        inputText.value = content;
        let inputIdRdv = document.createElement('input');
        setAttributes(inputIdRdv, {"type": "hidden", "name":"id_rdv"});
        inputIdRdv.value=idRdv;
        form.appendChild(inputIdRdv);
    }
    form.appendChild(btnSubmit);
    form.appendChild(ptiteCroix);
    document.body.appendChild(form);
    /*---STYLE---*/
    ptiteCroix.style.position='absolute';
    ptiteCroix.style.right='10px';
    ptiteCroix.style.top='10px';
    ptiteCroix.style.cursor='pointer';
    ptiteCroix.style.fontWeight='bold';
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
        // let tartUsr = heure.getAttribute('data-usr');
        let tartPro = heure.getAttribute('data-pro');
        let tartToken = heure.getAttribute('data-token');
        let tartYear = tartId.slice(0, 4);
        let tartMonth = tartId.slice(5, 7);
        let tartDay = tartId.slice(8, 10);
        let tartHeure = tartId.slice(11);
        let formType = 1;
        let textAction = 'Ajouter un rendez-vous le ';
        if (heure.classList.contains("rdv-loaded")) {
            formType=2;
            let btn = heure.nextSibling;
            let tartContent = heure.innerText;
            let rdvId = btn.getAttribute('data-id');
            textAction = 'Modifier le rendez-vous du ';
            btn.addEventListener('click', function(evt){
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
