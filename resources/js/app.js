/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

document.addEventListener('DOMContentLoaded', function () {

    // new ListePros(function (listePros) {
    //     return listePros;
    // });
    console.log('js chargé');

    var tabPros = [];
    function appelAjax () {
        fetch('/tempo/json')
            .then(response => response.json())
            .then(tabs => {
                if (tabs.length){
                    for (let tab of tabs){
                        for (let value of tab) {
                            if (value.name) {
                                tabPros.push(value.name);
                            }else if (value.last_name) {
                                let nomComplet = value.first_name+' '+value.last_name;
                                tabPros.push(nomComplet);
                            }
                        }
                    }
                }
                return tabPros;
            })
            // .then(pros => {
            //     if (pros.length){
            //         for (let pro of pros)
            //         tabPros.push(pro.name);
            //     }
            //     return tabPros;
            // })
    }
    appelAjax();

    // console.log(tabPros);

    var formPros = document.getElementById('pros');
    var suggPros = document.getElementById('suggestions');
    var formSearch = document.querySelector('.form-container');
    var urlWindow = window.location.href;

    // console.log(urlSearch);
    // replace(regex, 'ferret');

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
                    let urlSearch = urlWindow+'/'+pros;
                    // formSearch.action.replace('@', pros );
                    formSearch.setAttribute('action', urlSearch);
                    formPros.value=pros;
                    suggPros.innerHTML='';
                });
            }
        }
    });

});
