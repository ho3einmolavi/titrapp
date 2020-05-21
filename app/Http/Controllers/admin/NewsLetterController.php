<?php

namespace App\Http\Controllers\admin;

use App\Exports\NewsLetterExport;
use App\Http\Controllers\Controller;
use App\NewsLetter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NewsLetterController extends Controller
{
    public function index()
    {
        $letters = NewsLetter::latest()->paginate(20);
        return view('admin.newsletter.list', compact('letters'));
    }

    public function destroy($id)
    {
        $letter = NewsLetter::find($id);
        $letter->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('newsletter.index'));
    }


    public function export()
    {
        return Excel::download(new NewsLetterExport(), 'neesletter-titrapp.xlsx');
    }
}
