<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {

        return view('index');
    }

    public function create(ContactRequest $request)
    {
        $form = $request->all();
        Contact::create($form);
        $param = [
            'full_name'=>$request->full_name,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'postcode'=>$request->postcode,
            'address'=>$request->address,
            'building_name'=>$request->building_name,
            'opinion'=>$request->opinion
        ];
        return view('add', $param);
    }

    public function edit(Request $request)
    {
        if($request->get('back')){
            return redirect('/')->withInput();
        }

        return view('thanks');
    }

    public function find(Request $request)
    {
        $contacts = Contact::orderBy('created_at')->paginate(10);

        $param = [
            'contacts' => $contacts,
        ];

        return view('find', ['input' => ''], $param);
    }

    public function search(Request $request)
    {
        
        $contacts = $request->all();
        $contacts = Contact::where('full_name')->get();
        $gender = $_POST['gender'];

        $query = Contact::query();
            if ($request->gender==1){
                $query->where('gender', $request->gender);
            }
            if ($request->gender==2){
                $query->where('gender', $request->gender);
            }
            if ($request->full_name){
                $query->where('full_name', 'LIKE BINARY',"%{$request->full_name}%");
            }
            if ($request->email){
                $query->where('email', $request->email);
            }
            if ($request->created_at){
                $query->whereDate('created_at', $request->created_at);
            }

            $contacts = $query->paginate(10);

        $param = [

            'gender' => $gender,
            'input' => $request->input,
            'contacts' => $contacts,
        ];
        return view('find', $param);
    }

    public function delete(Request $request)
    {
        $contact = Contact::all();
        Contact::find($request->id)->delete();
        return redirect('find');
    }

}
