@extends('layouts.main')
@push('title')
    <title>Home Page</title>
@endpush

@section('main')

<form action="{{route('user.adduser')}}" method="post">
    @csrf
    <div class=" min-h-screen md:px-20 pt-6">
        <div class="bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
            <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">REGISTER</h1>
            <div class="space-y-4">
                <div>
                    <label for="avatar" class="text-lx font-serif"><img class="w-full"
                            src="{{asset('storage/images/userprofile.png')}}" alt=""></label>
                    <input name="avatar" type="file" id="avatar"
                        class=" w-full outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>
                <div>
                    <label for="title" class="text-lx font-serif">Name</label>
                    <input name="name" type="text" placeholder="User Name" id="title"
                        class=" w-full outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>

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
                    class="px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">REGISTER</button>
            </div>
        </div>
    </div>
</form>
@endsection