<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AjaxController extends Controller
{
    public function selectedItemDeleteById( Request $request ){
    $input = $request->all();
    
    if($input['data']['id'] && $input['data']['track']){
		if($input['data']['track'] == 'product_list'){
			if(Product::where('id', $input['data']['id'])->delete()){
			// PostTagChain::where('post_tag', $input['data']['id'])->delete();
				return response()->json(array('delete' => true));
			}
		}

	}
  }
}
