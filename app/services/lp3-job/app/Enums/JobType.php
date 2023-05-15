<?php

namespace Services\Lp3Job\App\Enums;

/**
 * ジョブ種別
 */
enum JobType: int
{
    case CONTAINER_JOB = 1;      # コンテナジョブ
    case RORO_JOB = 2;      # ROROジョブ


    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            JobType::CONTAINER_JOB => 'コンテナジョブ',
            JobType::RORO_JOB => 'ROROジョブ',
        };
    }
}
