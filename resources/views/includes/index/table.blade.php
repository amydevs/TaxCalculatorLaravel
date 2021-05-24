<div class="tableContainer">
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
</div>

@section('head')
    @parent
    <style>
        .tableContainer {
            flex: 1;
            border-radius: var(--universalBorderRadius);
            overflow: hidden;
            border: 4px solid var(--textColour);
            box-shadow: var(--widgetBoxShadows);
            font-size: var(--specifiedFontSize);
        }
        .tableContainer > table, th, td {
            border: 1px solid var(--textColour);
            text-align: center;
            padding: 6px;
        }
        .tableContainer table {
            height: 100%;
            width: 100%;
            transform: scaleX(1.007) scaleY(1.007);
            border-radius: var(--universalBorderRadius);
            border-collapse: collapse;
        }
    </style>
@endsection
