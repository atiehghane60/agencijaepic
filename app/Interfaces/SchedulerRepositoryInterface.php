<?php

namespace App\Interfaces;

use App\DTOs\ActivityDTO;
use Illuminate\Support\Collection;

interface SchedulerRepositoryInterface
{
    public function getAllActivities(): Collection;

    public function getActivity(int $id): ActivityDTO|null;

    public function addActivity(ActivityDTO $activity): bool;

    public function addActivities(Collection $activities): bool;
}
