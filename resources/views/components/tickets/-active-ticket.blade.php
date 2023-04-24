<div>
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
            <div class="card-body" style="display: block;">
    
                <section class="">
                    
                    <div class="row1 d-flex">
                        @foreach ($tickets as $ticket)
                        <article class="card1 fl-left1 bg-danger flex-wrap flex-fill col-4">
                            <section class="date1"> <time datetime="23th feb">  <img src="/images/ju_logo_vector.png" alt="" style="width: 80px; "><span>23</span><span>feb</span> </time>
                            </section>
                            <section class="card1-cont"> <small> {{ optional($ticket->organizationalUnit)->name ?? '-' }}</small>
                                <h3> {{ optional($ticket->customer)->full_name ?? '-' }}</h3>
                                @inject('carbon', 'Carbon\Carbon')
    
                                <div class="even-date1"> <i class="fa fa-calendar"></i> <time> <span>  ..{{ $carbon::parse($ticket->created_at)->format('l j F Y \, h:iA ') }}
                                     </span>  </time></div>
                                <div class="even-info1"> <i class="fa fa-map-marker"></i>
                                    <p> {{ optional($ticket->campuse)->name ?? '-' }} <br>
                                        {{ optional($ticket->problem)->name ?? '-' }}
                                    </p>
                                    
                                </div> <a href="#">Pending</a>
                            </section>
                        </article>
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
    
</div>