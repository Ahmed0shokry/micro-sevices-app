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
    public $baseUrl;
    /**
     * BookService constructor.
     */
    public function __construct()
    {
        $this->baseUrl = config('services.books.base_url');
    }

    public function getBooks() {
        return $this->performRequest('GET', $this->baseUrl.'/book');
    }
    public function getBook($bookId) {
        return $this->performRequest('GET', $this->baseUrl.'/book/'.$bookId);
    }
    public function createBook($book) {
        return $this->performRequest('POST', $this->baseUrl.'/book', $book);
    }
    public function editBook($bookId, $data) {
        return $this->performRequest('PUT', $this->baseUrl.'/book/'.$bookId, $data);
    }
    public function deleteBook($bookId) {
        return $this->performRequest('DELETE', $this->baseUrl.'/book/'.$bookId);
    }

}
