        @props(['tickets'])
        {{-- @dd($tickets); --}}
        
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
                            <article class="card1 fl-left1 flex-wrap flex-fill col-4 mx-3">
                                <section class="date1"> <time datetime="23th feb"> <img class="w-100" src="/images/JU_logo.png" alt=""
                                            style="width: 80px; "><span>23</span><span>feb</span> </time>
                                </section>
                                <section class="card1-cont"> <small> {{ optional($ticket->organizationalUnit)->name ?? '-' }}</small>
                                    <h3> {{ optional($ticket->customer)->full_name ?? '-' }}</h3>
                                    @inject('carbon', 'Carbon\Carbon')
                    
                                    <div class="even-date1"> <i class="px-2 fa fa-calendar"></i> <time> <span>
                                                {{ $carbon::parse($ticket->created_at)->format('l j F Y \, h:iA ') }}
                                            </span> </time></div>
                                    <div class="even-info1"> <i class="px-2 fa fa-map-marker"></i>
                                        <p> {{ optional($ticket->campuse)->name ?? '-' }} <br>
                                            {{ optional($ticket->problem)->name ?? '-' }} <br>
                                            
                                        </p>
                                        <p class="mr-2">{{ $ticket->created_at->diffForHumans(now()) }}</p>
                    
                                    </div> <a href="#">Pending</a>
                                </section>
                            </article>
                            @endforeach
                        </div>
    
                    </section>
    
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: block;">
                    .
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
                /* text-decoration: line-through */
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
                background-color: #037FDD;
                color: #fff;
                text-align: center;
                line-height: 30px;
                border-radius: 2px;
                position: absolute;
                right: 10px;
                bottom: 10px
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
    