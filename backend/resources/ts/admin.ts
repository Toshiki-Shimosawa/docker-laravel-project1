var new_button:HTMLDivElement = <HTMLDivElement>document.getElementById('new_button');
var modal:HTMLDivElement = <HTMLDivElement>document.getElementById('modal');

new_button.addEventListener('click', function() {
    modal.style.display = 'block';
})

const target_id = 'submit_btn';

const e = document.getElementById(target_id);
var csrf_token = (<HTMLMetaElement>document.getElementsByName('csrf_token')[0]).content;

if (e) {
    e.addEventListener('click', () => {
        const httpRequest = new XMLHttpRequest();
        httpRequest.open('post', 'admin/new', true);

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

        function getRequestParameter()
        {
            var request_parameter: string = '';

            data_list.forEach((value, key) => {
                request_parameter = request_parameter.concat(`${key}=${value}&`);
            });

            return request_parameter;
        }

        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                alert('登録が完了しました');
                modal.style.display = 'none';
            }
        }

        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);

        var request_parameter = getRequestParameter();
        httpRequest.send(request_parameter);
    })
}