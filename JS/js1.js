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
          if(i % 2 != 0)
              arr[i].sort(function compare_for_desc_sort(a, b) {return b - a;})
      }
      return arr;
  }
  
  
  var input_rows;
  var input_columns;
  var cycle_var = true;
  while (cycle_var) {
    var input_way_of_init_array = prompt("Text 1, if you want to auto initialize array, text 2, if you want initialize array manually")
    if (input_way_of_init_array === "1") {
      input_rows = Math.floor(Math.random() * 30);
      input_columns = Math.floor(Math.random() * 30);
      cycle_var = false;
    } else if (input_way_of_init_array === "2") {
      input_rows = prompt("Enter number of rows: ");
      input_columns = prompt("Enter number of columns: ");
      cycle_var = false;
    } else if (input_way_of_init_array === "qqq") {
      cycle_var = false;
    } else {
      alert("Incorrect input, try again!");
    }
  }
  var my_array = init_matrix_array(input_rows, input_columns);
  var my_array = fill_matrix_array(input_rows, input_columns)
  my_array;

/*
  tr:nth-child(odd){
  background-color: #bffdff;
}
*/