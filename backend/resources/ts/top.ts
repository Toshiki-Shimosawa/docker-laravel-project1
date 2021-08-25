let humburger:HTMLDivElement = <HTMLDivElement>document.getElementById('humburger')!;

humburger.addEventListener('click', function() {
    document.getElementById('line1')?.classList.toggle('line1_clicked');
    document.getElementById('line2')?.classList.toggle('line2_clicked');
    document.getElementById('line3')?.classList.toggle('line3_clicked');
    document.getElementById('humburger_menu')?.classList.toggle('radius');
});