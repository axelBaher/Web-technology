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
    if (count(mysqli_fetch_all($result=mysqli_query($link, 'SELECT * FROM wa_course WHERE id_course = '.$_POST['cId_remove'].''))) === 0) {
        mysqli_free_result($result);//Освобождаем используемую память
        mysqli_close($link);//Закрываем соединение
        print("Ошибка при удалении курса. Некорректный идентификатор!"); 
        return 0;
    }
    //Посылаем запрос серверу
    if ($result=mysqli_query($link, 'DELETE FROM wa_course WHERE id_course = '.$_POST['cId_remove'].'') === true) {
//        mysqli_free_result($result);//Освобождаем используемую память
        mysqli_close($link);//Закрываем соединение
        printf("Курс успешно удалён!");}
    else {
//        mysqli_free_result($result);//Освобождаем используемую память
        mysqli_close($link);//Закрываем соединение
        printf("Ошибка при удалении курса!");}
?>