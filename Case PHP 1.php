<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" href="styles.css" type="text/css">
        <title>Сортировка массивов</title>
    </head>
    <body>
        <?php
        /*В этот массив из-за ошибки операторов попали неверные строковые значения. 
         * Ваша задача отсортировать элементы сначала по ключу и потом по значению. 
         * После чего преобразовать все цены в целочисленный тип, при нахождении строки
         * в значении элемента необходимо удалить его из массива и записать в другой массив, 
         * в котором будут храниться все строковые значения. К каждому элементу массива 
         * нужно добавить название текущего файла скрипта. 
         */
        
        
        $goods=Array (                  //Исходный массив товаров
              'c4ca4' => 643.10, 
              'c81e7' => 350.47,
              'eccbc' => 558.45,
              'a87ff' => 326.92,
              'e4da3' => 'fly',
              16790 => 1232.29,
              '8f14e' => 746.36,
              'c9f0f' => 'codeigniter',
              '45c48' => 2553.87,
              'd3d94' => 'lamp',
              '6512b' => 3872.57,
              'c20ad' => 30.63,
              'c51ce' => 356.76,
              'aab32' => 405.00,
              '9bf31' => 'simple',
              'c74d9' => 85.96,
              '70efd' => 287.27,
              '6f492' => 'like',
              '1f0e3' => 1820.20,
              '98f13' => 1075.65,
              '3c59d' => 599.37,
              'b6d76' => 499.76,
              37693 => 'drupal',
              '1ff1d' => 2853.28,
              '8e296' => 4155.76,
              '4e732' => 819.14,
              '02e74' => 275.91,
              '33e75' => 9614.00,
              '6ea9a' => 'joomla',
              34173 => 1489.35,
              'c16a5' => 2713.78,
              '6364d' => 63.34,
              '182be' => 1087.38,
              'e3698' => 28004.67,
              '1c383' => 126925,
              '19ca1' => 41328.92,
              'a5bfc' => 'zend',
              'a5771' => 4939.37,
              'd67d8' => 4789.11,
              'd6459' => 7035.31,);
        
        $art_sort=$goods;           //Этот массив будет отсортирован по артикулам  
        $val_sort=$goods;           //Этот массив будет отсортирован по значеним
                
        ksort($art_sort);            //Сортирует массив по ключам (артикулам)
        asort($val_sort);            //Сортирует массив по значениям
        
        $cur_file=$_SERVER['SCRIPT_FILENAME'];              //Имя текущего файла в файловой системе
        $cur_file_arr=explode('/',$cur_file);               //Разбивает адрес к файлу, разделитель '/', создает массив
        $cur_file_arr_count=count($cur_file_arr);           //Подсчитывает количество элементов в массиве $cur_file_arr
        $cur_file=$cur_file_arr[$cur_file_arr_count-1];     //В переменную имени текущ. файла пересохраняется только название 
                                                            //файла без пути
        
        foreach ($goods as $key => $value) {                        //Перебор всех элементов ассоц. массива
              if (gettype($value)== 'string'){                      //Если в значении товара записано строковое значение, то
                  $str_goods[$key]=$value;                          //Этот элемент помещается в специально отведенный массив
              }else{
                  $int_goods[$key]=(int)$value;                         //Если в значении товара число, приводим его к целочисленному значению
              }                                                         //и записываем в другой массив
              $goods_script_path[$key]=(string)$value.' '.$cur_file;    //к каждому значению добавляется имя файла скрипта
        };
         
        ?>
        <table><tr><th>Исходный массив</th>
               <th>Массив, отсортированный по ключам</th>
               <th>Массив, отсортированный по значениям</th></tr>
               <tr> <td> <?php var_dump($goods); ?> </td>
                    <td> <?php var_dump($art_sort); ?>  </td>
                    <td> <?php var_dump($val_sort); ?> </td> </tr> </table>
        <br />
        <table><tr><th>Массив, в котором цены стали целочисленными значениями</th>
               <th>Массив со строковыми значениями </th>
               <th>Массив значение + имя файла </th></tr>
               <tr> <td> <?php var_dump($int_goods); ?> </td>
                    <td> <?php var_dump($str_goods); ?> </td>
                    <td> <?php var_dump($goods_script_path); ?> </td> </tr> </table>
    </body>
</html>
