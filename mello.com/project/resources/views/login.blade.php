<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<meta name = "csrf" content="{{csrf_token()}}">
<form action="/show" method="post">
    @csrf
    <div>
        <label for="name">Login</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Submit</button>
</form>
{{--<script>--}}
{{--    function token() {--}}
{{--        const name = document.querySelector('input[name = "name"]').value;--}}
{{--        const password = document.querySelector('input[name = "password"]').value;--}}
{{--        let token;--}}
{{--        let formData = new FormData();--}}
{{--        formData.append('name', name);--}}
{{--        formData.append('password', password);--}}
{{--        if (!localStorage.getItem('token')) {--}}
{{--            fetch('/login', {--}}
{{--                method: "POST",--}}
{{--                headers: {--}}
{{--                    'Content-Type': 'application/json'--}}
{{--                },--}}
{{--                body: JSON.stringify({--}}
{{--                    "name": name,--}}
{{--                    "password": password--}}
{{--                })--}}
{{--            })--}}
{{--                .then(res => res.json())--}}
{{--                .then(data => {--}}
{{--                    console.log(data);--}}
{{--                    token = data.token;--}}
{{--                    localStorage.setItem('token', token);--}}
{{--                })--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
