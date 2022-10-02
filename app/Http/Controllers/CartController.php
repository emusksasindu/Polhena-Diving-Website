<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class CartController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::orderBy('id', 'desc')->get();
        return view('admin.carts', $data);
    }

    public function user_index()
    {
        $cart = cart::where('user_id','=',Auth::id())->first();
        $data['products'] = $cart ->products()->get();
        $data['services'] = $cart ->services()->get();
        $data['cart'] = $cart;
        
        return view('cart.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        $data['qty'] = $this->sizeValidation($request);
        $product = product::find($request->item_id);
        $discountOfProduct = $product->selling_price * ($product->discount)/(100 - $product->discount);
        $data['user_id'] = Auth::id();
        $data['size'] = $request->size;
        $data['item_id'] = $request->item_id;
        $data['discount'] = $discountOfProduct * $data['qty'];
        $data['sub_total'] = ($product->selling_price + $discountOfProduct) * $data['qty'];
        $data['total'] = ($product->selling_price ) * $data['qty'];
        
        $cart = Cart::where('user_id','=',$data['user_id'])
        ->get();
        if($cart->isEmpty())
        {
            $this->store( $data);
            $this->addItem($data);
            
        }
        else
        {
            $cart = cart::where('user_id','=',$data['user_id'])->first();
            $products = $cart ->products()->get();
            $decision = true;
            foreach($products as $product)
            {
                
                if($product->id == $data['item_id'] && $product->pivot->size == $data['size'])
                {  
                    
                    $differentQty  = $data['qty'] - $product->pivot->qty;
                    $data['discount'] = $discountOfProduct * $differentQty;
                    $data['sub_total'] = ($product->selling_price + $discountOfProduct) * $differentQty;
                    $data['total'] = ($product->selling_price ) * $differentQty;
                    $this->updateExistingCart($data,$cart);
                    $this->updateExistingItem($data);
                    $decision = false;
                    break;
                }
                
            }

            if($decision == true)
            {
                
                $this->updateExistingCart($data,$cart);
                $this->addItem($data);
            }
            
        }
        return redirect()
        ->route('cart.user_index');
    }

    private function updateExistingCart($data,$cart)
    {
        
        
        $cart->discount =  $cart->discount + $data['discount'];
        $cart->sub_total = $cart->sub_total + $data['sub_total'];
        $cart->total = $cart->total + $data['total'];
        $cart->user_id =  $data['user_id'];
        $cart->save();

    }

    private function addItem($data)
    {
        $cart = cart::where('user_id','=',$data['user_id'])->first();
        $cart->products()->attach($data['item_id'],[
            'size' => $data['size'],
            'qty' => $data['qty']
        ]);


        
        
    }

    private function updateExistingItem($data)
    {
        $cart = cart::where('user_id','=',$data['user_id'])->first();
        $cart->products()
             ->wherePivot('size',$data['size'])
             ->updateExistingPivot($data['item_id'],[
            'qty' => $data['qty']
        ]);


        
        
    }
    

    private function sizeValidation($request)
    {
        if($request->size == 'xxl')
        {
            
            $request->validate([
                'xxl_qty' => ['required', 'numeric', 'min:1','max:'.$request->max_qty],
            ]);

            return $request->xxl_qty;
            
        }
        else if($request->size == 'xl')
        {
            $request->validate([
                'xl_qty' => ['required', 'numeric','min:1','max:'.$request->max_qty],
            ]);

            return $request->xl_qty;

        }
        else if($request->size == 'large')
        {
            $request->validate([
                'large_qty' => ['required', 'numeric','min:1','max:'.$request->max_qty],
            ]);

            return $request->large_qty;

        }
        else if($request->size == 'medium')
        {
            $request->validate([
                'medium_qty' => ['required', 'numeric','min:1','max:'.$request->max_qty],
            ]);

            return $request->medium_qty;

        }
        else if($request->size == 'small')
        {
            $request->validate([
                'small_qty' => ['required', 'numeric','min:1','max:'.$request->max_qty],
            ]);

            return $request->small_qty;

        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function store($data)
    {
        
       
        $cart = new Cart;
        $cart->discount = $data['discount'];
        $cart->sub_total = $data['sub_total'];
        $cart->total = $data['total'];
        $cart->user_id = $data['user_id'];
        $cart->save();

    }


    

   
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart  $cart)
    {
        $cart->delete();
        return redirect()->route('admin.carts')
            ->with('success', 'cart has been deleted successfully');
    }
}
