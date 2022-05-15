<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "csrf" content="{{csrf_token()}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<form action="" method="post" class="login">
    @csrf
    <div>
        <label for="name">Login</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    <button onclick="token()">Submit</button>
</form>

<form action="" method="post" class="search_for_users d-none">
    @csrf
    <div class="row">
        <div class="col-xs-10">
            <div class="form-group">
                <input type="text" class="form-control mt-1 mb-3" name="text_input_user" id="search_user" placeholder="Search for users">
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group">
                <a href="#" class="btn btn-success" onclick="showSearchResult()">Search</a>
            </div>
        </div>
    </div>
</form>
<div class="row mt-3">
    <div class="table-responsive d-none">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>User name</th>
            </tr>
            </thead>
            <tbody class="search-users"></tbody>
        </table>
    </div>
</div>

<div class="user d-none">
    <h1>Users: </h1>
    <ol class="users"></ol>
</div>

<form action="" method="post" class="search_for_skills d-none">
    @csrf
    <div class="row">
        <div class="col-xs-10">
            <div class="form-group">
                <input type="text" class="form-control mt-1 mb-3" name="text_input_skill" id="search_skill" placeholder="Search for skills">
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group">
                <a href="#" class="btn btn-success" onclick="showSearchSkill()">Search</a>
            </div>
        </div>
    </div>
</form>
<div class="row mt-3">
    <div class="skill-responsive d-none">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Skill name</th>
            </tr>
            </thead>
            <tbody class="search-skills"></tbody>
        </table>
    </div>
</div>


<div class="skill d-none">
    <h1>Skills: </h1>
    <ol class="skills"></ol>
</div>

<button class="sortingA d-none" onclick="sortingA()">sortingA</button>
<button class="sortingZ d-none" onclick="sortingZ()">sortingZ</button>
<button class="sorting-default d-none" onclick="getItemsByDefault()">default</button>

<div class="row mt-3 show-Items d-none">
    <div class="header">
        All items
    </div>
    <div class="body">
        <h4 class="name"></h4>
        <p class="text"></p>
    </div>

</div>


