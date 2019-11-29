export class ListePros {

    constructor (callBack) {
        fetch('/tempo/json')
            .then(response => response.json())
            .then(pros => {
                this.constructTab(pros, callBack);
            })
    }

    constructTab(pros, callBack){
        var tabPros = [];
        if (pros.length){
            for (let pro of pros)
            tabPros.push(pro.name);
        }
        callBack(tabPros);
    }
}
