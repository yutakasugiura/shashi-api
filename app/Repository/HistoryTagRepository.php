<?php

namespace App\Repository;

use App\Models\HistoryTag;

class HistoryTagRepository
{
    private HistoryTag $eloquentHistoryTag;

    public function __construct(
        HistoryTag $eloquentHistoryTag
    ) {
        $this->eloquentHistoryTag = $eloquentHistoryTag;
    }

    public function updateOrCreateHistoryTag(
        string $name,
        string $status
    ): HistoryTag {
        return $this->eloquentHistoryTag->updateOrCreate([
            'name'   => $name,
            'status' => $status
        ]);
    }

    /**
     * 沿革タグidを取得する
     *
     * @param string $historyTag
     * @return int
     */
    public function findHistoryTag(string $historyTag): int
    {
        $tag =  $this->eloquentHistoryTag
            ->where('name', $historyTag)
            ->first();
        if (empty($tag)) {
            return 1; //エラー対処「id=1」を投げる
        } else {
            return $tag->id;
        }
    }
}
