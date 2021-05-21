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
{{ request()->get("taxableIncome") }}
