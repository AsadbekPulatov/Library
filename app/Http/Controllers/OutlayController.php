<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Outlay;
use Illuminate\Http\Request;

class OutlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlays = Outlay::paginate(10);
        return view('admin.outlay.index', compact('outlays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::find($request->book_id);
        $book->count -= $request->count;
        $book->save();
        $outlay = new Outlay();
        $outlay->book_id = $request->book_id;
        $outlay->count = $request->count;
        $outlay->save();
        return redirect()->route('outlays.index')->with('success', "Чиким муваффақиятли амалга оширилди!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlay  $outlay
     * @return \Illuminate\Http\Response
     */
    public function show(Outlay $outlay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlay  $outlay
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlay $outlay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlay  $outlay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlay $outlay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlay  $outlay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlay $outlay)
    {
        $count = $outlay->count;
        $book = Book::find($outlay->book_id);
        $book->count += $count;
        $book->save();
        $outlay->delete();
        return redirect()->route('outlays.index')->with('success', "Чиким муваффақиятли ўчирилди!");
    }
}
