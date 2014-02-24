<?php

class LuhnAlgorithm
{
    private $accountNumber = '';

    private $checkDigit = 0;

    private $total = 0;

    public function __construct($numbers)
    {
        //strip all letters and characters
        $numbers = preg_replace("/[^0-9]/","",$numbers);

        //loop through
        for($i=0; $i<strlen($numbers); $i++)
        {
            //if even number
            if(($i+1)%2 == 0)
            {
                if($numbers[$i] > 4) {
                    $numbers[$i] = ($numbers[$i] - 5) * 2 + 1;
                } else {
                    $numbers[$i] = $numbers[$i]*2;
                }
            }

            $this->accountNumber .= $numbers[$i];

            $this->total += $numbers[$i];
        }

        $this->checkDigit = (10-($this->total % 10));
    }

    public function getCheckDigit()
    {
        return ($this->checkDigit == 10)? 0 : $this->checkDigit;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

  
}


$algo = new LuhnAlgo("9993639871");


//require_once(dirname(__DIR__)."/xf/Application.php");