<?php
class Calculator {
    function calculate($input) {
        function createTaxArray($baseTax, $perDollarTax, $minThreshold) {
            return array("baseTax"=>$baseTax, "perDollarTax"=>$perDollarTax, "minThreshold"=>$minThreshold);
        }

        $taxToBePaid = 0;

        $brackets = [
            createTaxArray(0, 0.19, 18201),
            createTaxArray(5092, 0.325, 45001),
            createTaxArray(29467, 0.37, 120001),
            createTaxArray(51667, 0.45, 180001)
        ];
        $thresholds = array_column($brackets, 'minThreshold');
        array_multisort($thresholds, SORT_DESC, $brackets);


        foreach ($brackets as $key => $value) {
            if ($taxToBePaid == 0){
                $differenceOfBracketandInput = $input-($value["minThreshold"]-1);
                if ($differenceOfBracketandInput > 0){
                    echo json_encode($value);
                    $taxToBePaid = ($differenceOfBracketandInput * $value["perDollarTax"]) + $value["baseTax"];
                }
            }
        }
        return $taxToBePaid;
    }
}

