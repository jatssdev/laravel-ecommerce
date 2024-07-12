@extends('layouts.admin')
@push('title')
    <title>Admin Dashboard</title>
@endpush

@section('admin')
<h1>Admin dashboard</h1>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Products</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>Dashboard</h1>
</body>

</html>

@endsection