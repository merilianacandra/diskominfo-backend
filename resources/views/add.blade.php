<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="POST" action="/book">
        @csrf
            <label for="">Nama Buku</label>
            <input type="text">

            <label for="">Penulis</label>
            <input type="text">
        </form>
    </div>
</body>
</html>