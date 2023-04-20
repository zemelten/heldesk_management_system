<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Reports;
use App\Models\UserSupport;
use Illuminate\Http\Request;
use App\Http\Requests\ReportsStoreRequest;
use App\Http\Requests\ReportsUpdateRequest;

class ReportsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Reports::class);

        $search = $request->get('search', '');

        $userSupports = UserSupport::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.all_reports.user_support_list.index',
            compact('userSupports', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Reports::class);

        $userSupports = UserSupport::pluck('id', 'id');

        return view('app.all_reports.create', compact('userSupports'));
    }

    /**
     * @param \App\Http\Requests\ReportsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportsStoreRequest $request)
    {
        $this->authorize('create', Reports::class);

        $validated = $request->validated();

        $reports = Reports::create($validated);

        return redirect()
            ->route('all-reports.edit', $reports)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reports $reports
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserSupport $reports)
    {
        $this->authorize('view', $reports);

        //conut all users 
        $totalTicket = Ticket::where('user_support_id', $reports->user_support_id)->count();
        $totalactiveTicket = Ticket::where('user_support_id', $reports->user_support_id)->where('status', 1)->count();
        $totalpendingTicket = Ticket::where('user_support_id', $reports->user_support_id)->where('status', 2)->count();
        $totalClosedTicket = Ticket::where('user_support_id', $reports->user_support_id)->where('status', 3)->count();
        $todaysClosedTicket = Ticket::whereDate('updated_at', today())->count();
        $todaysTicket = Ticket::whereDate('created_at', today())->count();

        
        

        return view('app.all_reports.show', compact('reports', 'totalTicket', 'totalactiveTicket', 'totalClosedTicket', 'todaysClosedTicket', 'todaysTicket'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reports $reports
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Reports $reports)
    {
        $this->authorize('update', $reports);

        $userSupports = UserSupport::pluck('id', 'id');

        return view('app.all_reports.edit', compact('reports', 'userSupports'));
    }

    /**
     * @param \App\Http\Requests\ReportsUpdateRequest $request
     * @param \App\Models\Reports $reports
     * @return \Illuminate\Http\Response
     */
    public function update(ReportsUpdateRequest $request, Reports $reports)
    {
        $this->authorize('update', $reports);

        $validated = $request->validated();

        $reports->update($validated);

        return redirect()
            ->route('all-reports.edit', $reports)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reports $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reports $reports)
    {
        $this->authorize('delete', $reports);

        $reports->delete();

        return redirect()
            ->route('all-reports.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
