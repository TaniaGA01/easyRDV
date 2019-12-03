var tabPros = [];
function appelAjax () {
    fetch('/tempo/json')
        .then(response => response.json())
        .then(tab => {
            if (tab.length){
                for (let value of tab) {
                    if (value.name) {
                        tabPros.push(value.name.replace(/-/g, ' '));
                    }
                }
            }
            return tabPros;
        })
}
appelAjax();

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
