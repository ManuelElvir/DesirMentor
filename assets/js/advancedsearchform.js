const btnSeeAll = document.getElementById('btn-see-all')
const select1 = document.getElementById('select1')
const select2 = document.getElementById('select2')
const select3 = document.getElementById('select3')
const select4 = document.getElementById('select4')

let selects = [select1, select2, select3, select4]

selects.forEach(select => {
    select.addEventListener('change', function () {
        let params = ''
        selects.forEach(select => {
            params += select.getAttribute('name')+'='+select.value+'&'
        });
        $.post(
            '/wp-json/hello-elementor/v1/products/advance_search',
            params,
            function(data, status, jqXHR) {
                data = JSON.parse(data)
                document.getElementsByClassName('counter').item(0).innerHTML = data.count
        })
        .fail(function() {
            alert( "Error" );
        })
    })
});

const btnReset = document.getElementById('btn-reset')
btnReset.addEventListener('click', function () {
    document.getElementById('advanced-search-form').reset(); 
})
btnSeeAll.addEventListener('click', function () {
    let params = ''
    selects.forEach(select => {
        params += select.getAttribute('name')+'='+select.value+'&'
    });
    location.replace(document.location.origin+'/boutique?'+params);
})