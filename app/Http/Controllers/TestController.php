<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    /**
     * テスト一覧を表示する
     * 
     * @return view
     */
    public function showList()
    {
        $tests = Test::all()->sortByDesc('created_at');

        return view('test.list', ['tests' => $tests]);
    }
    /**
     * テスト詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $test = Test::find($id);
        if (is_null($test)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('tests'));
        }

        return view('test.detail', ['test' => $test]);
    }
    /**
     * テスト登録画面を表示する
     * 
     * @return view
     */
    public function showCreate()
    {
        return view('test.form');
    }
    /**
     * テストを登録する
     * 
     * @return view
     */
    public function exeStore(TestRequest $request)
    {
        //テストのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try{
            //テストを登録
            Test::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'テストを登録しました。');
        return redirect(route('tests'));
    }
    /**
     * テスト編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $test = Test::find($id);
        // dd($test);
        if (is_null($test)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('tests'));
        }

        return view('test.edit', ['test' => $test]);
    }
    /**
     * テストを更新する
     * 
     * @return view
     */
    public function exeUpdate(TestRequest $request)
    {
        //テストのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try{
            //テストを更新
            $test = Test::find($inputs['id']);
            $test->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $test->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'テストを更新しました。');
        return redirect(route('tests'));
    }
    /**
     * テスト削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('tests'));
        }
        try{
            //テストを削除
            Test::destroy($id);
        }catch(\Throwable $e){
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('tests'));
    }
}
