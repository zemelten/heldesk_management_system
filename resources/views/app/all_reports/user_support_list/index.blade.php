@extends('layouts.app')

@section('content')
<div class="">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.user_supports.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                No.
                            </th>
                            <th class="text-left">
                                @lang('crud.user_supports.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.user_supports.inputs.user_type')
                            </th>
                            <th class="text-left">
                                @lang('crud.user_supports.inputs.problem_catagory_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.user_supports.inputs.building_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.user_supports.inputs.service_unit_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.user_supports.inputs.unit_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @forelse($userSupports as $key => $userSupport)
                        
                        <tr class="clickable" onclick="window.location='http://127.0.0.1:8000/all-reports/{{$userSupport->id}}';" >
                            <style>
                                .clickable {
                                  cursor: pointer;
                                }
                              </style>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ optional($userSupport->user)->full_name ??
                                '-' }}
                            </td>
                            <td>{{ $userSupport->user_type ?? '-' }}</td>
                            <td>
                                {{ optional($userSupport->problemCatagory)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($userSupport->building)->name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($userSupport->serviceUnit)->name ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($userSupport->unit)->telephone ??
                                '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('view', $userSupport)
                                    <a
                                        href="{{ route('user-supports.show', $userSupport) }}"
                                    >
                                    
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                   @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td  >
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td  >{!! $userSupports->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
