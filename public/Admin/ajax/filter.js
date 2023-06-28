all_date = document.querySelector('.all_data');
select = document.querySelector('#filter_select')
tbody = document.querySelector('.tbody');
date_filter = document.querySelector('.date_filter');

select.addEventListener('change', function () {
    xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/admin/dashboard/filter?name=' + select.value);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // p_holder.textContent = xhr.responseText;
            data = JSON.parse(xhr.responseText);
            elements = `<label>All ${select.value}s</label>
            <select class="form-control" id="data_selected">
                <option selected>-- Select ${select.value} --</option>`;
            data.data.forEach(user => {
                elements += `<option value="${user.id}">${user.user.name}</option>`
            });

            elements += `</select>`
            all_date.innerHTML = elements

        } else {
            all_date.textContent = ''
        }
    };
    xhr.send();
    data_selected = document.querySelector('#data_selected')
})


all_date.addEventListener('change', function () {

    xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/admin/dashboard/filter?name=' + select.value + '&id=' + all_date.lastElementChild.value);
    xhr.onload = function () {
        if (xhr.status === 200) {
            data = JSON.parse(xhr.responseText);
            examinations = data.data[0].examinations
            if (examinations.length > 2) {
                date_filter.innerHTML = `<div class="form-group">
                <label for="startDate">Start Date:</label>
                <input class="form-control" type="date" id="startDate" name="startDate">
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input  class="form-control" type="date" id="endDate" name="endDate">
            </div>`
            }
            elements = ``;
            i = 0
            examinations.forEach(examination => {
                elements += `<tr>
                    <td class="text-center">${++i}</td>
                    <td class="text-center">${examination.title}</td>
                    <td class="text-center">${examination.status}</td>
                    <td class="text-center">
                        <a href="http://127.0.0.1:8000/admin/dashboard/examinations/${examination.id}"
                            class="btn btn-success">More Details</a>
                    </td>
                </tr>
              `
            });
            tbody.innerHTML = elements


        }
    };
    xhr.send();

})


