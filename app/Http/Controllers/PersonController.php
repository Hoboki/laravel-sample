<?php

namespace App\Http\Controllers;

use App\Models\Person;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    /**
     * ユーザー一覧
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * @author kawahata
     */
    public function index()
    {
        $people = Person::with(['posts'])->get();
        return view('people.index', compact('people'));
    }
    //
    /**
     * ユーザー表示
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * @author kawahata
     */
    public function show($id)
    {
        $person = Person::find($id);
        // dd($person);
        return view('people.show', compact('person'));
    }
}
