<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCount;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(20);
        return view('book.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Book::create($request->all());
        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $counts = BookCount::where('book_id',$book->id)->paginate(20);
        return view('book.show', [
            'book' => $book,
            'counts' => $counts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $book->update($request->all());
        return redirect()->route('book.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')
            ->with('success', 'Book deleted successfully');
    }

    public function bookcount(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required',
            'count' => 'required',
            'price' => 'required',
            'sell_price' => 'required',
        ]);
        BookCount::create([
            'book_id' => $request->book_id,
            'count' => $request->count,
            'price' => $request->price,
            'sell_price' => $request->sell_price,
        ]);
        return back()->with('success', 'Book count add successfully');
    }

    public function give(Request $request)
    {
        // Morph
        if ($request->post()) {
            $this->validate($request, [
                'user_id' => 'required',
                'count' => 'required',
                'book_id' => 'required',
            ]);
            $bc = BookCount::where('book_id', $request->book_id)->where('count', '>', $request->count)->first();
            if (empty($bc))
                return back()->with('error', 'Bu kitobdan yetarli mavjud emas!!!');
            $bc->update([
                'sale' => $bc->sale + $request->count
            ]);
            UserBook::create([
                'user_id' => $request->user_id,
                'count' => $request->count,
                'price' => $request->count * $bc->sell_price,
                'book_id' => $request->book_id,
            ]);
            return back()->with('success', "Kitob muvafaqiyatli qo'shildi!!!");
        }
        $books = Book::get();
        $gives = UserBook::latest('id')->paginate(50);
        $students = User::select(
            'users.id_code as id_code',
            'users.id as id',
            'users.name as name',
            'users.surname as surname',
            'users.phone as phone',
            'users.status as status',
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('roles.name', 'Student')
            ->where('model_has_roles.model_type', User::class)
            ->whereIn('users.status', [1, 2, 3])
            ->get();

        return view('book.give', [
            'gives' => $gives,
            'books' => $books,
            'students' => $students,
        ]);
    }
}
