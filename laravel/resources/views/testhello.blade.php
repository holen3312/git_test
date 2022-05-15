<h1>HELLO, USER</h1>
{{Auth::user() -> name}}

@auth()
    {{Auth::user()->email}}
    {{Auth::user()->Dob}}
    <p>secret text</p>
@endif
