<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/navbar.css')}}">
    <title>Document</title>

</head>

<body>
    @extends('home')
    @section('content')
    <div class="container" style="min-height: 71.8vh">
     <h2>Cart</h2>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Item Name</th>
            <th scope="col">Item Detail</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <div class="invisible">
            {{$count=0}}
        </div>
        @foreach($data as $item)

        <tr>
            <th scope="row">{{ $loop->index+1 }} </th>
            <td>{{ $item->getProduct->title }}</td>
            <td>{{ $item->getProduct->desc}}</td>
            <td>{{ $item->getProduct->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{$item->quantity*$item->getProduct->price }}</td>
            <div class="invisible">
                {{ $count+=$item->quantity*$item->getProduct->price}}
            </div>

        </tr>

        @endforeach
    </tbody>
</table>
    <p class="text-right">Grand Total: Rp.{{ $count }},-</p>
</div>
@endsection

</body>

</html>
