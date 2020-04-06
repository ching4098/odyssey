document.addEventListener('DOMContentLoaded', function () {
    var options = {
        format:"yyyy/mm/dd",
        setDefaultDate: false
};
var elems = document.querySelector('.datepicker');
var instance = M.Datepicker.init(elems, options);
});

document.addEventListener('DOMContentLoaded', function () {
    var options = {
        format:"yyyy/mm/dd",
        setDefaultDate: false
};
var elems = document.querySelector('.datepicker2');
var instance = M.Datepicker.init(elems, options);
});