<?php

namespace App\Admin\Http\Controllers\Post;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Admin\Http\Resources\Post\PostSearchSelectResource;

class PostSearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        PostRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => PostSearchSelectResource::collection($this->instance)
        ];
    }
}
