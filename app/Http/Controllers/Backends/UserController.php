<?php

namespace App\Http\Controllers\Backends;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authUser = Auth::user(); 
        $datauser = User::where('id', $authUser->id )->get();
        if($authUser->role == 'admin'){
            $datauser = User::get();
        }
        return view('backends.users.index',[
        'users' => $datauser
        ]
    );
    }

    public function create()
    {
        return view('backends.users.create');
    }

    public function store(Request $request)
    {
        $userData = $request->all();
        $file = $request->file('image');
        if($file){
        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $nameandPath =  'users/' . $filename . ' . ' . $extension;
        $file->storeAs('public/' . $nameandPath);
        $userData['profile'] = 'storage/' . $nameandPath;

        }
        User::create($userData);
        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        return view('backends.users.edit',[
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        $userData = $request->all();
        $file = $request->file('image');
        if($file)
        {
            $filename = time() . '_' . $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $nameAndPath = 'users/'.$filename .' . '. $extension;
            $file->storeAs('public/' . $nameAndPath);
            $userData['profile'] = 'storage/'.$nameAndPath;
            File::delete($user->profile);
        }
        $user->update($userData);

        return redirect(route('users.index'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        File::delete($user->profile);
        return redirect(route('users.index'));
    }
}
