<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $first_name=$_POST['first_name'];
        $second_name=$_POST['second_name'];
        $third_name=$_POST['third_name'];
        echo '<h4>Были введены следующие данные: </h4>';
        echo 'Имя: '.$first_name.'<br />';
        echo 'Фамилия: '.$second_name.'<br />';
        echo 'Отчество: '.$third_name.'<br />';
        echo '<h4>Результат работы md5: </h4>';
        echo 'Имя: '.md5($first_name).'<br />';
        echo 'Фамилия: '.md5($second_name).'<br />';
        echo 'Отчество: '.md5($third_name).'<br />';
        echo '<h4>Результат работы sha1: </h4>';
        echo 'Имя: '.sha1($first_name).'<br />';
        echo 'Фамилия: '.sha1($second_name).'<br />';
        echo 'Отчество: '.sha1($third_name).'<br />';
        
        echo '<h4>Работа с базой данных: </h4>';
        $db_connect=mysql_connect('localhost','developer','developerpass');       
        if ($db_connect){                                       //Открыть соединение с MysSQL
            echo 'Соединение с MySQL установлено.<br />';
            echo 'ID соединения: '.$db_connect.'<br />';
            
            mysql_select_db('php_development',$db_connect);
            $db_query="INSERT INTO form_data (`first_name`, `second_name`, `third_name`) VALUES ('$first_name', '$second_name', '$third_name')";
            
            if (mysql_query($db_query,$db_connect)){            //Сделать запись для данного соединения
                echo '1 запись добавлена.<br />';               //Сообщить об успешной записи
            }else{
                echo 'Ошибка добавления записи: '.mysql_error().'.<br />';      //Вывести ошибку MySQL
            };
            
            echo 'Кодировка соединения: '. mysql_client_encoding().'.<br />';
        }else{
            echo 'Соединение с MySQL не установлено. <br />';
        };
        
       //INSERT INTO `php_development`.`form_data` (`id`, `first_name`, `second_name`, `third_name`) VALUES ('2', 'Ryapolov', 'Artem', 'Vladimirovich');
        
        if (mysql_close()){                                     //Закрыть соединение с MySQL
            echo 'Соединение с MySQL закрыто.<br />';
        }else{
            echo 'Соединение с MySQL не закрыто.<br />';
        };
        ?>
    </body>
</html>