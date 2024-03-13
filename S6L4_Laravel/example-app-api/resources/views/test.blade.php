<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
    <h1>Test API Laravel</h1>
    <div class="register">
        <button>Register</button>
    </div>
    <div class="login">
        <button>Login</button>
    </div>
    <div class="logout">
        <button>Logout</button>
    </div>
    <div class="user">
        <button>User</button>
    </div>

    <script>
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        document.querySelector('div.register').addEventListener('click', register);
        document.querySelector('div.login').addEventListener('click', login);
        document.querySelector('div.logout').addEventListener('click', logout);
        document.querySelector('div.user').addEventListener('click', getUser);

        function register(){
            let obj = {
                name: "Mario Rossi",
                email: "m.rossi@example.com",
                password: "Pa$$w0rd!",
                password_confirmation: "Pa$$w0rd!"
            }

            fetch('http://127.0.0.1:8000/register', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-CSRF-TOKEN": token
                    },
                    body: JSON.stringify(obj)
                })
                .then(response => response.json())
                .then(json => console.log(json))
                .catch(error => console.log(error))
        }

        function login(){
            let obj = {
                email: "admin@example.com",
                password: "Pa$$w0rd!"
            }

            fetch('http://127.0.0.1:8000/login', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-CSRF-TOKEN": token
                    },
                    body: JSON.stringify(obj)
                })
                .then(response => response.json())
                .then(json => console.log(json))
                .catch(error => console.log(error))
        }

        function logout() {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('http://127.0.0.1:8000/logout', {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-CSRF-TOKEN": token
                        },
                    method: 'POST',
                })
                .then(response => response.json())
                .then(json => console.log(json))
                .catch(error => console.log(error));
        }

        function getUser() {
            fetch('http://127.0.0.1:8000/api/user')
                .then(response => response.json())
                .then(json => console.log(json))
                .catch(error => console.log(error));
        }
    </script>
</body>
</html>
