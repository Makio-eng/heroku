<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
      // Varidationを行う app/Profile.phpの$rules
      $this->validate($request, Profile::$rules);
      $profile = new Profile;
      $form = $request->all();



      unset($form['_token']);
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
        return redirect('admin/profile/create');
    }

    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_title)->get();
      } else {
          // それ以外はすべてのプロフィールを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
        return view('admin.profile.edit',['profile' => $profile]);
    }


    public function update(Request $request)
    {
       $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->profile_id);
      // 送信されてきたフォームデータを格納する
      $form = $request->all();
      
      unset($form['_token']);
      unset($form['profile_id']);
      // 該当するデータを上書きして保存する
      $profile->fill($form)->save();
      
      $history = new ProfileHistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        return redirect('admin/profile/');
    }
    
  public function delete(Request $request){
    $profile = Profile::find($request->id);
    //削除するやつ
    $profile->delete();
    return redirect('admin/profile/');
  }
   
}
