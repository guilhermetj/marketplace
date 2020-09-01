<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {
        $photoName = $request->get('photoName');
        if(Storage::disk('public')->exists($photoName)){
            Storage::disk('public')->delete($photoName);
        }
        $removePhoto = ProductPhoto::where('image', $photoName);

        $productId = $removePhoto->first()->product_id;
        $removePhoto->delete();
        return redirect()
            ->route('products.edit', ['product' => $productId])
            ->with('message', 'Foto removida com sucesso');
    }
}
