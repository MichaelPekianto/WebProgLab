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
<body>
    <div class="row justify-content-center mb-3 mt-5">
        <div class="col-md-6">
            <form action="/search">
                @csrf
                <div class="search input-group row justify-content-center mb-3">
                    <label for="search" class="col-sm-2 col-form-label">Search</label>
                    <div class="row mb-3" style="width: 20rem">
                        <div class="col-sm-10">
                            <select name="category" id="category" class="form-select">
                                <option>Animal</option>
                                <option>Poultry</option>
                                <option>Dairy Products</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Product Name" name="search">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
