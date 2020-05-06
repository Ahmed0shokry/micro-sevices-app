<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * base url of book service
     * @var string
     */
    private $baseUrl;
    /**
     * @var string
     */
    private $secret;
    /**
     * BookService constructor.
     */
    public function __construct()
    {
        $this->baseUrl = config('services.books.base_url');
        $this->secret = config('services.books.secret');
    }

    /**
     * @return string
     */
    public function getBooks() {
        return $this->performRequest('GET', '/book');
    }

    /**
     * @param $bookId
     * @return string
     */
    public function getBook($bookId) {
        return $this->performRequest('GET', '/book/'.$bookId);
    }

    /**
     * @param $book
     * @return string
     */
    public function createBook($book) {
        return $this->performRequest('POST', '/book', $book);
    }

    /**
     * @param $bookId
     * @param $data
     * @return string
     */
    public function editBook($bookId, $data) {
        return $this->performRequest('PUT', '/book/'.$bookId, $data);
    }

    /**
     * @param $bookId
     * @return string
     */
    public function deleteBook($bookId) {
        return $this->performRequest('DELETE', '/book/'.$bookId);
    }

}
