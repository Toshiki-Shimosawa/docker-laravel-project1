var humburger = document.getElementById('humburger');
humburger.addEventListener('click', function () {
    var _a, _b, _c, _d;
    (_a = document.getElementById('line1')) === null || _a === void 0 ? void 0 : _a.classList.toggle('line1_clicked');
    (_b = document.getElementById('line2')) === null || _b === void 0 ? void 0 : _b.classList.toggle('line2_clicked');
    (_c = document.getElementById('line3')) === null || _c === void 0 ? void 0 : _c.classList.toggle('line3_clicked');
    (_d = document.getElementById('humburger_menu')) === null || _d === void 0 ? void 0 : _d.classList.toggle('radius');
});
