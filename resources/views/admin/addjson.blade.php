@extends('layouts.admin')
@push('title')
    <title>Admin Dashboard</title>
@endpush

@section('admin')
<h1 class="text-center my-3 text-xl font-bold">Add Json Products</h1>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Products</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <form class="w-1/2 mx-auto" action="{{ route('admin.product.storeall') }}" method="POST">
        @csrf
        <textarea name="earbuds" class="border border-blue-400 h-40 text-blue-400 rounded-sm p-4  w-full"
            placeholder="Paste JSON data here"></textarea>
        <br>
        <button type="submit" class="bg-blue-800 px-4 py-1 my-2 rounded-sm text-white">Submit</button>
    </form>
</body>

</html>

@endsection