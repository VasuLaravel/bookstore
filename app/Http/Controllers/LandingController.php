<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class LandingController extends Controller
{
    


    public function index()
    {
    	$books = Book::all();
    	return view('landing', ['page' => '/', 'books'=> $books]);
    }

}
