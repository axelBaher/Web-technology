<?php
    $link = mysqli_connect( //Подключение к серверу MySQL
        'localhost',        //Хост, к которому мы подключаемся
        'root',             //Имя пользователя
        '',                 //Используемый пароль
        'big_data_library');//База данных для запросов по умолчанию

    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }
    //Посылаем запрос серверу
        if ($result=mysqli_query($link, 'INSERT INTO visitor (visitor_name, visitor_surname, visitor_patronymic, visitor_phone, id_book)
        VALUES ("'.$_POST['v_name'].'",
        "'.$_POST['v_surname'].'",
        "'.$_POST['v_patronymic'].'",
        "'.$_POST['v_phone'].'",
        "'.$_POST['v_book'].'")'
        ) === true)
        print("Бронь успешно завершена!");
    else print("Ошибка при записи брони!");   

//    mysqli_free_result($result);//Освобождаем используемую память
    mysqli_close($link);//Закрываем соединение
?>