<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
      <?php
      
      //Класс - животное 
      class simpleAnimal{
          public $class_name='Животное';       // имя класса
          public $leg_number=4;             // число ног - 4
          public $eye_number=2;             // число глаз - 2
           function Breeding(){    // животное может размножаться
              echo $this->class_name.' размножается и их уже двое! <br />';
              // хочу чтобы животное создавало еще одно животное        
          }
      }
      //////////////Класс охотник - наследник класса животное
      class predator extends simpleAnimal{
          public $class_name='Хищник';       // имя класса
          static function Hunting(){            // хищник может охотиться
              echo $this->class_name.' охотится на травоядных! <br />';   
          }
      }
      //////////////////////////////////////////////////////
      $animal_1 = new simpleAnimal();
      $animal_1->Breeding();
      
      $animal_2 = new predator();
      $animal_2->Breeding();
      
      $animal_2->Hunting();
      predator::Hunting();
      
      ?>
    </body>
</html>
