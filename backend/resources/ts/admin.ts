var new_button:HTMLDivElement = <HTMLDivElement>document.getElementById('new_button');
var modal:HTMLDivElement = <HTMLDivElement>document.getElementById('modal');

new_button.addEventListener('click', function() {
    modal.style.display = 'block';
})