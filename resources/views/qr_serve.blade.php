<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Địa chỉ: {{ $data->maintainer->name }}</p>
    <p>Xe: {{ $data->bike_model }}</p>
    <p>Biển số: {{ $data->plate }}</p>
    <p>Tổng chi phí: {{ $data->total }} &#8363;</p>
    <p>Chi tiết: {{ $data->details }}</p>
    <div>
        @foreach ($data->images as $image)
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Maintenance Image" style="max-width: 200px; margin: 10px;">
        @endforeach
    </div>

</body>
</html>
