<?php

namespace App\Http\Controllers\Schedule;

use App\Jobs\UpdateStats;
use App\Models\Schedule\Schedule;
use App\Services\ScheduleService;
use App\Services\StatsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Crm\CrmController;

class ScheduleController extends CrmController
{
    private $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $items = $this->scheduleService->index();

        return view('crm.schedule.index', ['items' => $items, 'leftNav' => parent::getLeftNav()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('crm.schedule.create', ['leftNav' => parent::getLeftNav()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->scheduleService->store($request);

        return redirect('schedule');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $model = $this->scheduleService->show($id);

        return view('crm.schedule.edit', ['model' => $model, 'leftNav' => parent::getLeftNav()]);
    }

    /**
     * @param Schedule $schedule
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Schedule $schedule)
    {
        return view('crm.schedule.edit', ['model' => $schedule, 'leftNav' => parent::getLeftNav()]);
    }

    /**
     * @param Request $request
     * @param Schedule $schedule
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Schedule $schedule)
    {
        $this->scheduleService->update($request, $schedule);

        return redirect('/schedule');
    }

    /**
     * @param Schedule $schedule
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */

    public function destroy(Schedule $schedule)
    {
        $this->scheduleService->destroy($schedule);

        return redirect('/schedule');
    }
}
