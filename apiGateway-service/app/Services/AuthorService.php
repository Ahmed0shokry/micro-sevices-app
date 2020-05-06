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
     * @var \Laravel\Lumen\Application|mixed
     */
    private $secret;
    /**
     * AuthorService constructor.
     */
    public function __construct()
    {
        $this->baseUrl = config('services.authors.base_url');
        $this->secret = config('services.authors.secret');
    }

    /**
     * @return string
     */
    public function getAuthors() {
        return $this->performRequest('GET', '/author');
    }

    /**
     * @param $authorId
     * @return string
     */
    public function getAuthor($authorId) {
        return $this->performRequest('GET', '/author/'.$authorId);
    }

    /**
     * @param $author
     * @return string
     */
    public function createAuthor($author) {
        return $this->performRequest('POST', '/author', $author);
    }

    /**
     * @param $authorId
     * @param $data
     * @return string
     */
    public function editAuthor($authorId, $data) {
        return $this->performRequest('PUT', '/author/'.$authorId, $data);
    }

    /**
     * @param $authorId
     * @return string
     */
    public function deleteAuthor($authorId) {
        return $this->performRequest('DELETE', '/author/'.$authorId);
    }
}
