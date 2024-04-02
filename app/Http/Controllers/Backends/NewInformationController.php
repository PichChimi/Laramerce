<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewInformation;
use Illuminate\Support\Facades\File;


class NewInformationController extends Controller
{
    public function index()
    {
        $datainfors = NewInformation::get();
        return view('backends.newinformation.index', [
          'datainfors' => $datainfors
        ]);
    }

    public function create()
    {
        return view('backends.newinformation.create');
    }
    public function store(Request $request)
    {
        $datainfor = $request->all();
        $file = $request->file('image');
        if(!$file){
            return back();
        }
        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileandPath = 'newInformation/' . $filename . '.' . $extension;
        $file->storeAs('public/' . $fileandPath);
        $datainfor['image'] = 'storage/' .$fileandPath;
        NewInformation::create($datainfor);

        return redirect(route('backends.newinformation.index'));
    }

    public function show(NewInformation $newinformation)
    {
        return view('backends.newinformation.show', [
            'newinformation' => $newinformation
        ]);
    }

    public function edit(NewInformation $newinformation)
    {
        return view('backends.newinformation.edit',[
            'newinformation' => $newinformation
        ]);
    }

    public function update(Request $request, NewInformation $newinformation)
    {
        $datainfor = $request->all();
        $file = $request->file('image');
        if($file){
            $filename = time() . '_' . $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileandPath = 'newInformation/' . $filename . '.' . $extension;
            $file->storeAs('public/' . $fileandPath);
            $datainfor['image'] = 'storage/' .$fileandPath;
            File::delete($newinformation->image);
        }
        $newinformation->update($datainfor);
         return redirect(route('backends.newinformation.index'));
    }

    public function destroy(NewInformation $newinformation)
    {
        $newinformation->delete();
        File::delete($newinformation->image);
        return redirect(route('backends.newinformation.index'));
    }

    
}
