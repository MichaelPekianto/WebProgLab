<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="font-family: 'Gill Sans MT'">
@extends('home')
@section('content')
    <div class="container" style="min-height: 71.8vh">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" style="width: 10%">User ID</th>
                <th scope="col" style="width: 60%">Username</th>
                <th scope="col" style="width: 30%"></th>
            </tr>
            </thead>
            <tbody>
            @for($i=0;$i<count($user);$i++)
                @if($user[$i]->id != 1)
                    <tr>
                        <th scope="row">{{$user[$i]->id}}</th>
                        <td>{{$user[$i]->name}}</td>
                        <form action="manageuser/{{$user[$i]->id}}" method="post">
                            @csrf
                            <td>
                                <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure you want to delete the user {{$user[$i]->name}}?')">
                                    Delete
                                </button>
                            </td>
                        </form>
                    </tr>
            @endif
            @endfor
        </table>
    </div>

@endsection
</body>
</html>
