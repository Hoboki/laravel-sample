<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Post;
use App\Http\Requests\PersonRequest;
use Illuminate\Support\Facades\Redirect;

class PersonController extends Controller
{
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

    /**
     * ユーザー登録画面を表示する
     * 
     * @return view
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * 会社を作成
     * @param App\\Http\Requests\Address\PersonRequest $request
     * @return \Illuminate\Routing\Redirector | \Illuminate\Http\RedirectResponse
     * @author kawahata 
     */
    public function store(PersonRequest $request)
    {
        // dd($request);   
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try{
            // dd($inputs);
            Person::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' ,'ユーザーを作成しました。');
        return redirect(route('people.index'));
    }

    /**
     * ユーザー編集ページ
     *
     * @param App\Models\Person $Person
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * @author kawahata
     */
    
    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    /**
     * ユーザー表示
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * @author kawahata
     */
    public function show(Person $person)
    {
        if (is_null($person)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('people.index'));
        }
        // dd($person);
        return view('people.show', compact('person'));
    }

    /**
     * テストを更新する
     * 
     * @return view
     */
    public function update(PersonRequest $request)
    {
        //テストのデータを受け取る
        $inputs = $request->all();
        // dd($inputs);
        // dd($request->route());

        \DB::beginTransaction();
        try{
            //テストを更新
            $person = Person::find($inputs['id']);
            // dd($inputs);
            // dump($person);
            $person->fill([
                'name' => $inputs['name']
            ]);
            // dd($person);
            $person->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ユーザー名を更新しました。');
        return redirect(route('people.show', [$person->id]));
    }

    /**
     * 指定したユーザーを削除
     * @param App\Models\Person $person
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     * @author kawahata
     */

    public function destroy(Person $person)
    {
        if (empty($person)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect()->route('people.index');
        }
        
        try {
            $person->delete();
        }catch(\Throwable $e){
            abort(500);
        }

        \Session::flash('err_msg', 'ユーザーを削除しました。');
        return redirect(route('people.index'));
    }
}
