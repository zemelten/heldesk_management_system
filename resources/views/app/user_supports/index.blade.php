@extends('layouts.app')

@section('content')
<div class="container">
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
                @can('create', App\Models\UserSupport::class)
                <a
                    href="{{ route('user-supports.create') }}"
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
                    @lang('crud.user_supports.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
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
                        @forelse($userSupports as $userSupport)
                        <tr>
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
                                    @can('update', $userSupport)
                                    <a
                                        href="{{ route('user-supports.edit', $userSupport) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $userSupport)
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
                                    @endcan @can('delete', $userSupport)
                                    <form
                                        action="{{ route('user-supports.destroy', $userSupport) }}"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $userSupports->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
