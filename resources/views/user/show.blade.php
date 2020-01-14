<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border=2>
    <tr>
        <td>用户id</td>
        <td>用户名称</td>
        <td>用户身份</td>
        <td>管理</td>
    </tr>
    @foreach ($data as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->status ==1?'普通库管员':'库管主管'}}</td>
        <td><a href="#">添加|删除</a></td>
    </tr>
    @endforeach
    </table>
</body>
</html>