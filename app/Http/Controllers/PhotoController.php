<?php

namespace App\Http\Controllers;

use App\Models\Photo;

class PhotoController extends Controller 
{
    public function ShowPhotoAlbum() 
    {
        $photos = Photo::PHOTOS;

        return view('photo_album', compact('photos'));
    }
}


