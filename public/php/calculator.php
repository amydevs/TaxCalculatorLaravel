<?php
class Calculator {
    function calculate($input, $brackets) {


        $taxToBePaid = 0;

        // $brackets = [
        //     $this->createTaxArray(0, 0.19, 18201),
        //     $this->createTaxArray(5092, 0.325, 45001),
        //     $this->createTaxArray(29467, 0.37, 120001),
        //     $this->createTaxArray(51667, 0.45, 180001)
        // ];
        $thresholds = array_column($brackets, 'minThreshold');
        array_multisort($thresholds, SORT_DESC, $brackets);


        foreach ($brackets as $key => $bracket) {
            if ($taxToBePaid == 0){
                $differenceOfBracketandInput = $input-($bracket["minThreshold"]-1);
                if ($differenceOfBracketandInput > 0){
                    // echo json_encode($bracket);
                    $taxToBePaid = ($differenceOfBracketandInput * $bracket["perDollarTax"]) + $bracket["baseTax"];
                }
            }
        }
        return $taxToBePaid;
    }
    function createTaxArray($baseTax, $perDollarTax, $minThreshold) {
        return array("baseTax"=>$baseTax, "perDollarTax"=>$perDollarTax, "minThreshold"=>$minThreshold);
    }
}

