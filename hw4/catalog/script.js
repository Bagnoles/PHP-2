let button = document.getElementById('showmore-button');
let page = button.getAttribute('data-page');
let wrap = document.getElementById('wrap');
button.addEventListener('click', e => {
    page++;
    fetch("ajax.php?page=" + page, {
        method: "GET",
        headers:{"content-type":"application/x-www-form-urlencoded"}
    })
        .then( response => {
            if (response.status !== 200) {
                return Promise.reject();
            }
            return response.text()
        })
        .then(data =>
            wrap.insertAdjacentHTML('beforeend', data)
        )
        .catch(() => console.log('ошибка'));

    if (page == button.getAttribute('data-max')) {
        button.style.display = 'none';
    }

})
