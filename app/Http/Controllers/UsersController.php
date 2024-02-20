<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function login_form()
    {
        return view("login");
    }
    public function register_form()
    {
        echo "REGISTER FORM";
    }
    public function add_user()
    {
        $nama = "andi dion rudito";
        echo $nama;
    }

    public function login_action(Request $request)
    {
       
        $users = Users::where("username", $request->username)->first();
        if($users == null){
            return redirect()->back()->with('error', 'username tidak ditemukan');
        }

        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);   
        
        if($hashed_password){
            $users->token = Str::random(20);
            $users->save();
            $request->session()->put('token', $users->token);
            return to_route('dashboard_index');
        } else {
            return redirect()->back()->with('erorr', 'maaf data anda tidak sesuai');
        }
    }

    public function dashboard_index()
    {
        if(Session::has('token')){
           $users = Users::where('token', Session::get('token'))->first();
           $articles = Articles::get();
           return view('Dashboard.index', [
            'title' => 'DASHBOARD ADMIN',
            'users' => $users,
            'articles' => $articles,
          ]);

       }  else {
        return redirect()->back()->with('error','login terlebih dahulu');
       }
    }

    public function dashboard_logout(Request $request)
    {
        // dd($request->token);
        // Users::where('token', $request->token)->update(['token' => NULL]);
        Users::where('token', $request->token)->update([
          'token' => NULL
        ]);

    //   dd($tes);
    
       Session::pull('token');
       return to_route('login_form');
    }

    public function article_delete_action(Request $request)
    {
        Articles::find($request->id)->delete();
        return redirect()->back()->with('message','berhasil dihapus');
    }

    public function article_add_action(Request $request)
    {
      $request->validate([
        'title' => ['required','max:256'], 
        'description' => ['required'], 
        'tag' => ['nullable'], 
      ]);

      $created = Articles::create([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);

        if($created){
            return redirect()->back()->with('message','berhasil dihapus');
        }

    }

    public function article_edit_action($id){
        $article = Articles::find($id);
        return view('Dashboard.edit', compact('article'));
    }

    public function article_update_action(Request $request, $id)
    {
        $updated = Articles::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);

        if($updated){
            return to_route('dashboard_index');
        }
    }

}
