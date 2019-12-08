var tabLocs = [];
function appelAjaxLoc () {
    fetch('/json-loc')
        .then(response => response.json())
        .then(tab => {
            if (tab.length){
                for (let value of tab) {
                    if (value.name_ville) {
                        tabLocs.push(value.name_ville.replace(/-/g, ' '));
                    }
                    // if (value.postal_code) {
                    //     tabLocs.push(value.postal_code.replace(/-/g, ' '));
                    // }
                }
            }
            return tabLocs;
        })
}
appelAjaxLoc();

var formLocs = document.getElementById('locs');
var suggLocs = document.getElementById('suggestions-locs');

if (formLocs){
    formLocs.addEventListener('keyup', function(e){
        if (formLocs.value.length>1 && e.keyCode != '40' && e.keyCode != '38'){
            let entree = e.target.value.toLowerCase();
            suggLocs.innerHTML='';
            for (let locs of tabLocs) {
                let regex = new RegExp('^'+entree+'(.)*');
                if (locs.toLowerCase().match(regex)) {
                    let suggestionLocs = document.createElement('option');
                    suggestionLocs.setAttribute('value', locs);
                    // suggestionLocs.classList.add('suggestion');
                    suggLocs.appendChild(suggestionLocs);
                    suggestionLocs.addEventListener('click', function(evt){
                        formLocs.value=locs;
                        suggLocs.innerHTML='';
                    });
                }
            }
        }
    });
}

