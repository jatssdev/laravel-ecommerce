@extends('layouts.admin')
@push('title')
    <title>Add Product</title>
@endpush

@section('admin')

<form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="min-h-screen md:px-20 pt-6">
        <div class="bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
            <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">ADD PRODUCT</h1>
            <div class="space-y-4">
                <div>
                    <label for="title" class="text-lx font-serif">Title</label>
                    <input name="title" type="text" placeholder="title" id="title"
                        class=" w-full outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>

                <div>
                    <label for="name" class="text-lx font-serif">Price </label>
                    <input name="price" type="text" placeholder="name" id="name"
                        class=" w-full outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>
                <div>
                    <label for="email" class="text-lx font-serif">Discount </label>
                    <input name="discount" type="text" placeholder="name" id="email"
                        class=" w-full outline-none py-1 px-2 text-md border-2 rounded-md" />
                </div>
                <div>
                    <label for="email" class="text-lx font-serif">Category </label>
                    <select name="category" class="w-full outline-none bg-white py-1 px-2 text-md border-2 rounded-md"
                        id="">
                        <option value="">Select Category</option>
                        <option value="earbuds">Earbuds</option>
                        <option value="earbuds">Shoes</option>
                        <option value="tishirts">Tishirts For Man</option>
                        <option value="tishortwomen">Tishirts For Women</option>
                    </select>
                </div>
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-lx font-serif mb-3">Upload Product Images</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-6">
                        <!-- Repeat this block for each image upload box -->
                        <div class="upload-box">
                            <label for="img1">
                                <img src="https://via.placeholder.com/150" alt="Placeholder" class="dummy-image">
                            </label>
                            <input name="images[]" type="file" id="img1" accept="image/*" class="upload-input"
                                onchange="previewImage(event, 0)">
                        </div>
                        <div class="upload-box">
                            <label for="img2">
                                <img src="https://via.placeholder.com/150" alt="Placeholder" class="dummy-image">
                            </label>
                            <input name="images[]" type="file" id="img2" accept="image/*" class="upload-input"
                                onchange="previewImage(event, 1)">
                        </div>
                        <div class="upload-box">
                            <label for="img3">
                                <img src="https://via.placeholder.com/150" alt="Placeholder" class="dummy-image">
                            </label>
                            <input name="images[]" type="file" id="img3" accept="image/*" class="upload-input"
                                onchange="previewImage(event, 2)">
                        </div>
                        <div class="upload-box">
                            <label for="img4">
                                <img src="https://via.placeholder.com/150" alt="Placeholder" class="dummy-image">
                            </label>
                            <input name="images[]" type="file" id="img4" accept="image/*" class="upload-input"
                                onchange="previewImage(event, 3)">
                        </div>
                        <div class="upload-box">
                            <label for="img5">
                                <img src="https://via.placeholder.com/150" alt="Placeholder" class="dummy-image">
                            </label>
                            <input name="images[]" type="file" id="img5" accept="image/*" class="upload-input"
                                onchange="previewImage(event, 4)">
                        </div>
                    </div>
                </div>
                <button
                    class="px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">ADD
                    POST</button>
            </div>
        </div>
    </div>
</form>
<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        const imgElement = input.previousElementSibling.children[0];

        reader.onload = function () {
            imgElement.src = reader.result;
        }

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection