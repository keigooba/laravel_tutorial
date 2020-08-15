<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Folder;
use App\Http\Requests\CreateFolder; // ★ 追加
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;
        // // インスタンスの状態をデータベースに書き込む
        // $folder->save();
          // ★ ユーザーに紐づけて保存
        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
