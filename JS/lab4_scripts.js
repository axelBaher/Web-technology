const setTheme = theme => document.documentElement.className = theme;

var t;

function popBox() {
    alert("Александров Павел Иванович\nгр.4931");
}

function auto_init() {
    let rows_min = 1;
    let rows_max = 30;
    let columns_min = 1;
    let columns_max = 30;
    input_rows = Math.floor(Math.random() * (rows_max - rows_min) + rows_min);
    input_columns = Math.floor(Math.random() * (columns_max - columns_min) + columns_min);
    document.getElementById('rows').value = input_rows;
    document.getElementById('columns').value = input_columns;
    document.getElementById('rows').disabled = true;
    document.getElementById('columns').disabled = true;
}

function enableInput() {
    document.getElementById('init_array').disabled = false;
    document.getElementById('rows').disabled = false;
    document.getElementById('columns').disabled = false;
    document.getElementById('manual_init_button').disabled = true;
}

function matrix_array(rows, columns, mode) {
    document.getElementById('array_area').style.display = 'block';
    document.getElementById('array_area').innerText = null;
    if (mode) {
        document.getElementById('init_array').disabled = true;
        document.getElementById('manual_init_button').disabled = false;
        auto_init();
        let arr_rows = document.getElementById('rows').value;
        let arr_columns = document.getElementById('columns').value;
        var arr = init_matrix_array(arr_rows, arr_columns);
        var arr = fill_matrix_array(arr_rows, arr_columns);
        for (let i = 0; i < arr_rows; i++) {
            document.getElementById('array_area').innerText += '[' + arr[i] + ']\n';
        }
    }
    else if (!mode) {
        var arr = init_matrix_array(rows, columns);
        var arr = fill_matrix_array(rows, columns);
        for (let i = 0; i < rows; i++) {
            document.getElementById('array_area').innerText += '[' + arr[i] + ']\n';
        }
    }
}

function init_matrix_array(rows, columns) {
    var arr = new Array();
    for (i = 0; i < rows; i++) {
        arr[i] = new Array();
        for (j = 0; j < columns; j++) {
            arr[i][j] = null;
        }
    }
    return arr;
}

function fill_matrix_array(rows, columns) {
    var counter = 0;
    var arr = new Array();
    for (i = 0; i < rows; i++) {
        arr[i] = new Array();
        for (j = 0; j < columns; j++) {
            counter++;
            arr[i][j] = counter;
        }
    }
    for (i = 0; i < rows; i++) {
        for (j = 0; j < columns; j++) {
        }
        if (i % 2 != 0)
            arr[i].sort(function compare_for_desc_sort(a, b) { return b - a; })
    }
    return arr;
}

function flip_flop_display_field() {
    var d = document.getElementById('array_area');
    if (d.style.display === 'none') {
        d.style.display = 'block';
        document.getElementById('clear_button').innerText = 'Спрятать поле вывода';
    } else {
        document.getElementById('clear_button').innerText = 'Показать поле вывода';
        d.style.display = 'none';
    }
}

function insertRow() {
    document.getElementById('btn_delete').disabled = false;
    var tbodyRef = document.getElementById('table_for_the_task').getElementsByTagName('tbody')[0];
    var numOfColumns = document.getElementById('table_for_the_task').rows[1].cells.length;
    var newRow = tbodyRef.insertRow();
    for (let i = 0; i < numOfColumns; i++) {
        var newCell = newRow.insertCell();
        var newText = document.createTextNode(newRow.rowIndex + '.' + (i + 1));
        newCell.appendChild(newText);
    }
}

function deleteRow() {
    var task_table = document.getElementById('table_for_the_task');
    var num_of_rows = task_table.rows.length;
    var mode = prompt('1 - удалить первую строку\n2 - удалить последнюю строку\n0 - удалить все строки');
    if (mode === '1' && num_of_rows > 2)
        task_table.deleteRow(1);
    else if (mode === '2' && num_of_rows > 2)
        task_table.deleteRow(num_of_rows - 1);
    else if (mode === '0') {
        for (var i = num_of_rows; i > 2; i--) {
            task_table.deleteRow(i - 1);
        }
    }
    else
        alert('Некорректный ввод!');
    if (document.getElementById('table_for_the_task').rows.length === 2) {
        document.getElementById('btn_delete').disabled = true;
    }
}
function time() {
    var datecur, hour, minute; var time = "";

    datecur = new Date();
    hour = datecur.getHours();
    minute = datecur.getMinutes();
    time = "Сейчас ";
    time += ((hour < 10) ? "0" : null) + hour;
    if (hour === 1 || hour === 21)
        time += ' час ';
    else if ((hour > 1 && hour < 5) || (hour == 22) || hour == 23)
        time += ' часа ';
    else
        time += ' часов ';
    time += ((minute < 10) ? "0" : null) + minute;
    if ((minute % 10 > 1) && (minute % 10 < 5) && ((minute != 12) || (minute != 13) || (minute != 14)))
        time += ' минуты';
    else if ((minute % 10 === 1) && (minute != 11))
        time += ' минута';
    else 
        time += ' минут';
    tmr = document.getElementsByTagName('label')[0];
    tmr.innerText = time;
}
function hide_time() {
    var time;
    time = "Узнать текущее время";
    tmt = document.getElementsByTagName('label')[0];
    tmr.innerText = time;
}

function timer_reset() {
    t = clearTimeout(t);
    t = setTimeout("hide_time()", 3500);
}