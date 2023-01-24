<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>     
    <div class="container">
        <div class="card bg-light mt-3">
            <?php if(session('messageSuccess')): ?>
                <div class="alert alert-success"> <?php echo e(session('messageSuccess')); ?></div>
            <?php endif; ?>
            <div class="card-header">
                Import csv/excel
            </div>
            <div class="card-body">
                <form action="/import/superheroes" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button id="import" class="btn btn-success">Import</button>
                </form>
            </div>
            <br>
            <div class="card-body">
                <form action="/import/superheroes/laravel-excel" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button id="importLibrary" class="btn btn-success">Import with library (excel supported)</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH D:\Documentos HD\Laravel\Consultr\exercise\resources\views/imports/superhero.blade.php ENDPATH**/ ?>