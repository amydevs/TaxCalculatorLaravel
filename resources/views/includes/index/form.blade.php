<div class="calculatorFormDiv">
    <form method="POST" action="{{ url()->current() }}/" id="calcform">
        @csrf
        <input style="grid-column: 1 / span 2;" type="text" id="taxableIncome" name="taxableIncome" placeholder="Taxable Income">
        <label>Resident Type: </label>
        <span>
            <input type="radio" id="male" name="residentType" value="resident"><label>Resident</label><br>
            <input type="radio" id="male" name="residentType" value="foreignResident"><label>Foreign Resident</label>
        </span>

        <button style="grid-column: 1 / span 2;" type="submit" form="calcform" value="submit">Submit</button>
    </form>
</div>
@php
    $taxableIncome = request()->get("taxableIncome");
    if (Str::length($taxableIncome) != 0) {
        include("php/calculator.php");
        $calculatorObject = new Calculator();
        echo $calculatorObject->calculate($taxableIncome);
    }
@endphp

<style>
    #calcform * {
        transition: var(--easeTransition);
    }
    #calcform {
        display: grid;
        grid-template-columns: auto auto;
        align-items: center;
        justify-content: center;
        padding: 10px;
        -moz-column-gap: 10px;
            column-gap: 10px;
        row-gap: 10px;
        border-radius: var(--universalBorderRadius);
        background: var(--layerWidgetBackground);
        box-shadow: var(--widgetBoxShadows);
    }
    #calcform label {
        width: -webkit-max-content;
        width: -moz-max-content;
        width: max-content;
    }
    #calcform button {
        background: var(--layerWidgetBackground);
        border: none;
        padding: 5px;
        border-radius: var(--universalBorderRadius);
        box-shadow: var(--widgetBoxShadows);
    }
    #calcform button:hover {
        cursor: pointer;
        background-color: var(--hoverColour);
        color: var(--defaultBackground);
    }
</style>
