<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Manufacture;
use Illuminate\Support\Facades\Auth;
use App\Models\Products_like;
use App\Models\Cart;
use App\Models\Cart_data;
use App\Models\Cart_data_detail;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //in ra các hãng
        view()->composer(['users.layout.header', 'users.layout.slide', 'users.layout.page.trangchu.manufacture', 'users.layout.page.loai', 'users.layout.page.detail', 'users.layout.page.login', 'users.layout.page.type', 'users.layout.page.checkout', 'admin.layout.master', 'admin.layout.page.quanlysanpham.update'] ,function($view){

            $manufacture = Manufacture::all();
            $view->with('manufacture', $manufacture);
        });
        //in ra số sản phẩm yêu thích
        view()->composer(['users.layout.header', 'users.layout.page.productlike'], function($view){
            if (Auth::check()) {
                $user = Auth::user();
                $id_user = $user->id;
                $ListProductLike = Products_like::where('id_users',$id_user)->get();
                $count = count($ListProductLike);
                $bahai = Cart_data::where('id_users', $id_user)->orderBy('id', 'desc')->limit(1)->get();
                if($bahai->count() != 0){
                    foreach($bahai as $xe){
                        $total = $xe->total;
                    }
                    $view->with(['ListProductLike'=> $ListProductLike, 'count'=> $count, 'total' => $total]);
                }

                $view->with(['ListProductLike'=> $ListProductLike, 'count'=> $count]);
            }
        });

        //cart
        view()->composer(['users.layout.header', 'users.layout.page.cart', 'users.layout.page.emails.EmailCheckout'], function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });

        //đến cart
        view()->composer(['users.layout.header'], function($view){
            if(Auth::check()){


                $user = Auth::user();
                $id_user = $user->id;

                $cart_select = Cart_data::where('id_users', $id_user)->orderby('id', 'desc')->limit(1)->get();
                if($cart_select->count() != 0){
                    foreach($cart_select as $cart){
                        $id_cart = $cart->id;
                        $cart_detail_select = Cart_data_detail::where('id_cart', $id_cart)->get();
                        $tong = 0;
                        $tongtiensanpham=0;
                        $tongtiengiohang=0;
                        foreach($cart_detail_select as $detail){
                            $quantity = $detail->quantity;
                            $price = $detail->price;
                            $tong+=$quantity;
                            $tongtiensanpham = $quantity * $price;
                            $tongtiengiohang+=$tongtiensanpham;
                        }
                        $view->with(['tong' => $tong, 'tongtiengiohang' => $tongtiengiohang]);
                    }
                }
                else{
                    $tong = 0;
                    $tongtiengiohang = 0;
                    $view->with(['tong' => $tong, 'tongtiengiohang' => $tongtiengiohang]);
                }

            }


        });


    }
}
