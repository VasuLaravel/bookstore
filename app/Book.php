<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public static function create($data)
    {
    	$inst = new Book();
        $inst->name = $data['name'];
        $inst->price = $data['price'];
        $inst->description = $data['description'];
        $inst->author = $data['author'];
        $inst->image = $data['image'];
        $inst->published_at = $data['published_at'];
        $inst->created_at = date('Y-m-d H:i:s');
        $inst->updated_at = date('Y-m-d H:i:s');
        $inst->save();
        return $inst;
    }

    public static function updateData($data)
    {
    	return Book::where('id', $data['id'])->update([
    		'name' => $data['name'],
    		'price' => $data['price'],
	        'description' => $data['description'],
	        'author' => $data['author'],
	        'image' => $data['image'],
	        'published_at' => $data['published_at'],
	        'updated_at' => date('Y-m-d H:i:s')
    	]);
    }

    public static function deleteBook($id)
    {
    	return Book::where('id', $id)->delete();
    }
}
