<?php

namespace App\Http\Controllers\Client;

use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\Order_list;
use App\Models\New_araival;
use App\Models\Product_cart;
use Illuminate\Http\Request;
use App\Models\Featured_image;
use App\Models\Product_gallery;
use App\Models\Carousel_gallery;
use App\Models\Fav_product_list;
use App\Models\Product_category;
use App\Http\Controllers\Controller;
use App\Models\Flash_sale;
use App\Models\Product_attribute;
use App\Models\Product_sub_category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product_combination;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class HomePageController extends Controller
{
    public function homeViewer()
    {
        $categories = Product_category::all();
        $products = Product::limit(20)->latest()->where('status', 1)
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.*', 'product_countries.code as country_code')->get();
        $subcategories = Product_sub_category::all();
        $carousel_gallery = Carousel_gallery::all();
        $featured_image = Featured_image::first();
        $new_araival = New_araival::first();
        $flash_items = Flash_sale::leftJoin('products', 'products.id', 'flash_sales.product_id')
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->where('products.status', 1)
        ->orderBy('flash_sales.created_at')
        ->select('products.*', 'flash_sales.id as flash_sale_id', 'product_countries.code as country_code')
        ->get();


        return view('client.home', ['categories' => $categories, 'subcategories' => $subcategories, 'products' => $products, 'carousel_gallery' => $carousel_gallery, 'featured_image' => $featured_image, 'new_araival' => $new_araival, 'flash_items'=> $flash_items]);
    }

    public function thankyouViewer()
    {
        $categories = Product_category::all();
        $subcategories = Product_sub_category::all();
        return view('client.thankyou', ['categories' => $categories, 'subcategories' => $subcategories]);
    }

    public function search(Request $request)
    {
        $categories = Product_category::all();
        $query = $request->input('query');
        $products = Product::where('title', 'like', '%' . $query . '%')->get();
        $subcategories = Product_sub_category::all();
        return view('client.searchResult', ['categories' => $categories, 'subcategories' => $subcategories, 'products' => $products], compact('products', 'query'));
    }

    public function shopViewer()
    {
        $categories = Product_category::all();
        $subcategories = Product_sub_category::all();

        // Adjust the number of products per page

        $products = Product::paginate(32);
        return view('client.shop', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'products' => $products,
        ]);
    }
    public function viewFromSubCategory($category_name, $sub_category_id, $sub_category_name)
    {
        $categories = Product_category::all();
        $subcategories = Product_sub_category::all();

        // Adjust the number of products per page
        $products = Product::latest()->where(['products.status'=> 1, 'products.sub_category_id'=>$sub_category_id])
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.*', 'product_countries.code as country_code')->paginate(32);
        return view('client.subCategoryProductViewer', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'products' => $products,
            'category_name' => $category_name,
            'sub_category_name' => $sub_category_name,

        ]);
    }

    public function viewFromFavList()
    {
        $categories = Product_category::all();
        $subcategories = Product_sub_category::all();

        // Adjust the number of products per page
        if (auth()->user()) {
            $fav_product_lists = Fav_product_list::where('user_id', auth()->user()->id)->paginate(32);

            $products = Product::all();
            return view('client.favProductList', [
                'categories' => $categories,
                'subcategories' => $subcategories,
                'products' => $products,
                'fav_product_lists' => $fav_product_lists,


            ]);
        } else {
            return view('client.signIn', ['categories' => $categories, 'subcategories' => $subcategories]);
        }
    }

    public function addToFavList($product_id)
    {

        $user_id = auth()->user()->id;
        $fav_product_lists = Fav_product_list::where('user_id', auth()->user()->id)->where('product_id', $product_id)->first();


        if ($fav_product_lists) {


            return response()->json(['success' => true, 'message' => 'Already added to favourite lists :)']);
        } else {
            $fav_product_list = new Fav_product_list();
            $fav_product_list->user_id = $user_id;
            $fav_product_list->product_id = $product_id;

            if ($fav_product_list->save()) {
                return response()->json(['success' => true, 'message' => 'Favourite added successfully :)']);
            }
        }
    }


    public function removeFromFavList($fav_list_id)
    {

        // Get the currently authenticated user

        // Find the cart entry for the given product and user
        $listEntry = Fav_product_list::whereId($fav_list_id)
            ->first();


        if ($listEntry) {
            // Remove the cart entry (delete it from the database)
            $listEntry->delete();

            return response()->json(['success' => true, 'message' => ' Removed from favourite list successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Product not found in the fav list.']);
    }
    public function productViewer($id)
    {
        $product = Product::where(['status'=> 1, 'products.id'=> $id])
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->select('products.id', 'products.category_id', 'products.title', 'products.price', 'products.category_id', 'products.sub_category_id', 'products.distributor_price', 'products.thumbnail_image', 'products.sku', 'products.product_code', 'products.short_description', 'products.description', 'products.is_variational', 'products.created_at', 'product_countries.name as country_name', 'product_countries.code as country_code', 'product_categories.category_name', 'product_sub_categories.sub_category_name', 'products.view_count')
        ->first();
        $product_attributes = [];
        if($product->is_variational){
            $product_attributes = Product_attribute::where('product_id', $id)->with('attribute_values')->get();
        }
        $reviews = Review::where('product_id', $id)->get();
        $product->view_count = $product->view_count + 1;
        $product->save();
        $categories = Product_category::all();
        $subcategories = Product_sub_category::all();
        $products = Product::where(['category_id'=> $product->category_id, 'status'=> 1])
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.*', 'product_countries.code as country_code')
        ->limit(4)->get();
        $single_category = $categories->where('id', $product->category_id)->first();
        $single_sub_category = $subcategories->where('id', $product->sub_category_id)->first();
        $colors = (object)[];
        $sizes = (object)[];
        $product_galleries = Product_gallery::where('product_id', $id)->paginate(4);


        return view('client.viewProduct', ['categories' => $categories, 'subcategories' => $subcategories, 'product' => $product, 'products' => $products, 'single_category' => $single_category, 'single_sub_category' => $single_sub_category, 'colors' => $colors, 'sizes' => $sizes, 'product_galleries' => $product_galleries, 'reviews' => $reviews, 'product_attributes'=> $product_attributes]);
    }

    public function signUpViewer()
    {
        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();

        return view('client.signup', ['categories' => $categories, 'subcategories' => $subcategories]);
    }
    public function signInViewer()
    {
        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();

        return view('client.signin', ['categories' => $categories, 'subcategories' => $subcategories]);
    }
    public function cartViewer()
    {
        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();
        if (Auth::user()) {


            $product_carts = Product_cart::where('user_id', Auth::user()->id)->get();


            return view('client.cart', ['categories' => $categories, 'subcategories' => $subcategories, 'product_carts' => $product_carts]);
        } else {
            return view('client.signin', ['categories' => $categories, 'subcategories' => $subcategories]);
        }
    }
    public function updateCartQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Update the quantity in the database
        $cartItem = Product_cart::where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function product_combinations(Request $req){
        // return $req->all();
        $req->validate([
            'product_id'=> ['required', 'exists:products,id']
        ]);
        $string = '';
        foreach($req->input('attributes') as $attribute){
            $string .= $req->input($attribute);
        }
        $stringParts = str_split($string);
        sort($stringParts);
        $combination_unique = implode($stringParts);
        
        $product_combinations = Product_combination::where([
            'product_id'=> $req->input('product_id'),
            'combination_unique'=> $combination_unique
        ])->first();
        if($product_combinations){
            return response()->json([
                'status'=> true,
                'data'=>$product_combinations,
                'message'=> 'Combination fetched successfully.'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'message'=> 'Failed to fetch product combinations.'
            ]);
        }
    }

    public function accountViewer()
    {
        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();

        if (Auth::user()) {
            $user = Auth::user();
            return view('client.account', ['user' => $user, 'categories' => $categories, 'subcategories' => $subcategories]);
        } else {
            return view('client.signin', ['categories' => $categories, 'subcategories' => $subcategories])->with('success', 'You have to login first :)');
        }
    }
    public function aboutViewer()
    {
        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();

        return view('client.about', ['categories' => $categories, 'subcategories' => $subcategories]);
    }
    public function emailOTPViewer()
    {
        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();
        return view('client.emailotpauth', ['categories' => $categories, 'subcategories' => $subcategories]);
    }

    //Order views
    public function placeOrderViewerFromCart()
    {
        $product_carts = Product_cart::where('user_id', Auth::user()->id)->get();

        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();
        $user = Auth::user();
        return view('client.placeOrders', ['product_carts' => $product_carts, 'user' => $user, 'categories' => $categories, 'subcategories' => $subcategories]);
    }
    public function placeOrderViewer($product_id)
    {
        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();
        $user = Auth::user();
        $product = Product::whereId($product_id)->first();
        return view('client.placeOrder', ['product' => $product, 'user' => $user, 'categories' => $categories, 'subcategories' => $subcategories]);
    }

    public function placeOrder(Request $req)
    {
        // $validated_info = $req->validate([
        //     'phone' => 'required|numeric|max:15',
        //     'product_id' => 'required',
        //     'name' => 'required|max:20',
        // ]);

        // return $req->all();

        $product = Product::find($req->product_id);

        $order = new Order();
        $order_list = new Order_list();

        $order->phone = $req->input('phone');
        $order->name = $req->input('name');
        $order->address = $req->input('address');
        $shipping_cost = ($req->shipping == "60") ? 60 : 120;
        $order->total_price = $shipping_cost;
        $order->order_token = (string) mt_rand(10000, 99999);
        $order->status = '1';
        $order->save();


        $order_list->color = $req->input(
            'color',
            null
        );
        $order_list->size = $req->input('size', null);
        $order_list->product_id = $req->product_id;
        $order_list->quantity = 1;
        $order_list->price = $product->discounted_price;
        $order_list->order_id = $order->id;

        if ($order_list->save()) {
            return redirect()->route('home.thankyou')->with('success', 'Place order successfully done :)');
        } else {
            return redirect()->back()->with('error', 'Try again.');
        }
    }


    public function placeOrders(Request $req)
    {
        // $req->validate(['phone' => 'required|numeric|max:14',
        //     'address' => 'required',


        // ]);

        $user = Auth::user();

        $carts = Product_cart::where('user_id', $user->id)->get();
        $token = (string) mt_rand(10000, 99999);
        $order = new Order();
        if ($req->input('email') == null) {
            $order->email = $user->email;
        } else {
            $order->email = $req->input('email');
        }
        if ($req->input('phone') == null) {
            $order->phone = $user->phone;
        } else {
            $order->phone = $req->input('phone');
        }
        $order->address = $req->input('address');
        $order->name = $req->input('name');
        if ($req->shipping == "60") {
            $shipping_cost = 60;
        } else {
            $shipping_cost = 120;
        }
        $order->order_token = $token;
        $order->status = '1';
        $order->total_price = $shipping_cost;
        $order->save();
        foreach ($carts as $cart) {
            $product = Product::whereId($cart->product_id)->first();

            $order_list = new Order_list();

            $order_list->product_id = $cart->product_id;
            $order_list->quantity = $cart->quantity;
            $order_list->price = $product->discounted_price * $cart->quantity;
            $order_list->color = $cart->color_code;
            $order_list->size = $cart->size_value;
            $order_list->order_id = $order->id;
            $order_list->save();
            $cart->delete();
        }


        return redirect()->route('home.thankyou')->with('success', 'Place order succefully done :)');
    }

    public function pendingOrderView()
    {

        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();
        $orders = Order::where('user_id', auth()->user()->id)
            ->where('status', '1')
            ->orderBy('created_at', 'desc')->paginate(10);
        $products = Product::all();

        return view('client.orderStatus', [
            'orders' => $orders, 'products' => $products, 'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
    public function confirmedOrderView()
    {

        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();
        $orders = Order::where('user_id', auth()->user()->id)
            ->where('status', '2')
            ->orderBy('created_at', 'desc')->paginate(10);
        $products = Product::all();

        return view('client.orderStatus', [
            'orders' => $orders, 'products' => $products, 'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
    public function cancelledOrderView()
    {

        $categories = Product_category::paginate(12);
        $subcategories = Product_sub_category::all();
        $orders = Order::where('user_id', auth()->user()->id)
            ->where('status', '3')
            ->orderBy('created_at', 'desc')->paginate(10);
        $products = Product::all();

        return view('client.orderStatus', [
            'orders' => $orders, 'products' => $products, 'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
    public function reviewInput(Request $request)
    {
        if (auth()->user()) {
            $request->validate([
                'rating' => 'numeric',
                'review-text' => 'required',
            ]);

            $total_rating = 0;
            $rev_count = 0;

            $review = new Review();
            $review->name = auth()->user()->fname . ' ' . auth()->user()->lname;
            $review->rating = $request->input('rating');
            $review->review = $request->input('review-text');
            $review->product_id = $request->input('product_id');
            $review->save();

            $revs = Review::where('product_id', $request->input('product_id'))->get();
            if ($revs->count() > 0) {
                foreach ($revs as $rev) {
                    $total_rating += $rev->rating;
                    $rev_count++;
                }
                $average_rating = $total_rating / $rev_count;
            } else {
                $average_rating = 0; // No reviews yet
            }

            $product = Product::whereId($request->input('product_id'))->first();
            $product->rating = $average_rating;
            $product->rating_count = $rev_count;
            $product->save();

            return redirect()->back()->with('success', 'Your review has been saved successfully :)');
        } else {
            $categories = Product_category::paginate(12);
            $subcategories = Product_sub_category::all();
            return view('client.signin', ['categories' => $categories, 'subcategories' => $subcategories])->with('success', 'You have to login first :)');
        }
    }
}
