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
    public function index(Request $request)
    {
        $type_id = $request->get('type_id');
        $type_id = array($type_id);
        $year = $request->get('year');
        $years = Book::orderBy('year', 'DESC')->select('year')->distinct()->get();
        $types = Book::with('type')->select('type_id')->distinct()->get();
        if ($type_id && $year) {
            $books = Book::orderby('created_at', 'DESC')->where('count', '!=', 0)->whereIn('type_id', $type_id)->whereIn('year', $year)->paginate(10)->withQueryString();
        } else if ($type_id) {
            $books = Book::orderby('created_at', 'DESC')->where('count', '!=', 0)->whereIn('type_id', $type_id)->paginate(10)->withQueryString();
        } else if ($year) {
            $books = Book::orderby('created_at', 'DESC')->where('count', '!=', 0)->whereIn('year', $year)->paginate(10)->withQueryString();
        } else
            $books = Book::orderby('created_at', 'DESC')->where('count', '!=', 0)->paginate(10);
        return view('admin.books.index', compact('books', 'years', 'types'));
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
                if (!(isset($category) && !isset($row[0]))){
                    continue;
                }
                $type_id = Type::where('name', $category)->first();
                if (!isset($type_id)){
                    $type_id = Type::create([
                        'name' => $category,
                    ]);
                }
                continue;
            }
            $arr[] = [
                'book_name' => $row[1] ?? '',
                'author_name' => $row[2] ?? '',
                'language' => $row[3] ?? '',
                'year' => $row[4] ?? '0',
                'count' => $row[5] ?? '0',
                'price' => $row[6] ?? '0',
                'type_id' => $type_id->id,
            ];
        }
        Book::insert($arr);
        return redirect()->route('books.index')->with('success', 'Китоблар муваффақиятли импорт қилинди');
    }
}
