<?php

class InutHandler {

    static $total;

    static public function getIncome($a)
    {
        self::$total += $a;
    }
    static public function getAdditional($a)
    {
        self::$total += $a;
    }
    static public function getExemption($a)
    {
        self::$total -= $a;
    }
   

}