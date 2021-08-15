var new_button = document.getElementById('new_button');
var modal = document.getElementById('modal');
new_button.addEventListener('click', function () {
    modal.style.display = 'block';
});
var target_id = 'submit_btn';
var e = document.getElementById(target_id);
var csrf_token = document.getElementsByName('csrf_token')[0].content;
if (e) {
    e.addEventListener('click', function () {
        var httpRequest = new XMLHttpRequest();
        httpRequest.open('post', 'admin/new', true);
        var article_title = document.getElementById('article_title').value;
        var article_description = document.getElementById('article_description').value;
        var release_date_time = document.getElementById('release_date_time').value;
        var category_id = document.getElementById('category_id').value;
        var img_path = document.getElementById('img_path').value;
        var data_list = new Map([
            ['article_title', article_title],
            ['article_description', article_description],
            ['release_date_time', release_date_time],
            ['category_id', category_id],
            ['img_path', img_path]
        ]);
        function getRequestParameter() {
            var request_parameter = '';
            data_list.forEach(function (value, key) {
                request_parameter = request_parameter.concat(key + "=" + value + "&");
            });
            return request_parameter;
        }
        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4) {
                if (httpRequest.status === 200) {
                    alert('登録が完了しました');
                    modal.style.display = 'none';
                    location.reload();
                }
                else {
                    alert('正常に登録ができませんでした。管理者にお問い合わせください。');
                    modal.style.display = 'none';
                }
            }
        };
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);
        var request_parameter = getRequestParameter();
        httpRequest.send(request_parameter);
    });
}
