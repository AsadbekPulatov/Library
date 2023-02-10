<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sum = Book::groupBy('type_id')
            ->selectRaw('sum(count) as sum, type_id')
            ->pluck('sum', 'type_id');
        $types = Type::all()->pluck('name', 'id');
        return view('admin.dashboard', compact('sum', 'types'));
    }
}
