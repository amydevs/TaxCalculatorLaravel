<div>
<form method="POST" action="{{ url()->current() }}/" id="calcform">
    @csrf
    <input type="text" id="name" name="name">
    <button type="submit" form="calcform" value="submit">Submit</button>
</form>
