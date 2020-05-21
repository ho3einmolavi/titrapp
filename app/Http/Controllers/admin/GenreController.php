<?php

namespace App\Http\Controllers\admin;

use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest()->paginate(20);
        return view('admin.genre.list', compact('genres'));
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
        ]);
        Genre::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
        ]);

        alert()->success('عملیات با موفقیت انجام شد', 'ژانر با موفقیت اضافه شد');
        return redirect(route('genre.index'));

    }

    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('admin.genre.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',

        ]);
        $genre->update([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
        ]);
        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect(route('genre.index'));
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('genre.index'));
    }
}
