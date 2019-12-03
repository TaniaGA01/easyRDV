function autocomplete(inp, arr) {
    /*la fonction autocomplete prend deux arguments,
     l'élément de champ de texte et un tableau de valeurs autocompleted possibles:*/

    let currentFocus;
    /*exécuter une fonction quand quelqu'un écrit dans le champ de texte:*/
    inp.addEventListener("input", function (e)  {
        let a, b, i, val = this.value;

        /*ferme toutes les listes de valeurs complétées automatiquement déjà ouvertes*/
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;

        /*créer un élément DIV qui contiendra les éléments (valeurs):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");

        /*ajouter l'élément DIV en tant qu'enfant du conteneur autocomplete:*/
        this.parentNode.appendChild(a);

        /*boucle pour chaque élément du tableau...*/
        for (i = 0; i < arr.length; i++) {
            /*vérifie si l'élément commence par les mêmes lettres que la valeur du champ de texte*/

            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*créer un élément DIV pour chaque élément correspondant:*/
                b = document.createElement("DIV");

                /*mettre en gras les lettres correspondantes:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insérer un champ d'entrée qui contiendra la valeur de l'élément de tableau actuel:*/

                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*exécuter une fonction lorsque quelqu'un clique sur la valeur de l'élément (élément DIV):*/

                b.addEventListener("click", function (e)  {
                    /*insérer la valeur du champ de texte autocomplete:*/

                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*fermer la liste des valeurs complétées automatiquement,
                    (ou toute autre liste ouverte de valeurs autocompleted:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute une function keydown:*/
    inp.addEventListener("keydown", function (e) {
        let x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");

        if (e.keyCode == 40) {
            /*Si la touche flèche bas est enfoncée
            */
            currentFocus++;
            /*rends l'élément actuel plus visible:*/

            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*Si la touche flèche haut est enfoncée*/
            currentFocus--;

            /*et rendre l'élément actuel plus visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*Sil'utilisateur appui sur la touche Entrée, empêche le formulaire d'être soumis.*/
            e.preventDefault();
            if (currentFocus > -1) {

                /*et simule un clic sur l'élément "actif":*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*une fonction pour classer un élément comme "actif":*/

        if (!x) return false;
        /*commence par supprimer la classe "active" sur tous les éléments:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;

        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*ajoute une classe autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*une fonction pour supprimer la classe "active" de tous les éléments à complétion automatique:*/
        for (let i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*fermez toutes les listes de saisie semi-automatique du document,
        sauf celui passé en argument:*/
        let x = document.getElementsByClassName("autocomplete-items");
        for (let i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    /*exécuter une fonction quand quelqu'un clique dans le document:*/
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

/*Un tableau contenant tous les noms des professionnels:*/
let professional = ["Neurologue", "Neuro-compresseur", "Psychologue", "Comptable", "Baveux", "Psychopathe", "Ramasseur de champignons", "Flyfu**er", "Moine à temps partiel", "Socialiste dépressif", "Chasseur de Troll", "Avocat", "Barbier", "Stagiaire spécialisé Maison du Café", "Web designer", "Péripapétitien*ne", "Développeur Web", "Laveur de cerveau", "Chasseur de primes"];

/*lance la fonction autocomplete sur l'élément "myInput", et transmettre le tableau des professionnels sous forme de valeurs autocomplete:*/
autocomplete(document.getElementById("myInput"), professional);
