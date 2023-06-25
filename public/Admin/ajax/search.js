page_name = document.querySelector('.page-name');
search_input = document.querySelector('.searching-input');
search_result = document.querySelector('.search_result');
currentUrl = window.location.href;
xhr = new XMLHttpRequest();
search_input.addEventListener('keyup', function () {
    if (search_input.value.length > 0) {

        xhr.open('GET', 'http://127.0.0.1:8000/admin/dashboard/search/' + page_name.textContent + '/' + search_input.value);
        xhr.onload = function () {
            if (xhr.status === 200) {
                data = JSON.parse(xhr.responseText);

                search_result.innerHTML = ''
                data.data.forEach(user => {
                    search_result.innerHTML += `<a href="${currentUrl}/${user[user.type.toLowerCase()].id}" class="list-group-item wid">
                    <div class="search-title"><strong class="text-light"></strong>${user.name}</div>
                </a>`
                });
            }
        };

        xhr.send();
    }else{
        search_result.innerHTML = ''

    }
})
