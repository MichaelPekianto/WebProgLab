<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/item.css">
    <title>Document</title>
</head>
<body style="font-family: 'Gill Sans MT'">
@extends('home')
@section('content')

<div class="container">
    @if(Request::path() == 'search')
        @include('search')
    @endif

    @auth
        @if(auth()->user()->id != 1)
            <div class="container" style="min-height: 71.2vh">
                <div class="place">
                    <div class="row">
                        @for($i=0; $i<count($products);$i++)
                            <div class="col sm-4 mb-5">
                                <div class="card" style="width: 20rem;">
                                    <img src="{{Storage::url($products[$i]->image)}}" class="card-img-top"
                                         style="width: 20rem; height: 14rem" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$products[$i]->title}}</h5>
                                        <p class="card-text">{{$products[$i]->desc}}</p>
                                        <p class="card-text">Rp. {{$products[$i]->price}}</p>
                                        <a href="/details/{{$products[$i]->id}}" class="btn btn-primary">Product Details</a>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        @else
            <div class="container" style="min-height: 71.2vh">
                <div class="place">
                    <div class="row">
                        @for($i=0; $i<count($products);$i++)
                            <div class="col sm-4 mb-5">
                                <div class="card" style="width: 20rem;">
                                    <img src="{{Storage::url($products[$i]->image)}}" class="card-img-top"
                                         style="width: 20rem; height: 14rem" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$products[$i]->title}}</h5>
                                        <p class="card-text">{{$products[$i]->desc}}</p>
                                        <p class="card-text">Rp. {{$products[$i]->price}}</p>
                                        <a href="/updateproduct/{{$products[$i]->id}}" class="btn btn-danger">Update Product</a>
                                        <a href="/details/{{$products[$i]->id}}" class="btn btn-primary">Product Details</a>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="container" style="min-height: 71.2vh">
            <div class="place">
                <div class="row">
                    @for($i=0; $i<count($products);$i++)
                        <div class="col sm-4 mb-5">
                            <div class="card" style="width: 20rem;">
                                <img src="{{Storage::url($products[$i]->image)}}" class="card-img-top"
                                     style="width: 20rem; height: 14rem" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$products[$i]->title}}</h5>
                                    <p class="card-text">{{$products[$i]->desc}}</p>
                                    <p class="card-text">Rp. {{$products[$i]->price}}</p>
                                    <a href="/details/{{$products[$i]->id}}" class="btn btn-primary">Product Details</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    @endauth

    <div class="page" style="display: flex; justify-content: center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{$products->previousPageUrl()}}">Previous</a>
                </li>
                @for($i=1;$i<=$products->lastPage();$i++)
                    @if($i == $products->currentPage())
                        <li class="page-item disabled"><a href="#" class="page-link">{{$i}}</a></li>
                    @else
                        <li class="page-item"><a href="{{$products->url($i)}}" class="page-link">{{$i}}</a></li>
                    @endif
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{$products->nextPageUrl()}}">Next</a>
                </li>
            </ul>

        </nav>
    </div>
</div>


@endsection
</body>
</html>
