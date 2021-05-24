<div class="calculatorFormDiv">
    <form method="POST" action="{{ Request::getRequestUri() }}" id="calcform">
        @csrf
        <input style="grid-column: 1 / span 2;" type="text" id="taxableIncome" name="taxableIncome" placeholder="Taxable Income" value='{{ request()->get("taxableIncome") }}' required>
        <button style="grid-column: 1 / span 2;" type="submit" form="calcform" value="submit">Submit</button>
    </form>
</div>

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
        box-shadow: var(--widgetHoverBoxShadows);
    }
    #taxableIncome {
        box-shadow: var(--widgetBoxShadows);
    }
    #taxableIncome:focus {
        box-shadow: var(--widgetHoverBoxShadows);
    }
</style>
