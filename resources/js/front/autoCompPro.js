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
    if (formPros.value.length>2) {
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
});

// formPros.addEventListener("keypress", function (e) {
//     console.log("Vous avez appuyé sur la touche " + String.fromCharCode(e.charCode));
//     if (e.keyCode == '40') {
//         console.log('fleche bas');
//     }
// });
