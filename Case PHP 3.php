<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        /*
         * Есть абстрактный класс «Транспорт». Свойства класса – «номер кузова», «тип транспорта», «Уникальный номер транспорта».
Методы: приватные – «сменить владельца»;
публичные – «посмотреть номер», «посмотреть тип транспорта», «заправить»
Есть класс «Владелец». Свойства – «ФИО», «номер прав», «уникальный номер транспорта»
Методы публичные – «Посмотреть ФИО»
Приватные – «Выдать доверенность», «Приобрести транспорт», «Продать транспорт»
Защищенные – «Завести транспорт».
Вам необходимо реализовать данные классы на PHP.
Когда классы будут написаны, создайте класс «Волга» – родительский класс  «Транспорт».
Класс «Сын» – родительский класс «Владелец».
Когда классы будут готовы. Вам необходимо описать следующий процесс. Владелец приобретает себе новую волгу. Со своим 18-ти летним сыном, у которого есть права они едут в гости к знакомым, где владелец со своим другом решают обмыть машину. Спиртного дома оказывается мало, оно быстро заканчивается, а ближайший магазин находится в 5 км от них, поэтому владелец выписывает доверенность на своего сына и отправляет его купить еще спиртного, и заодно заправить машину по дороге.

         */
        
        abstract class Transport                                //абстрактный класс - Транспорт
        {
            private $car_body_number;
            public $transport_type;
            public $transport_unique_number;
            
            abstract public function changeOwner();            //сменить владельца   //должен быть private
            
            abstract public function showCarNumber();           //посмотреть номер транспорта
            
            abstract public function showTransportType();       //посмотреть тип транспорта
 
            abstract public function tankUp();                  //заправить транспорт
            
        }
        
        class Owner                                             //класс - Владелец
        {
            public $owner_name='Галушка Пётр Николаевич';
            private $driver_license_number='ВУ13579';
            private $transport_unique_number='ма456т';
            
            public function showOwnerName(){                    //посмотреть имя владельца
                echo $this->owner_name.'.<br />';
            }
            
            private function giveWarrant($driver){              //выдать доверенность
                echo $this->$owner_name.'выдал доверенность на имя'.$driver.'.<br />';
            }
            
            private function buyTransport($car_model){          //купить транспорт
                echo 'Куплен автомобиль '.$car_model.' с номером'.$this->transport_unique_number.'.<br />';
            }
            
            private function sellTransport($car_model){         //продать транспорт
                echo 'Продан автомобиль '.$car_model.' с номером'.$this->transport_unique_number.'.<br />';
            }
            
            protected function startCar($car_model){            //завести транспорт
                echo 'Автомобиль '.$car_model.' с номером'.$this->transport_unique_number.' был заведен. <br />';
            }
            
        }
        
        class Volga extends Transport                           //класс Волга - наследник класса Транспорт
        {
            private $car_body_number='135246';
            public $transport_type="Автомобиль \"Волга\"";
            public $transport_unique_number='ма456т';
            
            public function changeOwner(){                     //сменить владельца
                echo 'У автомобиля новый владелец.<br />';
            }
            
            public function showCarNumber(){                    //посмотреть номер кузова
                echo 'Номер автомобиля: '.$this->transport_unique_number.'.<br />';
            }
            
            public function showTransportType(){                //посмотреть тип транспорта
                echo 'Тип транспорта: '.$this->transport_type.'.<br />';
            }
            
            public function tankUp(){                           //заправить транспорт
                echo $this->transport_type.'заправлен.<br />';
            }
        }
        
        class Son extends Owner                                 //класс Сын - наследник класса Владелец       
        {
            public $son_name='Галушка Василий Петрович';
        }
        
        $new_auto = new Volga();
        $senior_driver = new Owner();
        $junior_driver = new Son();
        
        //$junior_driver_name = $junior_driver->son_name;             //Имя сына
        //$junior_driver->giveWarrant($junior_driver_name);           //Доверенность на сына
        //$new_auto->showCarNumber();
        
        
        
        ?>
    </body>
</html>