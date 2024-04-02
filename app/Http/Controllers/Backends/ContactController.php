<?php

namespace App\Http\Controllers\Backends;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Cart;

class ContactController extends Controller
{
     
   public function index()
   {
      $contacts = Contact::get(); 
       return view('backends.contact.index',[
          'contacts' => $contacts
       ]);
   }
   public function store(Request $request)
     {
        $contactData = $request->all();
        Contact::create($contactData);
        $qtyadd = Cart::Where('user_id', Auth::id())->count();
        return view('pages.contactThank',[
         'qtyadd' => $qtyadd
        ]);
     }
     
     public function show(Contact $contact)
     {
          return view('backends.contact.show',[
            'contact' => $contact
          ]);
     }
     public function destroy(Contact $contact)
     {
          return redirect(route('backends.contact.index'));
     }
}
