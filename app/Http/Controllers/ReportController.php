<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cased as Cased;


class ReportController extends Controller
{
    /**
     * Display a listing for case closed product list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Cased::closecase()->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on year basis.
     *
     * @return \Illuminate\Http\Response
     */

    public function getYear($year)
    {
        $cases = Cased::closecase()->whereYear('created_at', '=', $year)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on year and month basis.
     *
     * @return \Illuminate\Http\Response
     */


    public function getYearMonth($year, $month)
    {
        $cases = Cased::closecase()->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on Product basis.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProduct($product)
    {
        $cases = Cased::closecase()->where('product_id', '=', $product)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on Product via year basis.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProductYear($product, $year)
    {
        $cases = Cased::closecase()->where('product_id', '=', $product)->whereYear('created_at', '=', $year)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on Product via year and month basis.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProductYearMonth($product, $year, $month)
    {
        $cases = Cased::closecase()->where('product_id', '=', $product)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on User basis.
     *
     * @return \Illuminate\Http\Response
     */

    public function getUser($user)
    {
        $cases = Cased::closecase()->where('user_id', '=', $user)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on User via year basis.
     *
     * @return \Illuminate\Http\Response
     */

    public function getUserYear($user, $year)
    {
        $cases = Cased::closecase()->where('user_id', '=', $user)->whereYear('created_at', '=', $year)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }

    /**
     * Display a listing for case closed product list based on User via year and month basis.
     *
     * @return \Illuminate\Http\Response
     */

    public function getUserYearMonth($user, $year, $month)
    {
        $cases = Cased::closecase()->where('user_id', '=', $user)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get()->toArray();

        $product = $this->productCalculation($cases);
        return \Response::json($product);
        
    }



    /**
     * Formating a Product.
     *
     * @return Product array
     */


    private function productCalculation($cases){

        $product = [];
        foreach ($cases as $case) {
            $prod_id = $case['product']['id'];
            $product[$prod_id]['product_id'] = $prod_id;
            $product[$prod_id]['category_id'] = $case['product']['category_id'];
            $product[$prod_id]['prod_name'] = $case['product']['prod_name'];
            if(!array_key_exists('tot_qty',$product[$prod_id])){
                $product[$prod_id]['tot_qty'] = 0;
            }
            $product[$prod_id]['tot_qty'] = $product[$prod_id]['tot_qty'] + $case['qty'];
            $product[$prod_id]['total_price'] = $case['product']['price']*$product[$prod_id]['tot_qty'];
        }
        return $product;
    }


}
