<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $data = $request->all();
        $contact = $data;

        $contact['name'] = $data['last_name'] . '　' . $data['first_name'];
        $contact['tel']  = $data['tel_first'] . '-' . $data['tel_second'] . '-' . $data['tel_third'];

        $category = Category::find($data['category_id']);
        $contact['category_name'] = $category ? $category->content : '';

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        if ($request->input('action') === 'back') {
            return redirect()->route('index')->withInput();
        }

        $data = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel_first',
            'tel_second',
            'tel_third',
            'address',
            'building',
            'category_id',
            'content',
        ]);

        $data['tel'] = $data['tel_first'] . $data['tel_second'] . $data['tel_third'];

        Contact::create($data);

        return redirect()->route('thanks');
    }
    public function thanks()
    {
        return view ('thanks');
    }
}
