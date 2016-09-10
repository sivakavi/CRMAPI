<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class ImageController extends Controller {
    /**
     * Store an image.
     *
     * @return simple JSON response message
     */
    public function imageupload(Request $r)
    {
        $input = $r->except(['image']);
        print_r($input);
        // $image = Input::file('image');
        // $filename  = time() . '.' . $image->getClientOriginalExtension();
        // $destinationPath = public_path() . '\uploads';
        // if(!$image->move($destinationPath, $image->getClientOriginalName())) {
        //     return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        // }
        // return response()->json(['success' => 'upload/'.$filename], 200);
    }
}