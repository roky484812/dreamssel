<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousal_gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ResourceController extends Controller
{
    public function index(){
        $carousels = Carousal_gallery::paginate(20);
        return view('admin.resources.carousal', ['carousels'=> $carousels]);
    }
    public function CarouselImageUploader(Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = '/images/carousel/';
                    $image_path = $this->saveImage($image, $path);
                    $Carousal_gallery = new Carousal_gallery();
                    $Carousal_gallery->image = $image_path;
                    $Carousal_gallery->save();
                }
            }
        }
        return redirect()->back()->with('success', 'New Carousel Image has been added successfully.');
    }

    public function saveImage($image, $path){
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0755, true); // Create the directory recursively
        }
        $manager = new ImageManager(new Driver());
        $ext = $image->getClientOriginalExtension();
        $image_name = time().uniqid().'.'.$ext;
        $image_path = $path.$image_name;
        $image_dest = public_path().$image_path;
        $image = $manager->read($image);
        $image->cover(1000, 350);
        $image->save($image_dest, 50);
        return $image_path;
    }

    public function deleteCarouselImage($id)
    {
        if ($id) {
            $carousal_gallery = Carousal_gallery::whereId($id)->first();
            $image_path = public_path() . $carousal_gallery->image;
            if (File::exists($image_path)) {
                try {
                    if (unlink($image_path)) {
                        Carousal_gallery::whereId($id)->delete();
                        return response()->json([
                            'status' => true,
                            'message' => 'Successfully deleted product image'
                        ]);
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Failed to delete product image'
                        ]);
                    }
                } catch (Exception $e) {
                    return response()->json([
                        'status' => false,
                        'message' => $e->getMessage()
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Image not found'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Please provide image identifier'
            ]);
        }
    }
}
