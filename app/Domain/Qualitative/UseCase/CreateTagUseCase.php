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

    /**
     * Update or Create Tag
     *
     * @param string $name
     * @param string $status
     * @return void
     */
    public function execute(string $name, string $status)
    {
        $this->tagRepository->updateOrCreateTag(
            $name,
            $status
        );
    }
}
