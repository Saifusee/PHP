<?php
    class Car {
        var $gate = 100;


        function calcage(){
            return 85*98;
        }       
    }

    class Plane extends Car {

        function extended(){
            return $this->gate * 100;
        }


    }
    
    $rafael = new Plane;
    echo $rafael->extended();

    // $bmw = new Car;
    // echo $bmw->gate = 1000 . "<br>";
    // echo $bmw->calcage();







?>