<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * return the list of books
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();
        return $books;
    }

    /**
     * create on book
     *
     * @param Request $response
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required| max:255',
            'description' => 'required| max:255',
            'price' => 'required| |min:1',
            'author_id' => 'required| |min:1',
        ];
        $this->validate($request,$rules);
        Book::create($request->all());
        return $this->success($request->all(), Response::HTTP_CREATED);
    }

    /**
     * get on book
     *
     * @param $bookId
     * @return Illuminate\Http\JsonResponse
     */
    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        return $this->success($book);
    }


    /**
     * update on or more books
     * @param Request $request
     * @param $bookId
     * @return Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $bookId)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'author_id' => 'min:1',
        ];
        $this->validate($request,$rules);
        $book = Book::findOrFail($bookId);
        $book->fill($request->all());
        if($book->isClean()) {
            return $this->error('can not update an empty object', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $book->save();
        return $this->success($book);
    }


    /**
     * delete an book
     * @param $bookId
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy($bookId)
    {
        $book = Book::findOrFail($bookId);
        $book->delete();
        return $this->success($book);
    }
}
