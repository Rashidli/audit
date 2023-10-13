@include('includes.header')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-success">{{session('message')}}</div>
                                @endif
                                <h4 class="card-title">Qruplar</h4>
                                        <a href="{{route('groups.create')}}" class="btn btn-primary">+</a>

                                <br>
                                <br>

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Ad</th>
                                                <th>Auditorlar</th>
                                                <th>Yeni sifariş sayı</th>
                                                <th>İşlənmiş sifariş sayı</th>
                                                <th>Əməliyyat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($groups as $group)
                                            @if(auth()->user()->group_id !== null)
                                                @foreach($group->users as $auditor)
                                                    @if($auditor->id == auth()->user()->id)
                                                        <tr>
                                                            <th scope="row">{{$group->id}}</th>
                                                            <td>{{$group->title}}</td>
                                                            <td>

                                                                @if($group->users)
                                                                    @foreach($group->users as $auditor)
                                                                        {{$auditor->name}}<br>
                                                                    @endforeach
                                                                @endif

                                                            </td>

                                                            <td><a class="btn btn-primary" href="{{route('auditor_orders', $group->id)}}">Sifarişlərə bax</a> <span class="btn btn-primary">{{count($group->orders()->where('auditor_status', false)->whereDate('orders.created_at', '=' ,$today)->get())}}</span></td>
                                                            <td><a class="btn btn-primary" href="{{route('worked_auditor_orders', $group->id)}}">Sifarişlərə bax</a> <span class="btn btn-primary">{{count($group->orders()->where('auditor_status', true)->whereDate('orders.created_at', '=' ,$today)->get())}}</span></td>

                                                            <td>
                                                                <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
{{--                                                                <form action="{{route('groups.destroy', $group->id)}}" method="post" style="display: inline-block">--}}
{{--                                                                    {{ method_field('DELETE') }}--}}
{{--                                                                    @csrf--}}
{{--                                                                    <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                                                </form>--}}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th scope="row">{{$group->id}}</th>
                                                    <td>{{$group->title}}</td>
                                                    <td>

                                                        @if($group->users)
                                                            @foreach($group->users as $auditor)
                                                                {{$auditor->name}}<br>
                                                            @endforeach
                                                        @endif

                                                    </td>
                                                    <td><a class="btn btn-primary" href="{{route('auditor_orders', $group->id)}}">Sifarişlərə bax</a> <span class="btn btn-primary">{{count($group->orders()->where('auditor_status', false)->whereDate('orders.created_at', '=' ,$today)->get())}}</span></td>
                                                    <td><a class="btn btn-primary" href="{{route('worked_auditor_orders', $group->id)}}">Sifarişlərə bax</a> <span class="btn btn-primary">{{count($group->orders()->where('auditor_status', true)->whereDate('orders.created_at', '=' ,$today)->get())}}</span></td>

                                                    <td>
                                                        <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
{{--                                                        <form action="{{route('groups.destroy', $group->id)}}" method="post" style="display: inline-block">--}}
{{--                                                            {{ method_field('DELETE') }}--}}
{{--                                                            @csrf--}}
{{--                                                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                                        </form>--}}
                                                    </td>
                                                </tr>
                                            @endif

                                        @endforeach

                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@include('includes.footer')
