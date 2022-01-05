<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
@extends('home')
@section('content')
<div class="container" style="min-height: 67.2vh">
    <div class="me">
        <div class="reg">
            Register
        </div>

        <form action="/register" method="post">
            @csrf
            <div class="row mb-3">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        The name field is required
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail Address</label>
                <div class="col-sm-10">
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email3">
                    @error('email')
                    <div class="invalid-feedback">
                        The e-mail field is required
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password')
                    <div class="invalid-feedback">
                        The password field is required
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword4" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input name="confirmpw" type="password" class="form-control @error('confirmpw') is-invalid @enderror" id="confirmpw">
                    @error('confirmpw')
                    <div class="invalid-feedback">
                        Please input the same password
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" id="inputGender" class="form-select">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

@endsection
</body>
</html>
