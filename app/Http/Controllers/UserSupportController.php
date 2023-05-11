<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Unit;
use App\Models\Building;
use App\Models\UserSupport;
use App\Models\ServiceUnit;
use Illuminate\Http\Request;
use App\Models\ProblemCatagory;
use App\Http\Requests\UserSupportStoreRequest;
use App\Http\Requests\UserSupportUpdateRequest;
use App\Models\Leader;

class UserSupportController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', UserSupport::class);

        $search = $request->get('search', '');

        $userSupports = UserSupport::search($search)
            ->oldest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.user_supports.index',
            compact('userSupports', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', UserSupport::class);

        $users = User::pluck('full_name', 'id');
        $problemCatagories = ProblemCatagory::pluck('name', 'id');
        $buildings = Building::pluck('name', 'id');
        $leaders = Leader::pluck('full_name', 'id');
        $serviceUnits = ServiceUnit::pluck('name', 'id');
        $units = Unit::pluck('telephone', 'id');

        return view(
            'app.user_supports.create',
            compact(
                'users',
                'problemCatagories',
                'buildings',
                'leaders',
                'serviceUnits',
                'units'
            )
        );
    }

    /**
     * @param \App\Http\Requests\UserSupportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSupportStoreRequest $request)
    {
       // $data['building_id'] = $request->building_id;
     

        $this->authorize('create', UserSupport::class);

        $validated = $request->validated();
      //  dd($validated);
        foreach ($request->building_id as $bld) {
            if(!empty($bld))
        {
          UserSupport::create([
            'user_id'=>$request->user_id,
            'user_type'=>$request->user_type,
            'problem_catagory_id'=>$request->problem_catagory_id,
            'leader_id'=>$request->leader_id,
            'building_id'=>$bld,
            'service_unit_id'=>$request->service_unit_id,
            'unit_id'=>$request->unit_id
          ]);      
        }
        } 

     //   $userSupport = UserSupport::create($validated);

        return redirect()
            ->route('user-supports.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserSupport $userSupport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserSupport $userSupport)
    {
        $this->authorize('view', $userSupport);

        return view('app.user_supports.show', compact('userSupport'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserSupport $userSupport
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserSupport $userSupport)
    {
        $this->authorize('update', $userSupport);

        $users = User::pluck('full_name', 'id');
        $problemCatagories = ProblemCatagory::pluck('name', 'id');
        $buildings = Building::pluck('name', 'id');
        $leaders = Leader::pluck('full_name', 'id');
        $serviceUnits = ServiceUnit::pluck('name', 'id');
        $units = Unit::pluck('telephone', 'id');

        return view(
            'app.user_supports.edit',
            compact(
                'userSupport',
                'users',
                'problemCatagories',
                'buildings',
                'leaders',
                'serviceUnits',
                'units'
            )
        );
    }

    /**
     * @param \App\Http\Requests\UserSupportUpdateRequest $request
     * @param \App\Models\UserSupport $userSupport
     * @return \Illuminate\Http\Response
     */
    public function update(
        UserSupportUpdateRequest $request,
        UserSupport $userSupport
    ) {
        $this->authorize('update', $userSupport);

        $validated = $request->validated();

        $userSupport->update($validated);

        return redirect()
            ->route('user-supports.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserSupport $userSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserSupport $userSupport)
    {
        $this->authorize('delete', $userSupport);

        $userSupport->delete();

        return redirect()
            ->route('user-supports.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
