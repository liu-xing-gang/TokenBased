<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button type="button" class="btn-gettoken">获取token</button>
    <button class="btn-getuser">获取用户信息</button>
    <button class="btn-destory">销毁token</button>
    <div id="result"></div>

    <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.btn-gettoken').on('click', function () {
                $.ajax({
                    type: 'post',
                    url: '/api/auth/login',
                    data: {email: '44444536@163.com', password: '123456'},
                    success: function (res) {
                        localStorage.setItem('token', 'access_token')
                    },

                })
            })

            $('.btn-getuser').on('click', function () {
                var token = localStorage.getItem('token')
                if(!token){
                    alert('token不存在')
                    return
                }

                $.ajax({
                    type: 'post',
                    url: '/getUser',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (res) {
                        console.log('获取用户信息: ', res)
                    }
                })
            })
        })
    </script>
</body>
</html>
