// import {ListePros} from './front/ListePros';

require('./bootstrap');

document.addEventListener('DOMContentLoaded', function () {

    // new ListePros(function (listePros) {
    //     return listePros;
    // });
    console.log('js chargé');

    var tabPros = [];
    function appelAjax () {
        fetch('/tempo/json')
            .then(response => response.json())
            .then(pros => {
                if (pros.length){
                    for (let pro of pros)
                    tabPros.push(pro.name);
                }
                return tabPros;
            })
    }
    appelAjax();

    console.log(tabPros);

    var formPros = document.getElementById('pros');
    var suggPros = document.getElementById('suggestions');

    formPros.addEventListener('keyup', function(e){
        let entree = e.target.value.toLowerCase();
        suggPros.innerHTML='';

        for (let pros of tabPros) {
            if (pros.toLowerCase().match(entree)) {
                let suggestionPros = document.createElement('div');
                suggestionPros.innerText=pros;
                suggestionPros.classList.add('suggestion');
                suggPros.appendChild(suggestionPros);
                suggestionPros.addEventListener('click', function(evt){
                    formPros.value=pros;
                    suggPros.innerHTML='';
                });
            }
        }
    });

});
