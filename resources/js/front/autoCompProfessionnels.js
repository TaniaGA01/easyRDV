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
console.log(tabProfessionnels);

var formProfessionnels = document.getElementById('professionnels');
var suggProfessionnels = document.getElementById('suggestions-pros');

if (formProfessionnels) {
    formProfessionnels.addEventListener('keyup', function(e){
        if (formProfessionnels.value.length>1 && e.keyCode != '40' && e.keyCode != '38') {
            let entree = e.target.value.toLowerCase();
            suggProfessionnels.innerHTML='';
            for (let pros in tabProfessionnels) {
                if (pros.toLowerCase().match(entree)) {
                    let suggestionPros = document.createElement('option');
                    suggestionPros.setAttribute('value', pros);
                    suggProfessionnels.appendChild(suggestionPros);
                    suggestionPros.addEventListener('click', function(evt){
                        formProfessionnels.value=pros;
                        suggProfessionnels.innerHTML='';
                        document.getElementById('hidden-form-accueil').value = tabProfessionnels[pros];
                    });
                }
            }
            // for (let pros of tabProfessionnels) {
            //     if (pros.toLowerCase().match(entree)) {
            //         let suggestionPros = document.createElement('option');
            //         suggestionPros.setAttribute('value', pros);
            //         // suggestionPros.classList.add('suggestion');
            //         suggProfessionnels.appendChild(suggestionPros);
            //         suggestionPros.addEventListener('click', function(evt){
            //             formProfessionnels.value=pros;
            //             suggProfessionnels.innerHTML='';
            //         });
            //     }
            // }
        }
    });
}

// var testarr = {};
// var nianame = "name";
// var niaval = 2;
// testarr[nianame] = niaval;
// testarr["lifsbg"] = 52;
// testarr["erfsb"] = 522;
// testarr["lifhbqsbg"] = 2;
// console.log(testarr)
// for (const property in testarr) {
//     console.log(property,' et puis ',testarr[property]);
// }
