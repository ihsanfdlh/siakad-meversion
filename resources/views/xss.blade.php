<!DOCTYPE html>
<html>
<head>
    <title>Demo XSS Laravel</title>
</head>
<body>

    <h1>Demo XSS Laravel</h1>

    <h3>Output menggunakan Blade</h3>
    <p>{{ $nama }}</p>

    <h3>Output menggunakan HTML mentah</h3>
    <p>{!! $nama !!}</p>

</body>
</html>