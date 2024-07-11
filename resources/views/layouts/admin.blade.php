@if (!@session('admin'))
    <script>
        window.location.href = '/admin/login'
    </script>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('title')
    {{view('configs.head')}}

</head>

<body>
    {{view('admin.header')}}
    <div class="grid gap-12 grid-cols-9">
        <div class="col-span-2">
            {{view('admin.sidebar')}}
        </div>

        <div class="col-span-7 h-screen overflow-auto">
            @yield('admin')
        </div>
    </div>
</body>

</html>