function check_fields() {

    var monday = document.getElementById('days_monday').checked;
    var tuesday = document.getElementById('days_tuesday').checked;
    var wednesday = document.getElementById('days_wednesday').checked;
    var thursday = document.getElementById('days_thursday').checked;
    var friday = document.getElementById('days_friday').checked;
    var saturday = document.getElementById('days_saturday').checked;
    if (!monday && !tuesday && !wednesday && !thursday && !friday && !saturday) {
        alert('Выберите хотя бы один день!');
        return document.getElementById('form_lab5').the_query.value !== "";//cancel submit
    }
}