<?php

namespace App\Http\Controllers\Backends;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::get();
        return view('backends.about.index',[
          'abouts' => $abouts
        ]);
    }

    public function create()
    {
        return view('backends.about.create');
    }

    public function store(Request $request)
    {
           $dataAbout = $request->all();
           $file = $request->file('image');
           if(!$file){
              return back();
            }
           
              $filename = time() . '_' . $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $nameandPath = 'about/' . $filename .' . '. $extension;
              $file->storeAs('public/' . $nameandPath);
              $dataAbout['image'] = 'storage/' . $nameandPath;
              About::create($dataAbout);
             return redirect(route('backends.about.index'));
    }

    public function edit(About $about)
    {
        return view('backends.about.edit',[
            'about' => $about
        ]);
    }

    public function update(Request $request, About $about)
    { 
        $dataAbout = $request->all();
        $file = $request->file('image');
        if($file){
              $filename = time() . '_' . $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $nameandPath = 'about/' . $filename .' . '. $extension;
              $file->storeAs('public/' . $nameandPath);
              $dataAbout['image'] = 'storage/' . $nameandPath;
              File::delete($about->image);
        }
        $about->update($dataAbout);

        return redirect(route('backends.about.index'));
    }

    public function destroy(About $about)
    {
        $about->delete();
        File::delete($about->image);
        return redirect(route('backends.about.index'));
    }
}
