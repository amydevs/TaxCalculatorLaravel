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
        @foreach ($taxBrackets as $key=>$bracket)
            <tr>
                <td>${{ $bracket["minThreshold"] }} {{ array_key_exists($key+1, $taxBrackets) ? "to $".($taxBrackets[$key+1]["minThreshold"] - 1) : "and Over" }}</td>
                <td>${{ $bracket["baseTax"] }}</td>
                <td>{{ $bracket["perDollarTax"] * 100 }}%</td>
                <td>${{ $bracket["baseTax"] }} plus ${{ $bracket["perDollarTax"] }} for each $1 over ${{ $bracket["minThreshold"] - 1 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@section('head')
    @parent
    <style>
        .taxTable {
            width: 100%;
            border-collapse:separate;
            border: solid var(--textColour) 4px;
            border-radius: var(--universalBorderRadius);
            box-shadow: var(--widgetBoxShadows);
            font-size: var(--specifiedFontSize);
            border-spacing: 0;
            overflow: hidden;
            word-break: break-all;
        }
        .taxTable :is(td, th) {
            border-left: solid var(--textColour) 2px;
            border-top: solid var(--textColour) 2px;
            text-align: center;
            padding: 6px;
        }
        .taxTable th {
            border-top: none;
        }
        .taxTable td:first-child, th:first-child {
            border-left: none;
        }
    </style>
@endsection
