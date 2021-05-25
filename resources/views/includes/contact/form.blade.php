<form id="contactForm" method="POST" action="{{ Request::getRequestUri() }}">
    @csrf
    <input type="text" id="fname" name="fname" placeholder="First Name">

    <input type="text" id="lname" name="lname" placeholder="Last Name">

    <textarea id="body" name="body" style="width: 75vw; height: 40vh; min-width: 300px;" placeholder="Type Your Message Here"></textarea>

    <button type="submit" value="Submit" style="grid-column: 1 / span 2;">Submit</button>
</form>
