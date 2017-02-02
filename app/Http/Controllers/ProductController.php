<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Product;

use App\Http\Requests\VoucherLimitRequest;

class ProductController extends Controller
{

	public function index(){
		
	}

		public function edit(){	
	}

		public function create(){
			return view('products.create');	
		
	}

		public function store(){
		
	}

			public function allProducts(){
				$products = new Product;
				$get_pdts = $products->get();
		return view('products.list',compact('get_pdts'));
	}

		public function update(){
		
	}

}
