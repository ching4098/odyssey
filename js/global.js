document.addEventListener('DOMContentLoaded', function () {
    var options = {
        format:"dd/mm/yyyy",
        setDefaultDate: false
};
var elems = document.querySelector('.datepicker');
var instance = M.Datepicker.init(elems, options);
});

document.addEventListener('DOMContentLoaded', function () {
    var options = {
        format:"dd/mm/yyyy",
        setDefaultDate: false
};
var elems = document.querySelector('.datepicker2');
var instance = M.Datepicker.init(elems, options);
instance.setDate(new Date())
});