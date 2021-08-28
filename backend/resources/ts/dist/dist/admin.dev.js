"use strict";

exports.__esModule = true;
exports.createEditFormByContentsParam = void 0;
var csrf_token = document.getElementsByName('csrf_token')[0].content;
var new_button = document.getElementById('new_button');
var new_modal = document.getElementById('new_modal');
new_button.addEventListener('click', function () {
  new_modal.classList.toggle('radius');
});
var new_event = document.getElementById('new_submit_btn');

function getRequestParameterByDataList(data_list) {
  var request_parameter = '';
  data_list.forEach(function (value, key) {
    request_parameter = request_parameter.concat(key + "=" + value + "&");
  });
  return request_parameter;
}

if (new_event) {
  new_event.addEventListener('click', function () {
    var httpRequest = new XMLHttpRequest();
    httpRequest.open('post', 'admin/contents/new', true);
    var article_title = document.getElementById('article_title').value;
    var article_description = document.getElementById('article_description').value;
    var release_date_time = document.getElementById('release_date_time').value;
    var category_id = document.getElementById('category_id').value;
    var img_path = document.getElementById('img_path').value;
    var data_list = new Map([['article_title', article_title], ['article_description', article_description], ['release_date_time', release_date_time], ['category_id', category_id], ['img_path', img_path]]);

    httpRequest.onreadystatechange = function () {
      if (httpRequest.readyState === 4) {
        if (httpRequest.status === 200) {
          alert('登録が完了しました');
          new_modal.style.visibility = 'hidden';
          location.reload();
        } else {
          alert('正常に登録ができませんでした。管理者にお問い合わせください。');
          new_modal.style.visibility = 'hidden';
        }
      }
    };

    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);
    var request_parameter = getRequestParameterByDataList(data_list);
    httpRequest.send(request_parameter);
  });
}

function createEditFormByContentsParam(contents_param) {
  document.getElementById('edit_content_id').value = contents_param.get('content_id');
  document.getElementById('edit_title').value = contents_param.get('title');
  document.getElementById('edit_description').value = contents_param.get('description');

  var _target_date = new Date(contents_param.get('release_datetime'));

  var year = _target_date.getFullYear();

  var month = ('0' + _target_date.getMonth()).slice(-2);

  var date = _target_date.getDate();

  var target_date = year + '-' + month + '-' + date;
  document.getElementById('edit_release_datetime').value = target_date;
  var category_name = document.getElementById('edit_category_id').querySelector("option[value='" + contents_param.get('category_id') + "']");
  category_name.setAttribute('selected', 'selected');
  document.getElementById('edit_img_path').value = contents_param.get('img_path');
}

exports.createEditFormByContentsParam = createEditFormByContentsParam;
var edit_event = document.getElementById('edit_submit_btn');

if (edit_event) {
  edit_event.addEventListener('click', function () {
    var httpRequest = new XMLHttpRequest();
    httpRequest.open('post', 'admin/contents/edit', true);
    var content_id = document.getElementById('edit_content_id').value;
    var article_title = document.getElementById('edit_title').value;
    var article_description = document.getElementById('edit_description').value;
    var release_date_time = document.getElementById('edit_release_datetime').value;
    var category_id = document.getElementById('edit_category_id').value;
    var img_path = document.getElementById('edit_img_path').value;
    var data_list = new Map([['content_id', content_id], ['article_title', article_title], ['article_description', article_description], ['release_date_time', release_date_time], ['category_id', category_id], ['img_path', img_path]]);

    httpRequest.onreadystatechange = function () {
      if (httpRequest.readyState === 4) {
        if (httpRequest.status === 200) {
          alert('登録が完了しました');
          new_modal.style.visibility = 'hidden';
          location.reload();
        } else {
          alert('正常に登録ができませんでした。管理者にお問い合わせください。');
          new_modal.style.visibility = 'hidden';
        }
      }
    };

    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.setRequestHeader('X-CSRF-Token', csrf_token);
    var request_parameter = getRequestParameterByDataList(data_list);
    httpRequest.send(request_parameter);
  });
}

var edit_btns = document.getElementsByClassName('edit_btn');
var edit_modal = document.getElementById('edit_modal');

var _loop_1 = function _loop_1(i) {
  edit_btns[i].addEventListener('click', function () {
    edit_modal.style.display = 'block';
    var content_id = document.getElementById("js_content_id_" + i).textContent;
    var title = document.getElementById("js_title_" + i).textContent;
    var description = document.getElementById("js_description_" + i).textContent;
    var release_datetime = document.getElementById("js_release_datetime_" + i).textContent;
    var category_id = document.getElementById("js_category_name_" + i).dataset.category_id;
    var img_path = document.getElementById("js_img_path_" + i).firstElementChild.getAttribute('src');
    var contents_param = new Map();
    contents_param.set('content_id', content_id);
    contents_param.set('title', title);
    contents_param.set('description', description);
    contents_param.set('release_datetime', release_datetime);
    contents_param.set('category_id', category_id);
    contents_param.set('img_path', img_path);
    createEditFormByContentsParam(contents_param);
  });
};

for (var i = 0; i < edit_btns.length; i++) {
  _loop_1(i);
}