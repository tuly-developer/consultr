<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>     
    <div class="container">
        <div class="card bg-light mt-3">
            @if(session('messageSuccess'))
                <div class="alert alert-success"> {{ session('messageSuccess')}}</div>
            @endif
            <div class="card-header">
                Import csv/excel
            </div>
            <div class="card-body">
                <form action="/import/superheroes" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control"  accept = '.csv'>
                    <br>
                    <button id="import" class="btn btn-success">Import</button>
                </form>
            </div>
            <br>
            <div class="card-body">
                <form action="/import/superheroes/laravel-excel" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control" accept = '.csv, .xlsx'>
                    <br>
                    <button id="importLibrary" class="btn btn-success">Import with library (excel supported)</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
