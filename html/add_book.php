<?php
    $link = mysqli_connect( //Подключение к серверу MySQL
        'localhost',        //Хост, к которому мы подключаемся
        'root',             //Имя пользователя
        '',                 //Используемый пароль
        'big_data_library');      //База данных для запросов по умолчанию

    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }
    //Посылаем запрос серверу
    if ($result=mysqli_query($link, 'INSERT INTO book (book_title, book_author_name, book_author_surname, book_year, book_amount_left, book_about)
        VALUES ("'.$_POST['cName_add'].'",
        "'.$_POST['cCost_add'].'",
        "'.$_POST['cDur_add'].'",
        "'.$_POST['info_add'].'")'
        ) === true)
        print("Курс успешно добавлен!");
    else 
        print("Ошибка при вставке!");

//    mysqli_free_result($result);//Освобождаем используемую память
    mysqli_close($link);//Закрываем соединение
?>