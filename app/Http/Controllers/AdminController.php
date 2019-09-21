<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class AdminController extends Controller
{
    public function index()
    {
    	$books = Book::all();
    	return view('catelog', ['books' => $books]);
    }

    public function delete(Request $request)
    {
    	$id = $request->get('id');

    	$resp = Book::deleteBook($id);

    	if ($resp) {
			return response()->json([
				'status'=> 'success',
				'data' => $resp
			]);
		} else {
			return response()->json([
				'status'=> 'error'
			]);
		}
    }

    public function create(Request $request)
    {
    	$inputs = $request->all();
    	$type = '';

    	if ($inputs['input']) {
    		if (isset($inputs['input']['id']) && !empty($inputs['input']['id'])) {
    			$resp = Book::updateData($inputs['input']);
    			$type = 'update';
    		} else {
    			$resp = Book::create($inputs['input']);
    		}

    		if ($resp) {
    			return response()->json([
    				'status'=> 'success',
    				'data' => $resp,
    				'type' => $type
    			]);
    		} else {
    			return response()->json([
    				'status'=> 'error'
    			]);
    		}
    	}
    }
}
