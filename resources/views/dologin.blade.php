<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/dologin')}}" method="post">
    @csrf
    姓名：<input type="text" name="name">
    密码：<input type="password" name="password">
    <button>提交</button>
    </form>
</body>
</html>