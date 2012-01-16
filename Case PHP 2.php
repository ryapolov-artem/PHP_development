<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*a.	У нас есть массив новостей в ассоциированном массиве
        $news = array(
        Вам необходимо вывести новости в нижеуказанном формате.
        Пример выведенных новостей:

        12.11.1987
        Стартовал американский шаттл
        Стартовал американский шаттл "Атлантис" (СТС-74) со стыковочным отсеком.

        13.11.1987
        Пристыковался американский шаттл
        Пристыковался американский шаттл "Атлантис" (СТС-74) со стыковочным отсеком.

        Если в тексте новости встречается число, Вам необходимо привести его к вещественному
        числу с двумя знаками после запятой (1234,07).

        b.	Написать функцию генерации цены товара в строковом формате. Вывести результат 
        в окно браузера. Допустим, на входе функции получена цена 38243.75, вы должны вывести 
        «тридцать восемь тысяч двести сорок три рубля семьдесят пять копеек».
        c.	Реализовать функцию вычисления тангенса угла, без использования стандартных 
        тригонометрических функций, вывести результат в окно браузера.
         */
        // А)
        $news = array(
            0 => array('id' => '1', 'title' => 'Динамика курсов валют. Сентябрь 2009', 'date' => '2009-09-30 00:00:00', 'descript' => 'Рубль по итогам валютных торгов на ММВБ в среду подорожал на 5 копеек к бивалютной корзине (0,55 доллара и 0,45 евро) и на 10 копеек к доллару на фоне возобновившегося ослабления американской валюты к евро на Forex.', 'image' => ''),
            1 => array('id' => '2', 'title' => 'Курс доллара с 1 октября снижен', 'date' => '2009-09-30 12:38:00', 'descript' => 'Курс доллара ЦБ с 1 октября установлен на уровне 30,0087 рубля, евро - 43,8877 рубля, свидетельствуют данные Банка России.', 'image' => ''),
            2 => array('id' => '5', 'title' => 'Доллар падает, рубль взлетает.', 'date' => '2009-09-30 14:32:00', 'descript' => 'Американская валюта переживает не лучшую неделю в своей долгой жизни…', 'image' => ''));

         
        foreach ($news as $news_number => $news_content){
                $date_arr=explode(' ',$news_content['date']);
                $date=DateTime::createFromFormat("Y-m-d", $date_arr[0]);
                echo $date_new=date_format($date, 'j.m.Y').'<br />';            //преобразованная дата
                echo $news_content['title'].'<br />';
                $descript_arr=explode(' ',$news_content['descript']);           //разбиение описания по пробелам
                foreach ($descript_arr as $key => $value){
                    if ((float)$value!=0) {
                        $descript_arr[$key]=number_format((float)str_replace(',', '.', $value), 2); //замена на вещ. число с 2 знаками
                    };
                };
                $news_content['descript']=implode(' ', $descript_arr);          //обратная сборка в строку
                echo $news_content['descript'].'<br />'.'<br />';
        };

        /*Вывод: 
        30.09.2009
        Динамика курсов валют. Сентябрь 2009
        Рубль по итогам валютных торгов на ММВБ в среду подорожал на 5.00 копеек к бивалютной корзине (0,55 доллара и 0,45 евро) 
        и на 10.00 копеек к доллару на фоне возобновившегося ослабления американской валюты к евро на Forex.

        30.09.2009
        Курс доллара с 1 октября снижен
        Курс доллара ЦБ с 1.00 октября установлен на уровне 30.01 рубля, евро - 43.89 рубля, свидетельствуют данные Банка России.

        30.09.2009
        Доллар падает, рубль взлетает.
        Американская валюта переживает не лучшую неделю в своей долгой жизни…
         */
        
        // Б)
        $price_float=array(15679.56, 478651.01, 100.25, 6659970.42, 98, 123456789.99);
                
        $number_exp=array('миллион'=>1000000,'тысяч'=>1000,'рубл'=>1,'копе'=>0.01);
        $hundreds=array('сто ','двести ','триста ','четыреста ','пятьсот ','шестьсот ','семьсот ','восемьсот ','девятьсот ');
        $dozens=array('десять ','двадцать ','тридцать ','сторок ','пятьдесят ','шестьдесят ','семьдесят ','восемдесят ','девяносто ');
        $n_teen=array('одиннадцать ','двенадцать ','тринадцать ','четырнадцать ','пятнадцать ','шестнадцать ','семнадцать ','восемнадцать ','девятнадцать ');
        $units=array('один ','два ','три ','четыре ','пять ','шесть ','семь ','восемь ','девять ');
        
        function floatToString($float_price){
           
           global $number_exp;
           global $hundreds;
           global $dozens;
           global $n_teen;
           global $units;
           
           $price_string='';                                                       //объявлена строковая переменная
           $price=$float_price;
            
           foreach ($number_exp as $key => $exp_value) {
              
               $hundr_num=0;
               $dozens_num=0;
               $units_num=0;
               
               $hundr_num=(int)($price/(100*$exp_value));       //сотни
               if ($hundr_num>=1){                              
                    $price_string.=$hundreds[$hundr_num-1];
                    $price=$price-$hundr_num*(100*$exp_value);
               };
               var_dump($price_string);
               var_dump($hundr_num);
               var_dump($price);

               $dozens_num=(int)($price/(10*$exp_value));       //десятки
               if ($dozens_num!=0){                             
                    $price=$price-$dozens_num*(10*$exp_value);
               };
               
               $units_num=(int)($price/($exp_value));           //единицы
               if ($units_num!=0){                             
                    $price=$price-$units_num*$exp_value;
               };

               if ($dozens_num>=2){                             //20-90
                   $price_string.=$dozens[$dozens_num-1];
               };
               
               if ($dozens_num==1){
                   if ($units_num==0){
                        $price_string.=$dozens[0];              //10
                    }else{
                        $price_string.=$n_teen[$units_num-1];   //11-19
                    };
               };

               var_dump($dozens_num);
               var_dump($units_num);
               var_dump($price);

                if (($units_num!=0 || $dozens_num!=0 || $hundr_num!=0)) {   //наименование
                    switch ($key){                                               
                        case 'миллион':
                            if  ($dozens_num!=1 && $units_num!=0){
                                switch ($units_num){
                                    case 1: $price_string.=$units[$units_num-1].$key.' ';            //миллион
                                        break;
                                    case (2 || 3 || 4): $price_string.=$units[$units_num-1].$key.'а ';  //миллион-а
                                        break;
                                    default: $price_string.=$units[$units_num-1].$key.'ов ';          //тысяч
                                    };
                            }else{
                                $price_string.=$key.'ов ';
                            };
                            break;
                        case 'тысяч': 
                            if  ($dozens_num!=1 && $units_num!=0){
                                switch ($units_num){
                                    case 1: $price_string.='одна тысяча ';
                                        break;
                                    case 2: $price_string.='две тысячи ';
                                        break;
                                    case (3 || 4): $price_string.=$units[$units_num-1].$key.'и ';     //тысяч-и
                                        break;
                                    default: $price_string.=$units[$units_num-1].$key.' ';              //тысяч
                                    };
                            }else{
                                $price_string.=$key.' ';
                            };
                            break;
                        case 'рубл': 
                            if  ($dozens_num!=1 && $units_num!=0){
                                switch ($units_num){
                                    case 1: $price_string.=$units[$units_num-1].$key.'ь ';              //рубл-ь
                                        break;
                                    case (2 || 3 || 4): $price_string.=$units[$units_num-1].$key.'я ';    //рубл-я
                                        break;
                                    default: $price_string.=$units[$units_num-1].$key.'ей ';            //рубл-ей
                                };
                            }else{
                                $price_string.=$key.'ей ';
                            };
                            break;
                        case 'копе': 
                            if  ($dozens_num!=1 && $units_num!=0){
                                switch ($units_num){
                                case 1: $price_string.='одна '.$key.'йка ';                         //одна копейка
                                case 2: $price_string.='две '.$key.'йки ' ;                         //две копейки
                                    break;
                                case (3 || 4): $price_string.=$units[$units_num-1].$key.'йки ';       //три, четыре копейки
                                    break;
                                default: $price_string.=$units[$units_num-1].$key.'ек ';            //копеек
                                };
                            }else{
                                $$price_string.=$key.'ек ';
                            };
                            break;
                    };
                };
            };
            return $price_string;
        };
        
        foreach ($price_float as $price_value) {
           echo floatToString($price_value);
        };
        
        
        // В)
        $x_deg_arr=array(65,89,45,12,-41,-90);
        function tang($x_deg){
            if ($x_deg!=-90 && $x_deg!=90){
                $x_rad=$x_deg*pi()/180;
                $x_tang=$x_rad+(1/3)*pow($x_rad, 3)+(2/15)*pow($x_rad, 5)+(17/315)*pow($x_rad, 7)+(62/2835)*pow($x_rad, 9);
            }else{
                $x_tang='N/A';
            };
            echo 'tg('.$x_deg.')='.$x_tang;
        };
        
        foreach ($x_deg_arr as $x_value) {
           echo tang($x_value).'<br />';
        };
        
        /*  tg(65)=2.0702899597329
            tg(89)=6.337567403958
            tg(45)=0.99917106679885
            tg(12)=0.2125565613631
            tg(-41)=-0.86900497528104
            tg(-90)=N/A
         */
        
        ?>
    </body>
</html>