<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image as Img;
use Illuminate\Http\Request;
use Image;
use File;

class UploadController extends Controller
{
    public $imagesPath = '';
    public $thumbnailPath = '';

    public function createDirecrotory()
    {
        $paths = [
            'image_path' => public_path('images/'),
            'thumbnail_path' => public_path('images/thumbs/')
        ];
        foreach ($paths as $key => $path) {
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
        }
        $this->imagesPath = $paths['image_path'];
        $this->thumbnailPath = $paths['thumbnail_path'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Img::get();
        return view('backend.images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.images.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'upload.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('upload')) {
            $this->createDirecrotory();
            foreach ($request->upload as $file) {
                $image = Image::make($file);
                // you can also use the original name
                $imageName = time() . '-' . $file->getClientOriginalName();
                $image->insert('watermark/watermark.png');
                // save original image
                $image->save($this->imagesPath . $imageName);
                // resize and save thumbnail
                $image->resize(150, 150);
                $image->save($this->thumbnailPath . $imageName);

                $upload = new Img();
                $upload->file = $imageName;
                $upload->save();

            }
            return redirect()->route('uploads.index')->with('success', 'Your images has been successfully Upload.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
