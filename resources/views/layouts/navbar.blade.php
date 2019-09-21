<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar-collapse"
                    aria-expanded="true">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{ url('/') }}"><span>SATKER</span>POLDA</a>
            <ul class="nav navbar-top-links navbar-right">
                @php
                    $reminder = \App\Models\Reminder::first();

                    $date = new DateTime();
                    $date->modify('+'.$reminder->name);
                    $formatted_date = $date->format('Y-m-d');
                    $berkala = \App\Models\Personel::where('tmt_berkala', '<', $formatted_date)
                    ->orderBy('tmt_berkala', 'asc')
                    ->get()->take(10);
                    $pangkat = \App\Models\Personel::where('tmt_pangkat', '<', $formatted_date)
                    ->orderBy('tmt_pangkat', 'asc')
                    ->get()->take(10);
                @endphp
                @if($berkala->count() > 0)
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-refresh"></em>
                            <span class="label label-info">{{ $berkala->count() }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            @foreach($berkala as $b)
                                <li>
                                    <a href="#">
                                        <div>
                                            <em class="fa fa-envelope"></em> {{ $b->nama }}
                                            <span class="pull-right text-muted small">{{ $b->tmt_berkala }}</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                            @endforeach
                            <li>
                                <div class="all-button">
                                    <a href="{{ route('reminder.index') }}">
                                        <em class="fa fa-inbox"></em> <strong>Lihat semua (Berkala)</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
                @if($pangkat->count() > 0)
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-bar-chart"></em>
                            <span class="label label-info">{{ $pangkat->count() }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            @foreach($pangkat as $b)
                                <li>
                                    <a href="#">
                                        <div>
                                            <em class="fa fa-envelope"></em> {{ $b->nama }}
                                            <span class="pull-right text-muted small">{{ $b->tmt_pangkat }}</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                            @endforeach
                            <li>
                                <div class="all-button">
                                    <a href="{{ route('reminder.index') }}">
                                        <em class="fa fa-inbox"></em> <strong>Lihat semua (Pangkat)</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>