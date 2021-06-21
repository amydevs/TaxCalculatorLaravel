{{-- Written/Edited by June Yan (c) 2021 --}}
{{-- navigation for the selected bracket --}}
<div class="navbar">
    <ul style="margin:-10px; margin-bottom: 0px;">
        {{-- for each bracket, add a button for selecting a bracket --}}
        @foreach ($calculatorObject->allBrackets as $key=>$selectableBracket)
            <li>
                <a
                    class="{{ $key == $selectedBracket ? "active" : "" }}"
                    href="{{ $key == $defaultBracket ? url()->current() : request()->fullUrlWithQuery([$bracketQueryKey => $key]) }}"
                >
                    {{ $key }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
