<?php

namespace App\Http\Controllers;

use App\Models\TimeSetting;
use Illuminate\Http\Request;
use App\Http\Requests\TimeSettingStoreRequest;
use App\Http\Requests\TimeSettingUpdateRequest;

class TimeSettingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TimeSetting::class);

        $search = $request->get('search', '');

        $timeSettings = TimeSetting::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.time_settings.index',
            compact('timeSettings', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TimeSetting::class);

        return view('app.time_settings.create');
    }

    /**
     * @param \App\Http\Requests\TimeSettingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeSettingStoreRequest $request)
    {
        $this->authorize('create', TimeSetting::class);
        $validated = $request->validated();

        $timeSetting = TimeSetting::create($validated);
       
        return redirect()
            ->route('time-settings.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TimeSetting $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TimeSetting $timeSetting)
    {
        $this->authorize('view', $timeSetting);

        return view('app.time_settings.show', compact('timeSetting'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TimeSetting $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TimeSetting $timeSetting)
    {
        $this->authorize('update', $timeSetting);

        return view('app.time_settings.edit', compact('timeSetting'));
    }

    /**
     * @param \App\Http\Requests\TimeSettingUpdateRequest $request
     * @param \App\Models\TimeSetting $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(
        TimeSettingUpdateRequest $request,
        TimeSetting $timeSetting
    ) {
        $this->authorize('update', $timeSetting);

        $validated = $request->validated();

        $timeSetting->update($validated);

        return redirect()
            ->route('time-settings.edit', $timeSetting)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TimeSetting $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TimeSetting $timeSetting)
    {
        $this->authorize('delete', $timeSetting);

        $timeSetting->delete();

        return redirect()
            ->route('time-settings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
