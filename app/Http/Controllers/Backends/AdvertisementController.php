<?php

namespace App\Http\Controllers\Backends;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\File;

class AdvertisementController extends Controller
{
       public function index()
       {
              $advertisements = Advertisement::get();
                     return view('backends.advertisement.index',[
                     'advertisements' => $advertisements
              ]);
       }

       public function create()
       {
            return view('backends.advertisement.create');
       }

       public function store(Request $request)
       {
           $dataAdverti = $request->all();
           $file = $request->file('image');
           if(!$file){
              return back();
            }
           
              $filename = time() . '_' . $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $nameandPath = 'advertisement/' . $filename .' . '. $extension;
              $file->storeAs('public/' . $nameandPath);
              $dataAdverti['image'] = 'storage/' . $nameandPath;
              Advertisement::create($dataAdverti);
           
           return redirect(route('backends.advertisement.index'));
       }

       public function edit(Advertisement $advertisement)
       {
           return view('backends.advertisement.edit',[
              'advertisement' => $advertisement
           ]);
       }

       public function update(Advertisement $advertisement, Request $request)
       {
            $dataAdver = $request->all();
            $file = $request->file('image');
            if($file){
                     $filename = time() . '_' . $file->getClientOriginalName();
                     $extension = $file->getClientOriginalExtension();
                     $nameandPath = 'advertisement/' . $filename .' . '. $extension;
                     $file->storeAs('public/' . $nameandPath);
                     $dataAdver['image'] = 'storage/' . $nameandPath;
                     File::delete($advertisement->image);
             }
             $advertisement->update($dataAdver);
            return redirect(route('backends.advertisement.index'));
       }

       public function show(Advertisement $advertisement)
       {
             
              return view('backends.advertisement.show',[
                     'advertisement' => $advertisement
              ]);
       }

       public function destroy(Advertisement $advertisement)
       {
              $advertisement->delete();
              File::delete($advertisement->image);
              return redirect(route('backends.advertisement.index'));
       }
}
