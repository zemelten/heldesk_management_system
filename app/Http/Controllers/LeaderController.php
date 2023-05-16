<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leader;
use App\Models\Director;
use Illuminate\Http\Request;
use App\Http\Requests\LeaderStoreRequest;
use App\Http\Requests\LeaderUpdateRequest;

class LeaderController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Leader::class);

        $search = $request->get('search', '');

        $leaders = Leader::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.leaders.index', compact('leaders', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $this->authorize('create', Leader::class);
        $users = User::pluck('full_name', 'id');
        $director = Director::pluck('full_name', 'id');

        return view('app.leaders.create',  compact('users', 'director'));
    }

    /**
     * @param \App\Http\Requests\LeaderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaderStoreRequest $request)
    {
        
        $this->authorize('create', Leader::class);

        $validated = $request->validated();
        //dd($validated);
        $leader = Leader::create($validated);

        return redirect()
            ->route('leaders.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Leader $leader)
    {
        $this->authorize('view', $leader);

        return view('app.leaders.show', compact('leader'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Leader $leader)
    {
        $this->authorize('update', $leader);
        $users = User::pluck('full_name', 'id');
        $director = Director::pluck('full_name', 'id');

        return view('app.leaders.edit', compact('leader', 'director', 'users'));
    }

    /**
     * @param \App\Http\Requests\LeaderUpdateRequest $request
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function update(LeaderUpdateRequest $request, Leader $leader)
    {
        $this->authorize('update', $leader);

        $validated = $request->validated();

        $leader->update($validated);

        return redirect()
            ->route('leaders.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Leader $leader)
    {
        $this->authorize('delete', $leader);

        $leader->delete();

        return redirect()
            ->route('leaders.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
