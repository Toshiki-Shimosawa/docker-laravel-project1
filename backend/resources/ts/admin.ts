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

        var data = getRequestParameterByArticleTileArticleDescription(article_title, article_description);

        function getRequestParameterByArticleTileArticleDescription(article_title:HTMLFormElement, article_description:HTMLFormElement) {
            return 'article_title' + '=' + article_title + '&' + 'article_description' + '=' + article_description;
        }


        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                const jsonText = httpRequest.responseText;
                console.log(jsonText);
                // const json = JSON.parse(jsonText);

                alert('登録が完了しました');
            }
        }

        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);

        httpRequest.send(data);
    })
}