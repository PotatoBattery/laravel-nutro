<?php

namespace App\Http\Controllers\Nutro\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Nutro\MusicRequest;
use App\Models\Nutro\MusicFile;
use Illuminate\Http\Request;

class NutroAdminController extends Controller
{
    public function index()
    {
        $music = MusicFile::paginate(10);
        return response()->view('nutro.admin.index', compact('music'));
    }

    public function musicAdd()
    {
        return response()->view('nutro.admin.music.form.add');
    }

    public function musicStore(MusicRequest $request)
    {
        $file = new MusicFile;
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('nutro/music', $fileName, 'public');

        $file->ru_name = $request->ruName;
        $file->en_name = $request->enName;
        $file->file_path = $filePath;

        $file->save();

        return response()->view('nutro.admin.index');
    }
}
