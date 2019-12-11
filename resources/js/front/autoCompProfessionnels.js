var tabProfessionnels = {};
function appelAjax () {
    fetch('/json-pros')
        .then(response => response.json())
        .then(tab => {
            if (tab.length){
                for (let value of tab) {
                    let nomPrenom='';
                    if (value.first_name) {
                        nomPrenom+=value.first_name;
                    }
                    if (value.last_name) {
                        nomPrenom+=' '+value.last_name.replace(/-/g, ' ');
                    }
                    let idPro = value.id;
                    tabProfessionnels[nomPrenom]=idPro;
                }
            }
            return tabProfessionnels;
        })
}
appelAjax();

var formProfessionnels = document.getElementById('professionnels');
var suggProfessionnels = document.getElementById('suggestions-pros');
var formHidden = document.getElementById('hidden-form-accueil');

if (formProfessionnels) {
    formProfessionnels.addEventListener('input', function(e){
        if (formProfessionnels.value.length>1 && e.keyCode != '40' && e.keyCode != '38') {
            let entree = e.target.value.toLowerCase();
            suggProfessionnels.innerHTML='';
            for (let pros in tabProfessionnels) {
                if (pros.toLowerCase().match(entree)) {
                    let suggestionPros = document.createElement('option');
                    suggestionPros.setAttribute('value', pros);
                    suggProfessionnels.appendChild(suggestionPros);
                    if (formProfessionnels.value==pros) {
                        formHidden.value = tabProfessionnels[pros];
                    }
                }
            }
        }
    });
}
