<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Profile;

class ProfileController extends Controller
{
    public function indexAction(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');


        // news/index.blade.php ファイルを渡している
        // また View テンプレートに posts、という変数を渡している
        return view('profile.index', ['posts' => $posts]);
    }
}