<button class="logout d-none" onclick="deleteToken()">Logout</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function token() {
        const name = document.querySelector('input[name = "name"]').value;
        const password = document.querySelector('input[name = "password"]').value;
        let token;
        let formData = new FormData();
        formData.append('name', name);
        formData.append('password', password);
        if (!localStorage.getItem('token')) {
            fetch('/api/login', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    "name": name,
                    "password": password
                })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.token) {
                        token = data.token;
                        localStorage.setItem('token', token);
                    }
                })
        }
    }

    if (localStorage.getItem('token')) {
        getItemsByDefault();
        function getItemsByDefault() {
            $('.users').html('');
            $('.skills').html('');
            fetch('api/users')
                .then(function (response) {
                    response.json().then(function (data) {
                        for (let index in data) {
                            $(`.users`).append(`
                                <li><b><a href="#" onclick="showItem(${data[index].id})" >${data[index].name}</a></b></li>
                                 `)
                        }
                    })
                })
            fetch('api/skills')
                .then(function (response) {
                    response.json().then(function (data) {
                        for (let index in data) {
                            $(`.skills`).append(`
                                    <li><b><a href="#" onclick="showUsers(${data[index].id})" >${data[index].name}</a></b></li>
                                     `)
                        }
                        $('.skill').removeClass('d-none');
                        $('.user').removeClass('d-none');
                        $('.login').addClass('d-none');
                        $('.logout').removeClass('d-none');
                        $('.search_for_users').removeClass('d-none');
                        $('.search_for_skills').removeClass('d-none');
                        $('.sortingA').removeClass('d-none');
                        $('.sortingZ').removeClass('d-none');
                        $('.sorting-default').removeClass('d-none');

                    })
                })
        }
    }

    function deleteToken() {
        localStorage.removeItem('token');
        $('.skill').addClass('d-none');
        $('.user').addClass('d-none');
        $('.login').removeClass('d-none');
        $('.logout').addClass('d-none');
        $('.search_for_users').addClass('d-none');
        $('.search_for_skills').addClass('d-none');
        $('.show-Items').addClass('d-none');
        $('.table-responsive').addClass('d-none');
        $('.sortingA').addClass('d-none');
        $('.sortingZ').addClass('d-none');
        $('.sorting-default').addClass('d-none');
        $('.skill-responsive').addClass('d-none');

    }

    function showItem(id) {
        fetch('api/user/' + id)
            .then(function (response) {
                response.json().then(function (data) {
                    $('.name').text(data.name);
                    $('.text').html('');
                    for (let index in data.skills) {
                        $(`.text`).append(`
                           <ul>${data.skills[index].name} - ${data.skills[index].experience}</ul>
                                     `)
                        $(".show-Items").removeClass("d-none");
                    }
                    }
                ) }
            )
    }

    function showUsers(id) {
        fetch('api/skill/' + id)
            .then(function (response) {
                response.json().then(function (data) {
                    $('.text').html('');
                    $('.name').html('');
                    $('.name').append(`${data.name} - ${data.experience}`) ;

                    for (let index in data.users) {
                        $(`.text`).append(`
                        <ul>${data.users[index].name}</ul>
                        `)
                            $(".show-Items").removeClass("d-none");
                        }

                    }

                ) }
            )
    }

    $(document).ready(function () {
        fetch_user_data();
        function fetch_user_data(text_input_user = '') {
            $.ajax({
                url: "/api/find/users",
                type: "GET",
                dataType: "json",
                data: {
                    text_input_user: text_input_user
                },
                success: function (data) {
                    $('.search-users').html('');
                    for (let index in data) {
                        $('.search-users').append(`
                                <tr>
                                    <td>${data[index].name}</td>
                                </tr>
                            `)
                    }
                }
            })
        }

        $(document).on('keyup', '#search_user', function () {
            let text_input_user = $(this).val();
            fetch_user_data(text_input_user);
        });
    });
    function showSearchResult() {
        $('.table-responsive').removeClass('d-none');
    }

    $(document).ready(function () {
        fetch_skill_data();
        function fetch_skill_data(text_input_skill = '') {
            $.ajax({
                url: "/api/find/skills",
                type: "GET",
                dataType: "json",
                data: {
                    text_input_skill: text_input_skill
                },
                success: function (data) {
                    $('.search-skills').html('');
                    for (let index in data) {
                        $('.search-skills').append(`
                                <tr>
                                    <td>${data[index].name}</td>
                                </tr>
                            `)
                    }
                }
            })
        }

        $(document).on('keyup', '#search_skill', function () {
            let text_input_skill = $(this).val();
            fetch_skill_data(text_input_skill);
        });
    });
    function showSearchSkill() {
        $('.skill-responsive').removeClass('d-none');
    }

    function sortingA() {
        $('.users').html('');
        $('.skills').html('');
        fetch('api/sortingUsersA')
            .then(function (response) {
                response.json().then(function (data) {
                    for (let index in data) {


                            $(`.users`).append(`
                                 <li><b><a href="#" onclick="showItem(${data[index].id})" >${data[index].name}</a></b></li>
                                  `)

                    }
                })
            })
        fetch('api/sortingSkillsA')
            .then(function (response) {
                response.json().then(function (data) {
                    for (let index in data) {

                            $(`.skills`).append(`
                                     <li><b><a href="#" onclick="showUsers(${data[index].id})" >${data[index].name}</a></b></li>
                                      `)

                    }
                })
            })
            }

    function sortingZ() {
        $('.users').html('');
        $('.skills').html('');
        fetch('api/sortingUsersZ')
            .then(function (response) {
                response.json().then(function (data) {
                    for (let index in data) {


                        $(`.users`).append(`
                                 <li><b><a href="#" onclick="showItem(${data[index].id})" >${data[index].name}</a></b></li>
                                  `)

                    }
                })
            })
        fetch('api/sortingSkillsZ')
            .then(function (response) {
                response.json().then(function (data) {
                    for (let index in data) {

                        $(`.skills`).append(`
                                     <li><b><a href="#" onclick="showUsers(${data[index].id})" >${data[index].name}</a></b></li>
                                      `)

                    }
                })
            })
    }

</script>
</body>
</html>

