<?php

namespace App\SqlRepositories;

use App\DTOs\ActivityDTO;
use App\Interfaces\SchedulerRepositoryInterface;
use App\Models\Activity;
use App\Models\Appointment;
use Illuminate\Support\Collection;

class SchedulerRepository implements SchedulerRepositoryInterface
{

    private Activity $activityModel;
    private Appointment $appointmentModel;

    public function __construct(Activity $activityModel, Appointment $appointmentModel)
    {
        $this->activityModel = $activityModel;
        $this->appointmentModel = $appointmentModel;
    }

    public function getAllActivities(): Collection
    {
        $activitiesModels = $this->activityModel->newQuery()->get();

        return $activitiesModels->map(function (Activity $activity) {
            return ActivityDTO::fromActivityModel($activity);
        });

    }

    public function getActivity(int $id): ActivityDTO|null
    {
        $activityModel = $this->activityModel->newQuery()->with('appointments')->find($id);

        if ($activityModel == null) return null;

        return ActivityDTO::fromActivityModel($activityModel, true);

    }

    public function addActivity(ActivityDTO $activity): bool
    {
        $modelResult = $this->activityModel->newQuery()->create([
            $activity->toCollection()->only($this->activityModel->getFillable())
        ]);

        $appointments = [];
        foreach ($activity->appointments as $appointment)
            $appointments[] = [
                'activity_id' => $modelResult->id,
                'start_date' => $appointment
            ];

        $this->appointmentModel->newQuery()->insert($appointments);

        return true;
    }

    public function addActivities(Collection $activities): bool
    {
        $activities->each(function (ActivityDTO $activity) {
            $this->addActivity($activity);
        });

        return true;
    }
}
