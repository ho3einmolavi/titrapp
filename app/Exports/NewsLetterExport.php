<?php

namespace App\Exports;

use App\NewsLetter;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsLetterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NewsLetter::all();
    }
}
