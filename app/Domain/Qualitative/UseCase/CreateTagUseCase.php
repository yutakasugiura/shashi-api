<?php

namespace App\Domain\Qualitative\UseCase;

use App\Repository\TagRepository;

class CreateTagUseCase
{
    private TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute()
    {
        $tags = config('tag');
        foreach ($tags as $tag) {
            $a = $this->tagRepository->updateOrCreateTag(
                $tag['name'],
                $tag['status']
            );
        }
    }
}
