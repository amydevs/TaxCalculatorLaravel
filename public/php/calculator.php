<!-- Written/Edited by June Yan (c) 2021 -->
<?php
class Calculator {
    public $allBrackets;

    function __construct() {
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

    function calculate($input, $selectedBracket) {
        // Gets the brackets array from $allBrackets key/name
        $brackets = $this->allBrackets[$selectedBracket];
        $taxToBePaid = 0;
        $thresholds = array_column($brackets, 'minThreshold');
        array_multisort($thresholds, SORT_DESC, $brackets);


        foreach ($brackets as $key => $bracket) {
            if ($taxToBePaid == 0){
                $differenceOfBracketandInput = $input-($bracket["minThreshold"]-1);
                if ($differenceOfBracketandInput > 0){
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

