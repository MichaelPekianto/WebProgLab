<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/navbar.css')}}">

    <title>{{$products->title}}</title>
</head>
<body>
@extends('home')
@section('content')

@auth
    @if(auth()->user()->id != 1)
        <div class="container" style="min-height: 71.2vh">
            <div class="holder" style="display: flex;padding-left: 15%">
                <div class="img mt-10">
                    <img src="{{Storage::url($products->image)}}" class="rounded" alt="..."
                         style="width: 400px; height: 400px">
                </div>
                <div class="placehold" style="margin-left: 100px">
                    <h1 style="font-family: Bahnschrift; font-size: 60px">{{$products->title}}</h1>
                    <h2 style="font-family: 'Gill Sans MT';">Description :</h2>
                    <p style="font-family: 'Gill Sans MT'; font-size: 20px;width: 600px">{{$products->desc}}</p>
                    <h3 style="font-family: 'Gill Sans MT';">Stock :</h3>
                    <p style="font-family: 'Gill Sans MT'; font-size: 20px">{{$products->stock}}</p>
                    <h4 style="font-family: 'Gill Sans MT';">Price :</h4>
                    <p style="font-family: 'Gill Sans MT'; font-size: 20px">Rp. {{$products->price}},-</p>
                    <form class="row g-3" action="/details/{{$products->id}}" method="post">
                       @csrf

                        <div class="col-auto">
                            <label for="inputQuantity" class="visually-hidden">Quantity</label>
                            <input type="value" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"
                                   placeholder="Quantity" autofocus>
                                   @error('quantity')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container" style="min-height: 71.2vh">
            <div class="holder" style="display: flex;padding-left: 15%">
                <div class="img mt-10">
                    <img src="{{Storage::url($products->image)}}" class="rounded" alt="..."
                         style="width: 400px; height: 400px">
                </div>
                <div class="placehold" style="margin-left: 100px">
                    <h1 style="font-family: Bahnschrift; font-size: 60px">{{$products->title}}</h1>
                    <h2 style="font-family: 'Gill Sans MT';">Description :</h2>
                    <p style="font-family: 'Gill Sans MT'; font-size: 20px;width: 600px">{{$products->desc}}</p>
                    <h3 style="font-family: 'Gill Sans MT';">Stock :</h3>
                    <p style="font-family: 'Gill Sans MT'; font-size: 20px">{{$products->stock}}</p>
                    <h4 style="font-family: 'Gill Sans MT';">Price :</h4>
                    <p style="font-family: 'Gill Sans MT'; font-size: 20px">Rp. {{$products->price}},-</p>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="container" style="min-height: 71.2vh">
        <div class="holder" style="display: flex;padding-left: 15%">
            <div class="img mt-10">
                <img src="{{Storage::url($products->image)}}" class="rounded" alt="..."
                     style="width: 400px; height: 400px">
            </div>
            <div class="placehold" style="margin-left: 100px">
                <h1 style="font-family: Bahnschrift; font-size: 60px">{{$products->title}}</h1>
                <h2 style="font-family: 'Gill Sans MT';">Description :</h2>
                <p style="font-family: 'Gill Sans MT'; font-size: 20px;width: 600px">{{$products->desc}}</p>
                <h3 style="font-family: 'Gill Sans MT';">Stock :</h3>
                <p style="font-family: 'Gill Sans MT'; font-size: 20px">{{$products->stock}}</p>
                <h4 style="font-family: 'Gill Sans MT';">Price :</h4>
                <p style="font-family: 'Gill Sans MT'; font-size: 20px">Rp. {{$products->price}},-</p>
            </div>
        </div>
    </div>
@endauth
@endsection
</body>
</html>
