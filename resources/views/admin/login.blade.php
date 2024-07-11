<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{view('configs.head')}}
</head>
<body>
    
@if (@session('error'))
<p>{{@session('error')}}</p>
@endif

<form action="{{route('admin.login')}}" method="post">
    @csrf
    <div class=" min-h-screen md:px-20 pt-6">
        <div class="bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
            <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">LOGIN</h1>
            <div class="space-y-4">


                <div>
                    <label for="name" class="text-lx font-serif">Email </label>
                    <input name="email" type="text" placeholder="User Email" id="name"
                        class=" w-full outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>
                <div>
                    <label for="email" class="text-lx font-serif">Password </label>
                    <input name="password" type="text" placeholder="Password" id="email"
                        class=" w-full outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>

                <button
                    class="px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">LOGIN</button>
            </div>
        </div>
    </div>
</form>

</body>
</html>