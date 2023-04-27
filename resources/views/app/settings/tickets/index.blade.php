@extends('layouts.app')

@section('content')

            <!-- /.card -->
             <div class="searchbar mt-0 mb-4">
              <div class="row">
                  <div class="col-md-6">
                      <form>
                          <div class="input-group">
                              <div class="input-group-append">
                                 
                              </div>
                          </div>
                      </form>
                  </div> 
                  <div class="col-md-6 text-right">
                      @can('create', App\Models\Ticket::class)
                          <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                              <i class="fas fa-plus fa-lg"></i> @lang('crud.common.create')
                          </a>
                      @endcan
                  </div>
              </div>
          </div> 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">@lang('crud.tickets.index_title')</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered ">
                  <thead>
                    <tr>
                        <th class="text-left">
                            #
                        </th>
                       
                        <th class="text-left">
                          Name
                        </th>
                       

                       
                        <th class="text-left">
                           Time
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                  @forelse($settings as $key => $setting)
                      <tr>
                        <td>
                      {{  $key + 1 }}    
                       
                        </td>
                          <td>
                              {{ $setting->name}}
                          </td>
                          {{-- <td>
                            @php $age = Carbon\Carbon::parse($ticket->created_at)->diffForHumans();
                            $duration = $duration = Carbon\Carbon::parse($ticket->created_at)->diffInHours();
                            
                            @endphp
                           
                         @if($duration<=24 )
                            <span class="badge badge-success">{{  $age}} </span>
                            
                            @elseif($duration > 24 && $duration<= 48 )
                            <span class="badge badge-warning">{{  $age}} </span>
                            @else
                            <span class="badge badge-danger">{{  $age}} </span>
                          @endif 
                          @if($ticket->status == 0)
                          <span class="mb-2 badge badge-warning">Active</span>
                          @else 
                          <span class="mb-2 badge badge-danger">Closed</span>
                          @endif
                        </td>
                         
 --}}

                          <td>
                              {{ $setting->time.' '.'days' }}
                          </td>
                         
                          
                         
                       
                         
                          <td class="text-center" style="width: 134px;">
                              <div role="group" aria-label="Row Actions" class="btn-group">
                            
                                    
                                          <button type="button" class="btn btn-light">
                                            <i class="fa-solid fa-pen-to-square fa-lg" style="color: #e3c116;"></i>
                                          </button>
                                      </a>
                                   
                                    
                                          <button type="button" class="btn btn-light">
                                            <i class=" fa-solid fa-eye fa-lg" style="color: #286ce2;"></i>
                                          </button>
                                      </a>
                                
                                      <form action="{{ route('tickets.destroy', $setting) }}" method="POST"
                                          onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                          @csrf @method('DELETE')
                                          <button type="submit" class="btn btn-light text-danger">
                                            <i class="fa-solid fa-trash fa-lg" style="color: #f00f0f;"></i>
                                          </button>
                                      </form>
                            
                              </div>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="10">
                              @lang('crud.common.no_items_found')
                          </td>
                      </tr>
                  @endforelse
              </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    
    </div>
@endsection