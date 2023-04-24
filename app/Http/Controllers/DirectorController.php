<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Director;
use Illuminate\Http\Request;
use App\Http\Requests\DirectorStoreRequest;
use App\Http\Requests\DirectorUpdateRequest;

class DirectorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Director::class);

        $search = $request->get('search', '');

        $directors = Director::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();
        // dd(Director::all());
        return view('app.directors.index', compact('directors', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Director::class);
        $users = User::pluck('full_name', 'id');
        // dd($users);


        return view('app.directors.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\DirectorStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectorStoreRequest $request)
    {
        $this->authorize('create', Director::class);

        $validated = $request->validated();
        // dd($validated);
        // dd($request);
        $director = Director::create($validated);

        return redirect()
            ->route('directors.edit', $director)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Director $director
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Director $director)
    {
        $this->authorize('view', $director);

        return view('app.directors.show', compact('director'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Director $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Director $director)
    {
        $this->authorize('update', $director);
        $users = User::pluck('full_name', 'id');

        return view('app.directors.edit', compact('director', 'users'));
    }

    /**
     * @param \App\Http\Requests\DirectorUpdateRequest $request
     * @param \App\Models\Director $director
     * @return \Illuminate\Http\Response
     */
    public function update(DirectorUpdateRequest $request, Director $director)
    {
        $this->authorize('update', $director);

        $validated = $request->validated();

        $director->update($validated);

        return redirect()
            ->route('directors.edit', $director)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Director $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Director $director)
    {
        $this->authorize('delete', $director);

        $director->delete();

        return redirect()
            ->route('directors.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
