<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::paginate(7);
        $categories = Category::all();
        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $keyword     = $request->keyword;
        $gender      = $request->gender;
        $categoryId  = $request->category_id;
        $updatedAt   = $request->updated_at;

        $query = Contact::with('category');

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($gender !== null && $gender !== '' && $gender !== 'all') {
            $query->where('gender', $gender);
        }

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        if (!empty($updatedAt)) {
            $query->whereDate('created_at', $updatedAt); // 例
        }

        $contacts = $query
            ->paginate(7)
            ->appends($request->only(['keyword', 'gender', 'category_id', 'updated_at']));
        $categories = Category::all();

        return view('admin.admin', compact('contacts', 'categories'));
    }


    public function reset()
    {
        return redirect()->route('admin.index');
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect()->route('admin.index')->with('message', 'お問い合わせを削除しました');
    }
    public function export() {}
}
