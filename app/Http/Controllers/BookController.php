<?php

namespace App\Http\Controllers;

use App\Imports\ImportBook;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.books.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Китоб муваффақиятли қўшилди');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $types = Type::all();
        return view('admin.books.edit', compact('book', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Китоб муваффақиятли ўзгартирилди');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Китоб муваффақиятли ўчирилди');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        $file = $request->file('file');
        $fileName = 'import.xlsx';
        $file->move(public_path('import'), $fileName);
        $array = Excel::toArray(new ImportBook, public_path('/import/import.xlsx'));
        $arr = [];
        $category = "";
        foreach ($array[0] as $row){
            if (!is_numeric($row[0])){
                $category = $row[1];
                $type_id = Type::where('name', $category)->first();
                continue;
            }
            $arr[] = [
                'book_name' => $row[1] ?? 'null',
                'author_name' => $row[2] ?? 'null',
                'language' => $row[3] ?? 'null',
                'year' => $row[4] ?? '0',
                'count' => $row[5] ?? '0',
                'price' => $row[6] ?? '0',
                'type_id' => $type_id->id ?? '0',
            ];
        }
        Book::insert($arr);
    }
}
