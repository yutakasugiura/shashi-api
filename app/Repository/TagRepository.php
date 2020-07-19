<?php

namespace App\Repository;

use App\Models\Tag;

class TagRepository
{
    private Tag $eloquentTag;

    public function __construct(
        Tag $eloquentTag
    ) {
        $this->eloquentTag = $eloquentTag;
    }

    public function updateOrCreateTag(
        string $name,
        string $status
    ): Tag {
        return $this->eloquentTag->updateOrCreate([
            'name'   => $name,
            'status' => $status
        ]);
    }
}
