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
    if (formPros.value.length>1) {
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
    }
    if (e.keyCode == '40' && suggPros.innerHTML!=='') {
        var listeSelected = document.querySelector('.suggestion.active');
        if (listeSelected) {
            console.log('IF');
            if (listeSelected.nextElementSibling) {
                listeSelected.classList.remove('active');
                listeSelected.nextElementSibling.classList.add('active');
                listeSelected.nextElementSibling.style.color = 'red';

            }
        } else {
            let suggestion = document.querySelector('.suggestion');
            suggestion.classList.add('active');
            suggestion.style.color = 'red';
            console.log('else !');
            console.log(listeSelected.nextElementSibling);
            // formPros.value = suggestion.innerText;
        }
    }
});
