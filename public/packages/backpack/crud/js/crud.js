/*
*
* Backpack Crud
*
*/

jQuery(function($){

    'use strict';
});

(() => {
    const manufacturer = document.querySelector('.manufacturer');

    if (manufacturer) {
        fetchModelsByManufacturer();
        manufacturer.addEventListener('change', fetchModelsByManufacturer);

        function fetchModelsByManufacturer() {
            fetch('/models/' + manufacturer.value)
                .then(response => response.json())
                .then(json => {
                    const modelsSelect = document.querySelector('.models');

                    modelsSelect.innerHTML = "";
                    for (var element in json) {
                        const option = document.createElement('option');
                        option.value = json[element].id;
                        option.innerText = json[element].name;

                        modelsSelect.appendChild(option);
                    };
                });
        };
    }
})();