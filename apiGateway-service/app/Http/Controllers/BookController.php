<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
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
     * @var BookService
     */
    public $bookService;
    /**
     * @var AuthorService
     */
    public $authorService;
    /**
     * BookController constructor.
     * @param BookService $bookService
     * @param AuthorService $authorService
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * return the list of books
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->success($this->bookService->getBooks(), 200);

    }

    /**
     * create on book
     *
     * @param Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->authorService->getAuthor($request->author_id);
        return $this->success($this->bookService->createBook($request->all()),Response::HTTP_CREATED);
    }

    /**
     * get on book
     *
     * @param $bookId
     * @return Illuminate\Http\Response
     */
    public function show($bookId)
    {
        return $this->success($this->bookService->getbook($bookId),Response::HTTP_ACCEPTED);
    }


    /**
     * update on or more books
     * @param Request $request
     * @param $bookId
     * @return Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $bookId)
    {
        return $this->success($this->bookService->editBook($bookId, $request->all()), 200);
    }


    /**
     * delete an book
     * @param $bookId
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy($bookId)
    {
        return $this->success($this->bookService->deleteBook($bookId), 200);
    }
}
