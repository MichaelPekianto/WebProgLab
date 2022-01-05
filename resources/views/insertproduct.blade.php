<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/product.css">
    <title>Document</title>
</head>
<body>

@extends('home')
@section('content')
<div class="container" style="min-height: 71.8vh">
    <div class="insertprod">
        <div class="insert">
            Insert Product
        </div>

        <form action="/insertproduct" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category" id="category" class="form-select">
                        <option>Animal</option>
                        <option>Poultry</option>
                        <option>Dairy Products</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" autofocus>
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="desc" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input name="desc" type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" autofocus>
                    @error('desc')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input name="price" type="value" class="form-control @error('price') is-invalid @enderror" id="price" autofocus>
                    @error('price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    <input name="stock" type="value" class="form-control @error('stock') is-invalid @enderror" id="stock" autofocus>
                    @error('stock')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="price" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="image" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
</body>
</html>
