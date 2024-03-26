<?php

namespace App\Http\Controllers\Admin;

use Exception;

use App\Models\New_araival;
use Illuminate\Http\Request;
use App\Models\Featured_image;
use App\Models\Carousel_gallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class LandingImageController extends Controller
{
    public function carouselBladeViewer(){
        $Carousel_gallery = Carousel_gallery::all();
        return view('admin.widgets.landingImageUpload.carousel', ['carousel_gallery' => $Carousel_gallery]);
    }
    public function featuredBladeViewer(){
        $featured_image = Featured_image::latest()->get();
        return view('admin.widgets.landingImageUpload.featuredImage', ['featured_image' => $featured_image]);
    }
    public function newAraivalBladeViewer(){
        $new_araival = New_araival::all();
        return view('admin.widgets.landingImageUpload.newAraival', ['new_araival' => $new_araival]);
    }
    public function CarouselImageUploader(Request $request) {
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = '/images/carousel/';
                    $image_path = $this->saveImage($image, $path);
                    $Carousel_gallery = new Carousel_gallery();
                    $Carousel_gallery->image = $image_path;
                    $Carousel_gallery->save();
                }
            }
        }

        return redirect()->back()->with('success', 'New Carousel Image has been added successfully.');
    }

    public function saveImage($image, $path)
    {
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0755, true); // Create the directory recursively
        }
        $manager = new ImageManager(new Driver());
        $ext = $image->getClientOriginalExtension();
        $image_name = time().uniqid().'.'.$ext;
        $image_path = $path . $image_name;
        $image_dest = public_path() . $image_path;
        $image = $manager->read($image);
        $image->cover(1000, 350);
        $image->save($image_dest, 50);
        return $image_path;
    }

    public function featuredImageUploader(Request $request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = '/images/featured/';
            $featured_image = new Featured_image();
            $image_path = $this->saveImage($image, $path);

            $featured_image = new Featured_image();
            $featured_image->image = $image_path;
            $featured_image->save();
        }

        return redirect()->back()->with('success', 'New Featured Image has been added successfully.');
    }
    public function newAraivalImageUploader(Request $request)
    {
        if (New_araival::count() > 0) {
            return redirect()->back()->with('error', 'New Araival Image already uploaded.');
        }


        if ($request->hasFile('large_potrait')) {
            $image = $request->file('large_potrait');
            $path = '/images/new_araival/';

            $new_araival = new New_araival();
            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0755, true); // Create the directory recursively
            }
            $manager = new ImageManager(new Driver());
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . 'large_potrait' . '.' . $ext;
            $image_path = $path . $image_name;
            $image_dest = public_path() . $image_path;
            $image = $manager->read($image);
            $image->cover(600, 795);
            $image->save($image_dest, 50);

            $new_araival->large_potrait = $image_path;
        }
        if ($request->hasFile('large_landscape')) {
            $image = $request->file('large_landscape');
            $path = '/images/new_araival/';

            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0755, true); // Create the directory recursively
            }
            $manager = new ImageManager(new Driver());
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . 'large_landscape' . '.' . $ext;
            $image_path = $path . $image_name;
            $image_dest = public_path() . $image_path;
            $image = $manager->read($image);
            $image->cover(600, 390);
            $image->save($image_dest, 50);
            $new_araival->large_landscape = $image_path;
        }
        if ($request->hasFile('lsm_potrait')) {
            $image = $request->file('lsm_potrait');
            $path = '/images/new_araival/';

            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0755, true); // Create the directory recursively
            }
            $manager = new ImageManager(new Driver());
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . 'lsm_potrait' . '.' . $ext;
            $image_path = $path . $image_name;
            $image_dest = public_path() . $image_path;
            $image = $manager->read($image);
            $image->cover(312, 412);
            $image->save($image_dest, 50);
            $new_araival->lsm_potrait = $image_path;
        }
        if ($request->hasFile('rsm_potrait')) {
            $image = $request->file('rsm_potrait');
            $path = '/images/new_araival/';

            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0755, true); // Create the directory recursively
            }
            $manager = new ImageManager(new Driver());
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . 'rsm_potrait' . '.' . $ext;
            $image_path = $path . $image_name;
            $image_dest = public_path() . $image_path;
            $image = $manager->read($image);
            $image->cover(312, 412);
            $image->save($image_dest, 50);
            $new_araival->rsm_potrait = $image_path;
        }

        if ($new_araival->save()) {
            return redirect()->back()->with('success', 'New Araival Image has been added successfully.');
        }
    }

    public function deleteCarouselImage($id)
    {
        if ($id) {
            $product_image = Carousel_gallery::whereId($id)->first();
            $image_path = public_path() . $product_image->image;
            if (File::exists($image_path)) {
                try {
                    if (unlink($image_path)) {
                        Carousel_gallery::whereId($id)->delete();
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

    public function deleteFeaturedImage($id)
    {
        if ($id) {
            $product_image = Featured_image::whereId($id)->first();
            $image_path = public_path() . $product_image->image;
            if (File::exists($image_path)) {
                try {
                    if (unlink($image_path)) {
                        Featured_image::whereId($id)->delete();
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

    public function deleteNewAraivalImage($id)
    {
        if ($id) {
            $product_image = New_araival::whereId($id)->first();
            $image_path = public_path() . $product_image->large_landscape;
            if (File::exists($image_path)) {
                try {
                    if (unlink($image_path)) {
                        New_araival::whereId($id)->delete();
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
