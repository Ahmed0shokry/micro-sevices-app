<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * @var AuthorService
     */
    private $authorService;

    /**
     * AuthorController constructor.
     * @param AuthorService $authorService
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * return the list of authors
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success($this->authorService->getAuthors(), 200);
    }

    /**
     * create on author
     *
     * @param Request $response
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->success($this->authorService->createAuthor($request->all()),Response::HTTP_CREATED);
    }

    /**
     * get on author
     *
     * @param $authorId
     * @return Illuminate\Http\JsonResponse
     */
    public function show($authorId)
    {
        return $this->success($this->authorService->getAuthor($authorId),Response::HTTP_ACCEPTED);
    }


    /**
     * update on or more authors
     * @param Request $request
     * @param $authorId
     * @return Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $authorId)
    {
        return $this->success($this->authorService->editAuthor($authorId, $request->all()), 200);
    }


    /**
     * delete an author
     * @param $authorId
     * @return Illuminate\Http\Response
     */
    public function destroy($authorId)
    {
        return $this->success($this->authorService->deleteAuthor($authorId), 200);
    }
}
