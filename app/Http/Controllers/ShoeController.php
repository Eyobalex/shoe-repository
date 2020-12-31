<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shoe;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Session;
class ShoeController extends Controller
{
    private $uploadPath;


    public function __construct ()
    {
//        $this->middleware('auth');
        $this->uploadPath = public_path('images');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = Shoe::all();
        return view('shoe.index', compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $shoe = new Shoe();
        return view('shoe.edit', compact('shoe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $shoe = new Shoe();
        $image = $request->file('image');
//        dd($request);
        if ( $image )
        {
            $fileName    = $image->getClientOriginalName();

            if ( $image->move($this->uploadPath, $fileName)){
                $shoe->image_path = $fileName;
            }else{
                $shoe->image_path = null;
            }
        }else{
            $shoe->image_path = null;
        }
        $shoe->name = $request->name;
        $shoe->price = $request->price;
        $shoe->currency = $request->currency;

        $shoe->owner_id = rand(1, 3);

        $shoe->created_at = \Carbon\Carbon::now();
        $shoe->updated_at = \Carbon\Carbon::now();

        $shoe->save();

        return redirect('shoe');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function addToCart(Request $request, $id)
    {
        $product = Shoe::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('shoe.index');
    }

    public function reduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoe.index');
    }

    public function removeItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shoe.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shoe.shoping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shoe.shoping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shoe.shoping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }


}
