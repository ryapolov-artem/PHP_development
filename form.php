<!DOCTYPE html>
<html>
 <head>
  <title>Form</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="styles.css" type="text/css">
 </head>
 <body>
  
  <p>Отправка данных формы на сервер</p>
  <form action="after_form.php" method="post">
      <table><tr><td>   Имя   </td>
          <td><input type="text" name="first_name"> </td></tr>
          <tr><td>   Фамилия   </td>
          <td><input type="text" name="second_name"> </td></tr>
          <tr><td>   Отчество   </td>
          <td><input type="text" name="third_name"> </td></tr>
          <tr><td><input type="submit" value="Отправить"></td></tr></table>
 </form>

 </body>
</html>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
