<?php
/**
 * LuhnAlgorithm
 * 
 * usage 
 * $luhn = new LuhnAlgorith("7992739871")
 * echo $luhn->check();
 * echo $luhn->getAccountNumbers();
 */
class LuhnAlgorithm
{
    private $acountNumbers;

    private $checkDigit = 0;

    private $total = 0;

    public function __construct($numbers)
    {

        //strip all letters and characters
        $numbers = preg_replace("/[^0-9]/","",$numbers);
        $this->accountNumbers = $numbers;
        //loop through
        for($i=0; $i<strlen($numbers)-1; $i++)
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

            //keep a running total
            $this->total += $numbers[$i];
        }

        //10 minus the total modded with 10
        $checkDigit = (10-($this->total % 10));
        $this->checkDigit = ($checkDigit == 10)? 0:$checkDigit;
    }

    public function check()
    {
        return (substr($this->accountNumbers, -1) == $this->checkDigit);
    }

    public function getAccountNumbers()
    {
        return $this->accountNumbers;
    }

}