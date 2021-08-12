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
        var data = getRequestParameterByArticleTileArticleDescription(article_title, article_description);
        function getRequestParameterByArticleTileArticleDescription(article_title, article_description) {
            return 'article_title' + '=' + article_title + '&' + 'article_description' + '=' + article_description;
        }
        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                var jsonText = httpRequest.responseText;
                console.log(jsonText);
                // const json = JSON.parse(jsonText);
                alert('登録が完了しました');
            }
        };
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);
        httpRequest.send(data);
    });
}
