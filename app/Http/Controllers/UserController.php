<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->search != '検索')
        {
            // dd('if');
            $users = User::all();
        } else {
            // 検索フォームが空で検索された場合
            if ($request->cond_name == '')
            {
                // dd($request);
                $users = User::all();
            } 
            // 検索フォームに入力があった場合
            else {
                // dd($request);
                // dd($request->cond_name);
                //\DB::enableQueryLog();
                $cond_param = '%' . addcslashes($request->cond_name, '%_\\') . '%';
                // dd($cond_param);
                $users = User::where('name', 'like', $cond_param)->get();
                //dd(\DB::getQueryLog());
            }
        }
        return view('admin.user.index', ['users' => $users]);
    }
    
    public function edit(Request $request)
    {
        return view('admin.user.edit');
    }
    
    public function update(Request $request)
    {
        return redirect('admin.user.edit');
    }
    
    public function delete(Request $request)
    {
        return redirect('admin.user.index');
    }
}
