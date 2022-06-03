<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <script src="../JS/lab4_scripts.js"></script>
    <title>Библиотека</title>
    <a name="top"></a>
    <style>
        #library_table {
            border: 1px solid;
            border-spacing: 10px 5px;
            text-align: center;
        }
        #library_table th {
            border-bottom: 1px solid;
        }
        #action_table {
            margin: auto;
        }
        #article_lab6 {
            margin: auto;
            width: 80%;
        }
    </style>
    <script>
        $(document).ready(function() {
                $("#update1").on("click",function(){
                    $.post({url: 'add_course.php',
                        data: $("#add_course_form").serialize(),
                        success: function (data) {alert(data); },
                        error: function () {alert("Одно или несколько полей заполнены неккоректно. Вставка невозможна!"); }
                    })
                })
                }); 
        
        $(document).ready(function() {
                $("#update2").on("click",function(){
                    $.post({url: 'remove_course.php',
                        data: $("#remove_course_form").serialize(),
                        success: function (data) {alert(data); },
                        error: function () {alert("Идентификатор задан неверно. Удаление невозможно!"); }
                    })
                })
                });
        
        $(document).ready(function() {
        $("#update3").on("click",function(){
            $.post({url: 'add_visitor.php',
                data: $("#add_visitor_form").serialize(),
                success: function (data) {alert(data); },
                error: function () {alert("Одно или несколько полей заполнены неккоректно. Вставка невозможна!"); }
            })
        })
        }); 

        $(document).ready(function() {
                $("#update4").on("click",function(){
                    $.post({url: 'remove_visitor.php',
                        data: $("#remove_visitor_form").serialize(),
                        success: function (data) {alert(data); },
                        error: function () {alert("Идентификатор задан неверно. Удаление невозможно!"); }
                    })
                })
                }); 
    </script>
</head>

<body>
    <header>
        <a href="index.html"> <img src="../img/header_logo.jpg" alt="Большие данные Bit Data"> </a>
    </header>
    <nav>
        <a href="index.html">Главная страница</a>
        <a href="html5.html">Страница с HTML5</a>
        <a href="sources.html">Использованные источники</a>
        <a href="script.html">Скрипт JS</a>
        <a href="form.html">Регистрация на курс</a>
        <a href="lab6.php">Библиотека</a>
        <a href="final_step.html">Список вакансий</a>
    </nav>
    <div id="time_label_div">
        <label id="time_label" onmouseover="time()" onmouseout="timer_reset()"> Узнать текущее время</label>
    </div>
    <article id="article_lab6">
        <h1>Список доступных книг</h1>
        <table id="library_table" align = center>
            <tr>
                <th>Уникальный номер книги
                <th>Название книги
                <th>Имя автора
                <th>Фамилия автора
                <th>Год выпуска книги
                <th>Количество оставшихся экземпляров
                <th>Описание книги
            </tr>
            <?php
                    $link = mysqli_connect('localhost', 'root', '', 'big_data_library');
                    if (!$link) {
                        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
                        exit;
                    }
                    if ($result = mysqli_query($link, 'SELECT id_book, book_title, book_author_name, book_author_surname, book_year, book_amount_left, book_about FROM book')) {
                        while( $row = mysqli_fetch_assoc($result) ){
                            printf('<tr><td>%s<td>%s<td>%s<td>%s<td>%s<td>%s<td>%s</tr>',
                            $row['id_book'], $row['book_title'], $row['book_author_name'],
                            $row['book_author_surname'], $row['book_year'], $row['book_amount_left'],
                            $row['book_about']);
                        }
                        mysqli_free_result($result);
                    }
                    mysqli_close($link);
                    ?>
        </table>
        <br>
        <table id="library_table" align = center>
            <tr>
                <th>Номер записи
                <th>Фамилия
                <th>Имя
                <th>Отчество
                <th>Номер телефона
                <th>Название книги
            </tr>
            <?php
                    $link = mysqli_connect('localhost', 'root', '', 'big_data_library');
                    if (!$link) {
                        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
                        exit;
                    }
                    if ($result = mysqli_query($link, 'SELECT id_visitor, visitor_name, visitor_surname, 
                    visitor_patronymic, visitor_phone, book_title FROM visitor
                    JOIN book on visitor.id_book = book.id_book')) {
                        while( $row = mysqli_fetch_assoc($result) ){
                            printf('<tr><td>%s<td>%s<td>%s<td>%s<td>%s<td>%s</tr>',
                            $row['id_visitor'], $row['visitor_name'], $row['visitor_surname'], 
                                $row['visitor_patronymic'], $row['visitor_phone'], $row['book_title']);
                        }
                        mysqli_free_result($result);
                    }
                    mysqli_close($link);
            ?>
        </table>
        <h1>Забронировать книгу</h1>
        <table id="form_table">
            <form action="add_visitor.php" method="POST" id="add_visitor_form">
                <tr>
                    <th>Фамилия </th>
                    <td id="required">*</td>
                    <td><input type=text name="v_name" pattern="^[A-Za-zА-Яа-яЁё]+$" required /></td>
                </tr>
                <tr>
                    <th>Имя </th>
                    <td id="required">*</td>
                    <td><input type=text name="v_surname" pattern="^[A-Za-zА-Яа-яЁё]+$" required /></td>
                </tr>
                <tr>
                    <th>Отчество </th>
                    <td id="required">*</td>
                    <td><input type=text name="v_patronymic" pattern="^[A-Za-zА-Яа-яЁё]+$" required /></td>
                </tr>
                <tr>
                    <th>Номер телефона </th>
                    <td id="required">*</td>
                    <td><input type=tel name="v_phone" placeholder="123-123-12-12" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required /></td>
                </tr>
                <tr>
                    <th>Номер книги </th>
                    <td id="required">*</td>
                    <td><input type=number name="v_book" required /></td>
                </tr>
                <!-- <tr id="tr_submit_btn"><td colspan="3"><button class="btn" id="update3">Забронировать книгу</button></td></tr> -->
            </form>
                <tr id="tr_submit_btn"><td colspan="3"><button class="btn" id="update3">Забронировать книгу</button></td></tr>
        </table>
        <h1>Отменить бронь книги</h1>
        <br>
       <table id="form_table">
            <form action="remove_visitor.php" method="POST" id="remove_visitor_form">
                <tr>
                    <th>Номер записи</th>
                    <td id="required">*</td>
                    <td><input type=number name="id_book_to_remove" required /></td>
                </tr>
                
                <!-- <tr id="tr_submit_btn"><td colspan="3"><button class="btn" id="update3">Забронировать книгу</button></td></tr> -->
            </form>
                <tr id="tr_submit_btn"><td colspan="3"><button class="btn" id="update4">Удалить запись о брони</button></td></tr>
        </table>
        
    </article>
    <footer>
        <a href="#top">Наверх</a>
    </footer>
</body>

</html>