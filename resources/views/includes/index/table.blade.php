<!-- Written/Edited by June Yan (c) 2021 -->
<table class="taxTable">
    <thead>
        <tr>
            <th>Income Thresholds</th>
            <th>Base Tax</th>
            <th>Rate</th>
            <th>Tax Payable on This Income</th>
        </tr>
    </thead>
    <tbody>
        {{-- for each bracket in the bracket array, display the information in a table row --}}
        @foreach ($taxBrackets as $key=>$bracket)
            <tr>
                <td>${{ number_format($bracket["minThreshold"]) }} {{ array_key_exists($key+1, $taxBrackets) ? "to $".number_format($taxBrackets[$key+1]["minThreshold"] - 1) : "and Over" }}</td>
                <td>${{ number_format($bracket["baseTax"]) }}</td>
                <td>{{ $bracket["perDollarTax"] * 100 }}%</td>
                <td>${{ number_format($bracket["baseTax"]) }} plus ${{ $bracket["perDollarTax"] }} for each $1 over ${{ number_format($bracket["minThreshold"] - 1) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
