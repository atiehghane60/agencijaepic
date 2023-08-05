<?php

namespace App\Http\Controllers;

use App\DTOs\ActivityDTO;
use App\Http\Requests\SchedulerImportFileRequest;
use App\Http\Requests\SchedulerManualAddRequest;
use App\Imports\ActivityImport;
use App\Interfaces\SchedulerRepositoryInterface;
use Illuminate\View\View;

class SchedulerController extends Controller
{
    public function __construct(
        public readonly SchedulerRepositoryInterface $schedulerRepository,
    )
    {
    }

    public function importFromFile(SchedulerImportFileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $activityImport = new ActivityImport();
        $activities = $activityImport->toArray($request->file('file'));

        $this->schedulerRepository->addActivities(collect($activities));

        $resultMessage = count($activities) == 0 ?
            "Neveljavna vsebina datoteke" : "Vsebina datoteke je bila uvožena";

        return redirect()->route('list', ['message' => $resultMessage]);
    }

    public function store(SchedulerManualAddRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validatedRequestInfo = $request->validated();
        $this->schedulerRepository->addActivity(
            ActivityDTO::newInstance(
                $validatedRequestInfo['name'],
                $validatedRequestInfo['appointments'],
            )
        );

        return redirect()->route('list');
    }

    public function index(): View
    {
        $activities = $this->schedulerRepository->getAllActivities();

        return \view('list', ['activities' => $activities]);
    }

    public function show(string $activity): View|\Illuminate\Http\RedirectResponse
    {
        $activity = $this->schedulerRepository->getActivity((int)$activity);

        return $activity == null ?
            redirect()->route('list')->with('message', 'Dejavnosti ni bilo mogoče najti'):
            \view('activity', ['activity' => $activity]);
    }
}
