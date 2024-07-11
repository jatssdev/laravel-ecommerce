@extends('layouts.admin')
@push('title')
    <title>Admin Dashboard</title>
@endpush

@section('admin')
<h1>Products</h1>

<!-- ====== Table Section Start -->
<section class="">
    <div class="container p-4">
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class=" overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-black text-center">
                                <th class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-2
                           
                           px-3
                           
                           border-l border-transparent
                           ">
                                    THUMBNAIL
                                </th>
                                <th class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-2
                           
                           px-3
                           
                           ">
                                    TITLE
                                </th>
                                <th class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-2
                           
                           px-3
                           
                           ">
                                    PRICE
                                </th>
                                <th class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-2
                           
                           px-3
                           
                           ">
                                    DISCOUNT
                                </th>
                                <th class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-2
                           
                           px-3
                           
                           ">
                                    STOCK
                                </th>
                                <th class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-2
                           
                           px-3
                           
                           border-r border-transparent
                           ">
                                    ACTIONS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td
                                        class="text-center p-1 text-dark font-medium text-base bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        <img class="h-20 mx-auto w-20 object-cover object-center" src="{{$product->img1}}" alt="">
                                    </td>
                                    <td
                                        class="text-center  text-dark font-medium text-base bg-white border-b border-[#E8E8E8] ">
                                        <p class="line-clamp-2"> {{$product->title}}</p>
                                    </td>
                                    <td
                                        class=" text-center text-dark font-medium text-base bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                        ₹{{$product->price}}
                                    </td>
                                    <td
                                        class=" text-center text-dark  font-medium text-base bg-white border-b border-[#E8E8E8]">
                                        {{$product->discount}}%
                                    </td>
                                    <td
                                        class=" text-center text-dark   font-medium      text-base bg-[#F3F6FF]       border-b border-[#E8E8E8] ">
                                        100
                                    </td>
                                    <td
                                        class="   text-center text-dark   font-medium text-base bg-white     border-b border-r border-[#E8E8E8] ">
                                        <a href="javascript:void(0)"
                                            class="border border-primary   py-2  px-6   text-primary    inline-block   rounded  hover:bg-primary hover:text-white  ">
                                            Sign Up
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection