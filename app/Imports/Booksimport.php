<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements WithHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'id'            => $row['id'],
            'title'         => $row['title'],
            'author'        => $row['author'],
            'year'          => $row['year'],
            'publisher'     => $row['publisher'],
            'city'          => $row['city'],
            'quantity'      => $row['quantity'],
            'cover'         => $row['cover'],
            'creat_at'     => $row['creat_at'],
            'update_at'    => $row['update_at'],
            'bookshelf_id'  => $row['bookshelf_id'],
                    
        ]);
    }
}
