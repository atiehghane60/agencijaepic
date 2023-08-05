<?php

namespace App\DTOs;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class ActivityDTO
{
    private function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly array $appointments,
    )
    {
    }

    public static function fromActivityModel(Activity $activity, bool $setAppointments = false): ActivityDTO
    {

        $appointments = [];
        if ($setAppointments) {
            foreach ($activity->appointments as $appointment) {
                $appointments[] = new Carbon($appointment->start_date);
            }
        }

        return new self($activity->id, $activity->name, $appointments);
    }

    #[Pure] public static function newInstance(string $name, array $appointments): ActivityDTO
    {
        return new self(0, $name, $appointments);
    }

    public function toCollection(): Collection
    {
        return collect((array)$this);
    }
}
