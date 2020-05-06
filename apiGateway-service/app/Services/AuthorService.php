<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    /**
     * base url of author service
     * @var string
     */
    private $baseUrl;
    /**
     * AuthorService constructor.
     */
    public function __construct()
    {
        $this->baseUrl = config('services.authors.base_url');
    }

    public function getAuthors() {
        return $this->performRequest('GET', $this->baseUrl.'/author');
    }
    public function getAuthor($authorId) {
        return $this->performRequest('GET', $this->baseUrl.'/author/'.$authorId);
    }
    public function createAuthor($author) {
        return $this->performRequest('POST', $this->baseUrl.'/author', $author);
    }
    public function editAuthor($authorId, $data) {
        return $this->performRequest('PUT', $this->baseUrl.'/author/'.$authorId, $data);
    }
    public function deleteAuthor($authorId) {
        return $this->performRequest('DELETE', $this->baseUrl.'/author/'.$authorId);
    }
}
