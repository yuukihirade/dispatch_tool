<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\RegisterController;

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
        
        $user = User::find($request->id);
        
        if (empty($user)){
            abort(404);
        }
        
        return view('admin.user.edit', ['user' => $user]);
    }
    
    public function update(Request $request)
    {
        // dd($request);
        $this->validate($request, User::$rules);
        
        $user = User::find($request->id);
        
        // dd($user);
        
        $form = $request->all();
        
        // dd($form);
        
        unset($form['_token']);
        
        $user->fill($form)->save();
        
        // dd($user);
        
        
        return redirect('admin/user/index');
    }
    
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        
        $user->delete();
        
        return redirect('admin/user/index');
    }
}
