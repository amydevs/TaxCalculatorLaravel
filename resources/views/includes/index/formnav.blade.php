<div class="navbar">
    <ul style="margin:-10px; margin-bottom: 0px;">
        @foreach ($calculatorObject->allBrackets as $key=>$selectableBracket)
            <li>
                <a
                    class="{{ $key == $selectedBracket ? "active" : "" }}"
                    href="{{route(Route::current()->getName())}}{{ $key == $defaultBracket ? "" : "/?".$bracketQueryKey."=".$key }}"
                >
                    {{ $key }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
