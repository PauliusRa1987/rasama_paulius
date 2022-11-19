<?php


class OutputHandler extends TaxCalculator{

    public function output(){
        $this->calculateTax();
        // echo parent::$tax;
    }
}