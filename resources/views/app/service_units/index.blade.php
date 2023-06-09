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
            <div class="col-md-6 text-right">
                @can('create', App\Models\ServiceUnit::class)
                <a
                    href="{{ route('service-units.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.service_units.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-left">
                                @lang('crud.service_units.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_units.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_units.inputs.fax')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_units.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_units.inputs.discription')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_units.inputs.leader_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceUnits as $key => $serviceUnit)
                        <tr>
                            <td style="width: 2.5cm"> {{$key+1}}</td>
                            <td>{{ $serviceUnit->name ?? '-' }}</td>
                            <td>{{ $serviceUnit->telephone ?? '-' }}</td>
                            <td>{{ $serviceUnit->fax ?? '-' }}</td>
                            <td>{{ $serviceUnit->email ?? '-' }}</td>
                            <td>{{ $serviceUnit->discription ?? '-' }}</td>
                            <td>
                                {{ optional($serviceUnit->leader)->full_name ??
                                '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $serviceUnit)
                                    <a
                                        href="{{ route('service-units.edit', $serviceUnit) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $serviceUnit)
                                    <a
                                        href="{{ route('service-units.show', $serviceUnit) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $serviceUnit)
                                    <form
                                        action="{{ route('service-units.destroy', $serviceUnit) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
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
                            <td  >{!! $serviceUnits->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
