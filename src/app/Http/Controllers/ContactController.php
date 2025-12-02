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
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $data = $request->validated();
        $contact = $data;

        $contact['name'] = $data['first_name'] . '　' . $data['last_name'];
        $contact['tel']  = $data['tel_first'] . '-' . $data['tel_second'] . '-' . $data['tel_third'];

        $genderLabels = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        $contact['gender_label'] = $genderLabels[(int)$data['gender']] ?? '';

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
            'address',
            'building',
            'category_id',
            'detail',
        ]);

        $data['tel'] = $request['tel_first'] . $request['tel_second'] . $request['tel_third'];

        Contact::create($data);

        return redirect()->route('thanks');
    }
    public function thanks()
    {
        return view('thanks');
    }
}
