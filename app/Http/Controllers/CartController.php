<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CartController extends Controller
{
    public function index(){
        $data =Cart::where('user_id','=',auth()->user()->id)->get();
        return view('cart')->with('data', $data);
    }
    public function add(Request $request, $id)
    {
        $data = Products::find($id);

        $rules = [
            'quantity' => "numeric|min:1|lte:$data->stock"
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        $search = Cart::query()->where('product_id', '=', $data['id'])->first();
        if ($search != null) {
            $currProduct = $search;
            $currProduct->quantity = $request->quantity + $currProduct->quantity;
            // $currProduct->subTotal= $currProduct->quantity*$currProduct->getProduct->price;
            $currProduct->save();
        } else {
            Cart::create([

                'quantity' => $request->quantity,
                'product_id' => $data['id'],
                'subTotal' => $data['price'] * $request->quantity,
                'user_id'=>auth()->user()->id
            ]);
        }
        return redirect('/');
    }
    public function deletecart($id){
        Cart::find($id)->delete();
        return redirect()->back();
    }
    public function checkout(){
        $data=Cart::where('user_id','=',auth()->user()->id)->get();

            $transactions= new Transaction();
            $transactions->user_id=auth()->user()->id;
            $transactions->save();
            for ($i=0; $i <count($data) ; $i++) {
                $product=Products::find($data[$i]->product_id);
                $product->stock= $product->stock- $data[$i]->quantity;
                $product->save();
                TransactionDetail::create([
                    'name'=> $data[$i]->name,
                    'price'=> $data[$i]->price,
                    'quantity'=> $data[$i]->quantity,
                    'product_id'=> $data[$i]->product_id,
                    // 'subTotal'=> $data[$i]->subTotal,
                    'user_id'=>auth()->user()->id,
                    'transaction_id'=>$transactions->id
                ]);
            }

        Cart::where('user_id','=',auth()->user()->id)->delete();
        return redirect('/');
    }
    public function transaction(){
        $data=Transaction::where('user_id','=',auth()->user()->id)->get();
        return view('transaction',compact('data'));
    }
    public function detailtransaction($id){
        $data= TransactionDetail::where('transaction_id','=',$id)->get();
        return view('detailtransaction',compact('data'));
    }
}
