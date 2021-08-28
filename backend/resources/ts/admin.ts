var csrf_token = (<HTMLMetaElement>document.getElementsByName('csrf_token')[0]).content;

var new_button:HTMLDivElement = <HTMLDivElement>document.getElementById('new_button');
var new_modal:HTMLDivElement = <HTMLDivElement>document.getElementById('new_modal');

new_button.addEventListener('click', function() {
    new_modal.classList.toggle('radius');
})

const new_event = document.getElementById('new_submit_btn');

function getRequestParameterByDataList(data_list:Map<string, string | number>)
{
    var request_parameter: string = '';

    data_list.forEach((value, key) => {
        request_parameter = request_parameter.concat(`${key}=${value}&`);
    });

    return request_parameter;
}

if (new_event) {
    new_event.addEventListener('click', () => {
        const httpRequest = new XMLHttpRequest();
        httpRequest.open('post', '/admin/contents/new', true);

        var article_title = (<HTMLFormElement>document.getElementById('article_title')).value;
        var article_description = (<HTMLFormElement>document.getElementById('article_description')).value;
        var release_date_time = (<HTMLFormElement>document.getElementById('release_date_time')).value;
        var category_id = (<HTMLFormElement>document.getElementById('category_id')).value;
        var img_path = (<HTMLFormElement>document.getElementById('img_path')).value;

        let data_list = new Map<string, string | number>([
            ['article_title', article_title],
            ['article_description', article_description],
            ['release_date_time', release_date_time],
            ['category_id', category_id],
            ['img_path', img_path]
        ]);

        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === 4) {
                if (httpRequest.status === 200) {
                    alert('登録が完了しました');
                    new_modal.style.visibility = 'hidden';
                    location.reload();
                }
                else {
                    alert('正常に登録ができませんでした。管理者にお問い合わせください。');
                    new_modal.style.visibility = 'hidden';
                }
            }
        }

        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);

        var request_parameter = getRequestParameterByDataList(data_list);
        httpRequest.send(request_parameter);
    })
}

export function createEditFormByContentsParam(contents_param: Map<string, string | number>)
{
    (<HTMLFormElement>document.getElementById('edit_content_id')).value = contents_param.get('content_id');
    (<HTMLFormElement>document.getElementById('edit_title')).value = contents_param.get('title');
    (<HTMLFormElement>document.getElementById('edit_description')).value = contents_param.get('description')

    let _target_date = new Date(contents_param.get('release_datetime')!);
    let year = _target_date.getFullYear();
    let month = ('0' + _target_date.getMonth()).slice(-2);
    let date = _target_date.getDate();
    let target_date = (year + '-' + month + '-' + date);
    (<HTMLFormElement>document.getElementById('edit_release_datetime')).value = target_date;

    let category_name = (<HTMLSelectElement>document.getElementById('edit_category_id')).querySelector(`option[value='${ contents_param.get('category_id') }']`)!;
    category_name.setAttribute('selected', 'selected');

    (<HTMLFormElement>document.getElementById('edit_img_path')).value = contents_param.get('img_path');
}


const edit_event = document.getElementById('edit_submit_btn');

if (edit_event) {
    edit_event.addEventListener('click', () => {
        const httpRequest = new XMLHttpRequest();
        httpRequest.open('post', '/admin/contents/edit', true);

        var content_id = (<HTMLFormElement>document.getElementById('edit_content_id')).value;
        var article_title = (<HTMLFormElement>document.getElementById('edit_title')).value;
        var article_description = (<HTMLFormElement>document.getElementById('edit_description')).value;
        var release_date_time = (<HTMLFormElement>document.getElementById('edit_release_datetime')).value;
        var category_id = (<HTMLFormElement>document.getElementById('edit_category_id')).value;
        var img_path = (<HTMLFormElement>document.getElementById('edit_img_path')).value;

        let data_list = new Map<string, string | number>([
            ['content_id', content_id],
            ['article_title', article_title],
            ['article_description', article_description],
            ['release_date_time', release_date_time],
            ['category_id', category_id],
            ['img_path', img_path]
        ]);

        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === 4) {
                if (httpRequest.status === 200) {
                    alert('登録が完了しました');
                    new_modal.style.visibility = 'hidden';
                    location.reload();
                }
                else {
                    alert('正常に登録ができませんでした。管理者にお問い合わせください。');
                    new_modal.style.visibility = 'hidden';
                }
            }
        }

        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);

        var request_parameter = getRequestParameterByDataList(data_list);
        httpRequest.send(request_parameter);
    });
}

var edit_btns = document.getElementsByClassName('edit_btn')!;
var edit_modal = document.getElementById('edit_modal')!;

for (let i = 0; i < edit_btns.length; i++) {
    edit_btns[i].addEventListener('click', function() {
        edit_modal.style.display = 'block';
console.log(i);
        let content_id = (document.getElementById(`js_content_id_${i}`)!).textContent;
        let title = (document.getElementById(`js_title_${i}`)!).textContent;
        let description = (document.getElementById(`js_description_${i}`)!).textContent;
        let release_datetime = (document.getElementById(`js_release_datetime_${i}`)!).textContent;
        let category_id =  (document.getElementById(`js_category_name_${i}`)!).dataset.category_id;
        let img_path = ((document.getElementById(`js_img_path_${i}`)!).firstElementChild!).getAttribute('src');

        let contents_param = new Map();
        contents_param.set('content_id', content_id);
        contents_param.set('title', title);
        contents_param.set('description', description);
        contents_param.set('release_datetime', release_datetime);
        contents_param.set('category_id', category_id);
        contents_param.set('img_path', img_path);
        createEditFormByContentsParam(contents_param);
    })
}

