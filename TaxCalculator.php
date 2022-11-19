<?php
class TaxCalculator extends InutHandler{
    public $tax;

    public function calculateTax(){
        
        if(parent::$total < 30000){
            $this->tax = parent::$total * 0.2; 
        }
        else {
            $this->tax = parent::$total*0.25;
        }
    }
}