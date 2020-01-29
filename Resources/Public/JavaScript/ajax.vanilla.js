document.addEventListener('DOMContentLoaded', function () {
    let form = document.getElementById('ajaxselectlist-form'),
        selectForm = document.getElementById('ajaxselectlist-select'),
        resultContainer = document.getElementById('ajaxCallResult');

    let ajaxCall = new XMLHttpRequest();
    ajaxCall.onreadystatechange = function () {
        if (ajaxCall.readyState === 4) {
            if (ajaxCall.status === 200) {
                resultContainer.innerHTML = ajaxCall.responseText;
            } else {
                resultContainer.innerHTML = ajaxCall.statusText;
            }
        }
    };

    let getData = function () {
        let queryString = new URLSearchParams(new FormData(form)).toString();
        queryString = '?' + queryString;
        return queryString;
    };

    selectForm.addEventListener("change", function () {
        data = getData();
        ajaxCall.open('GET', data);
        ajaxCall.send();
    });

    let event = new Event('change');
    selectForm.dispatchEvent(event);
});
