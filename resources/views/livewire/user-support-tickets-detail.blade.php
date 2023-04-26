<div>
    <div class="mb-4">
        @can('create', App\Models\Ticket::class)
            <button class="btn btn-primary" wire:click="newTicket">
                <i class="icon ion-md-add"></i>
                @lang('crud.common.new')
            </button>
            @endcan @can('delete-any', App\Models\Ticket::class)
            <button class="btn btn-danger" {{ empty($selected) ? 'disabled' : '' }}
                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="destroySelected">
                <i class="icon ion-md-trash"></i>
                @lang('crud.common.delete_selected')
            </button>
        @endcan
    </div>

    <x-modal id="user-support-tickets-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-md-12">
                        <x-inputs.text name="ticket.status" label="Status" wire:model="ticket.status" maxlength="255"
                            placeholder="Status"></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.textarea name="ticket.description" label="Description" wire:model="ticket.description"
                            maxlength="255"></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select name="ticket.campuse_id" label="Campuse" wire:model="ticket.campuse_id">
                            <option value="null" disabled>Please select the Campus</option>
                            @foreach ($campusesForSelect as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select name="ticket.problem_id" label="Problem" wire:model="ticket.problem_id">
                            <option value="null" disabled>Please select the Problem</option>
                            @foreach ($problemsForSelect as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select name="ticket.organizational_unit_id" label="Organizational Unit"
                            wire:model="ticket.organizational_unit_id">
                            <option value="null" disabled>Please select the Organizational Unit</option>
                            @foreach ($organizationalUnitsForSelect as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-md-12">
                        <x-inputs.select name="ticket.prioritie_id" label="Prioritie" wire:model="ticket.prioritie_id">
                            <option value="null" disabled>Please select the Prioritie</option>
                            @foreach ($prioritiesForSelect as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                </div>
            </div>

            @if ($editing)
            @endif

            <div class="modal-footer">
                <button type="button" class="btn btn-light float-left" wire:click="$toggle('showingModal')">
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>













    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                {{-- <h3 >Title</h3> --}}

                <h1 class="card-title">Active Tickets</h1>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body" style="display: block;background-color: #e7e7e7;">

                <section class="">
                    
                    <div class="row1 d-flex">
                        @foreach ($tickets as $ticket)
                            <x-ticket :ticket="$ticket"/>
                        @endforeach
                        {{-- <article class="card1 fl-left1 bg-danger flex-wrap flex-fill col-4">
                            <section class="date1"> <time datetime="23th feb"> <span>23</span><span>feb</span> </time>
                            </section>
                            <section class="card1-cont"> <small>dj khaled</small>
                                <h3>live in sydney</h3>
                                <div class="even-date1"> <i class="fa fa-calendar"></i> <time> <span>wednesday 28
                                            december
                                            2014</span> <span>08:55pm to 12:00 am</span> </time></div>
                                <div class="even-info1"> <i class="fa fa-map-marker"></i>
                                    <p> nexen square for people australia, sydney</p>
                                </div> <a href="#">tickets</a>
                            </section>
                        </article>
                        <article class="card1 fl-left1 bg-danger flex-wrap flex-fill col-4">
                            <section class="date1"> <time datetime="23th feb"> <span>23</span><span>feb</span>
                                </time> </section>
                            <section class="card1-cont"> <small>dj khaled</small>
                                <h3>live in sydney</h3>
                                <div class="even-date1"> <i class="fa fa-calendar"></i> <time> <span>wednesday 28
                                            december
                                            2014</span> <span>08:55pm to 12:00 am</span> </time></div>
                                <div class="even-info1"> <i class="fa fa-map-marker"></i>
                                    <p> nexen square for people australia, sydney</p>
                                </div> <a href="#">tickets</a>
                            </section>
                        </article> --}}


                    </div>

                </section>

            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="display: block;">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>



    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Oswald');

       
        body {
            /* background-color: #dadde6; */
            font-family: arial
        }

        .fl-left1 {
            float: left
        }

        .fl-right {
            float: right
        }

        h1 {
            text-transform: uppercase;
            font-weight: 900;
            border-left: 10px solid #fec500;
            padding-left: 10px;
            margin-bottom: 30px
        }

        .row1 {
            overflow: hidden
        }

        .card1 {
            display: table-row1;
            width: 49%;
            background-color: #fff;
            color: #989898;
            margin-bottom: 10px;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            border-radius: 4px;
            position: relative
        }

        .card1+.card1 {
            margin-left: 2%
        }

        .date1 {
            display: table-cell;
            width: 25%;
            position: relative;
            text-align: center;
            border-right: 2px dashed #dadde6
        }

        .date1:before,
        .date1:after {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #DADDE6;
            position: absolute;
            top: -15px;
            right: -15px;
            z-index: 1;
            border-radius: 50%
        }

        .date1:after {
            top: auto;
            bottom: -15px
        }

        .date1 time {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .date1 time span {
            display: block
        }

        .date1 time span:first-child {
            color: #2b2b2b;
            font-weight: 600;
            font-size: 250%
        }

        .date1 time span:last-child {
            text-transform: uppercase;
            font-weight: 600;
            margin-top: -10px
        }

        .card1-cont {
            display: table-cell;
            width: 75%;
            font-size: 85%;
            padding: 10px 10px 30px 50px
        }

        .card1-cont h3 {
            color: #3C3C3C;
            font-size: 130%
        }

        .row1:last-child .card1:last-of-type .card1-cont h3 {
            text-decoration: line-through
        }

        .card1-cont>div {
            display: table-row1
        }

        .card1-cont .even-date1 i,
        .card1-cont .even-info1 i,
        .card1-cont .even-date1 time,
        .card1-cont .even-info1 p {
            display: table-cell
        }

        .card1-cont .even-date1 i,
        .card1-cont .even-info1 i {
            padding: 5% 5% 0 0
        }

        .card1-cont .even-info1 p {
            padding: 30px 50px 0 0
        }

        .card1-cont .even-date1 time span {
            display: block
        }

        .card1-cont a {
            display: block;
            text-decoration: none;
            width: 80px;
            height: 30px;
            background-color: #D8DDE0;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 2px;
            position: absolute;
            right: 10px;
            bottom: 10px
        }

        .row1:last-child .card1:first-child .card1-cont a {
            background-color: #037FDD
        }

        .row1:last-child .card1:last-child .card1-cont a {
            background-color: #F8504C
        }

        @media screen and (max-width: 860px) {
            .card1 {
                display: block;
                float: none;
                width: 100%;
                margin-bottom: 10px;
            }

            .card1+.card1 {
                margin-left: 0
            }

            .card1-cont .even-date1,
            .card1-cont .even-info1 {
                font-size: 75%
            }
        }
    </style>
    <script type="text/javascript"></script>




















    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" wire:model="allSelected" wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}" />
                    </th>
                    <th class="text-left">
                        @lang('crud.user_support_tickets.inputs.status')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_support_tickets.inputs.description')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_support_tickets.inputs.campuse_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_support_tickets.inputs.problem_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_support_tickets.inputs.organizational_unit_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_support_tickets.inputs.prioritie_id')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($tickets as $ticket)
                    <tr class="hover:bg-gray-100">
                        <td class="text-left">
                            <input type="checkbox" value="{{ $ticket->id }}" wire:model="selected" />
                        </td>
                        <td class="text-left">{{ $ticket->status ?? '-' }}</td>
                        <td class="text-left">{{ $ticket->description ?? '-' }}</td>
                        <td class="text-left">
                            {{ optional($ticket->campuse)->name ?? '-' }}
                        </td>
                        <td class="text-left">
                            {{ optional($ticket->problem)->name ?? '-' }}
                        </td>
                        <td class="text-left">
                            {{ optional($ticket->organizationalUnit)->name ?? '-' }}
                        </td>
                        <td class="text-left">
                            {{ optional($ticket->prioritie)->name ?? '-' }}
                        </td>
                        <td class="text-right" style="width: 134px;">
                            <div role="group" aria-label="Row Actions" class="relative inline-flex align-middle">
                                @can('update', $ticket)
                                    <button type="button" class="btn btn-light"
                                        wire:click="editTicket({{ $ticket->id }})">
                                        <i class="icon ion-md-create"></i>
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">{{ $tickets->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
