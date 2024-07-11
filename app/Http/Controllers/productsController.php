<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class productsController extends Controller
{
    public function seeall(Request $request)
    {
        $products = products::all();
    }
    public function store(Request $request)
    {
        $imagesPaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('public/images/products');
                $imagesPaths[] = Storage::url($path);
            }
            ;
            $prouct = new products();
            $prouct->title = $request->input('title');
            $prouct->price = $request->input('price');
            $prouct->discount = $request->input('discount');
            $prouct->category = $request->input('category');
            $prouct->img1 = $imagesPaths[0] ?? null;
            $prouct->img2 = $imagesPaths[1] ?? null;
            $prouct->img3 = $imagesPaths[2] ?? null;
            $prouct->img4 = $imagesPaths[3] ?? null;
            $prouct->img5 = $imagesPaths[4] ?? null;
            $prouct->save();
            return redirect()->back()->with('success', 'product added successfully');
        }
    }
    public function storeall(Request $request)
    {
        $earbuds = json_decode($request->input('earbuds'), true);

        foreach ($earbuds as $earbud) {
            $imagesPaths = $this->downloadAndStoreImages($earbud);

            $product = new Products();
            $product->title = $earbud['title'];
            $product->price = $earbud['price'];
            $product->discount = $earbud['discount'];
            $product->category = $earbud['category'];
            $product->img1 = $imagesPaths[0] ?? null;
            $product->img2 = $imagesPaths[1] ?? null;
            $product->img3 = $imagesPaths[2] ?? null;
            $product->img4 = $imagesPaths[3] ?? null;
            $product->img5 = $imagesPaths[4] ?? null;
            $product->save();
        }

        return response()->json(['success' => 'Products added successfully']);
    }

    private function downloadAndStoreImages($earbud)
    {
        $client = new Client();
        $imagePaths = [];

        foreach (range(1, 5) as $index) {
            $imgKey = "img$index";
            if (isset($earbud[$imgKey])) {
                $url = $earbud[$imgKey];
                $extension = pathinfo($url, PATHINFO_EXTENSION);
                $filename = Str::random(20) . '.' . $extension;
                $path = 'public/images/products/' . $filename;

                // Download image and store locally
                $response = $client->get($url);
                Storage::put($path, $response->getBody()->getContents());

                // Get the relative path for storing in database
                $imagePaths[] = Storage::url($path);
            }
        }

        return $imagePaths;
    }
}
