<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    table {
        table-layout: fixed;
    }
</style>
<body>
    <div class="container">
        <br>
        @yield('content')
    </div>
</body>
</html>

<script>
    function getTableSize(e){
        e.preventDefault();
        document.getElementById('getTable').click();
    }
</script>
