<?php

namespace App\Http\Controllers;

use App\Category;
use App\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = Suggestion::latest()->paginate(5);
        return view('admin.suggestion.index',compact('suggestions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all()->toArray();
        if ($user) {
            return view('user.suggestion.create', compact('user', 'categories'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|numeric|exists:categories,id',
            'suggestion' => 'required|min:20|max:2000',
        ]);

        $user = Auth::user();
        if ($user) {

            $data = $request->all();

            Suggestion::create([
                'user_id' => $user->id,
                'category_id' => $data["category"],
                'suggestion' => $data["suggestion"],
            ]);

            return redirect()->route('home')
                ->with('success','Suggestion created successfully.');
        } else {
            return redirect('/');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if ($user) {
            $suggestion = Suggestion::findOrFail($id);

            if ($user->role == 'user' && ($user->id != ($suggestion->user ? $suggestion->user->id : 0))) {
                abort(403);
            }

            return view('user.suggestion.show',compact('suggestion', 'user'));
        } else {
            return redirect('/');
        }
    }

}
