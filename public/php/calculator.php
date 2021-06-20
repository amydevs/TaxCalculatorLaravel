<!-- Written/Edited by June Yan (c) 2021 -->
<?php
class Calculator {
    public $allBrackets;

    function __construct() {
        // create arrays with bracket tables for residents and foreign residents
        $this->allBrackets = [
            "Residents" => [
                $this->createTaxArray(0, 0, 1),
                $this->createTaxArray(0, 0.19, 18201),
                $this->createTaxArray(5092, 0.325, 45001),
                $this->createTaxArray(29467, 0.37, 120001),
                $this->createTaxArray(51667, 0.45, 180001)
            ],
            "Foreign Residents" => [
                $this->createTaxArray(0, 0.325, 1),
                $this->createTaxArray(39000, 0.37, 120001),
                $this->createTaxArray(61200, 0.45, 180001),
            ]
        ];
    }
    // this helper function is used to make created these arrays a bit less work to type and less messier.
    function createTaxArray($baseTax, $perDollarTax, $minThreshold) {
        return array("baseTax"=>$baseTax, "perDollarTax"=>$perDollarTax, "minThreshold"=>$minThreshold);
    }

    function calculate($input, $selectedBracket) {
        // Gets the brackets array from $allBrackets key/name
        $brackets = $this->allBrackets[$selectedBracket];
        $taxToBePaid = 0;
        $thresholds = array_column($brackets, 'minThreshold');
        array_multisort($thresholds, SORT_DESC, $brackets);

        // foreach tax bracket, firstly check if taxToBePaid is still the initial value.
        foreach ($brackets as $key => $bracket) {
            if ($taxToBePaid == 0){
                // Then see if the difference of the input and threshold is less than 0, if so skip to next loop.
                $differenceOfBracketandInput = $input-($bracket["minThreshold"]-1);
                if ($differenceOfBracketandInput > 0){
                    // If not, then set taxToBePaid to the difference * perDollarTax plus the baseTax.
                    $taxToBePaid = ($differenceOfBracketandInput * $bracket["perDollarTax"]) + $bracket["baseTax"];
                }
            }
        }
        return $taxToBePaid;
    }
}

