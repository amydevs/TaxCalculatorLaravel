{{-- Written/Edited by June Yan (c) 2021 --}}
<table>
    <thead>
        <tr>
            <th>Your Bracket</th>
            <th>Taxable Income</th>
            <th>Tax to be Paid</th>
            <th>Taxable Income after Tax Payment</th>
        <tr>
    </thead>
    <tbody>
        <tr>
            <td>
                @php
                    $hasTaxBracketSpecLoopFinished = false;
                    // find the bracket thats the result belongs to
                    foreach ($brackets as $key => $value) {
                        if(!$hasTaxBracketSpecLoopFinished) {
                            if(array_key_exists($key+1, $brackets)){
                                if($taxableIncome >= $value["minThreshold"] AND $taxableIncome <= $brackets[$key+1]["minThreshold"]-1) {
                                    echo "$".number_format($value["minThreshold"])." to $".number_format($brackets[$key+1]["minThreshold"] - 1);
                                    $hasTaxBracketSpecLoopFinished = true;
                                }
                            }
                            else {
                                echo "$".number_format(end($brackets)["minThreshold"])." and Over";
                                $hasTaxBracketSpecLoopFinished = true;
                            }
                        }
                    }
                @endphp
            </td>
            <td>${{ number_format($taxableIncome) }}</td>
            {{-- number_format is to add commas for number readability, the reason these ones look different are becuase they have 2 decimal places --}}
            <td>${{ number_format($calculatorObject->calculate($taxableIncome, $selectedBracket), 2, '.', ',') }}</td>
            <td>${{ number_format($taxableIncome - ($calculatorObject->calculate($taxableIncome, $selectedBracket)), 2, '.', ',') }}</td>
        </tr>
    </tbody>
</table>
