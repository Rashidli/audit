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
                                <h4 class="card-title">Planlı yoxlama</h4>
                                    <form action="{{route('plan_reports.index')}}" method="get">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class=" col-form-label">Limit</label>
                                                    <select class="form-control" type="text" name="limit">
                                                        <option value="10" {{ request()->limit == 10 ? 'selected' : '' }}>10</option>
                                                        <option value="25" {{ request()->limit == 25 ? 'selected' : '' }}>25</option>
                                                        <option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
                                                        <option value="100" {{ request()->limit == 100 ? 'selected' : '' }}>100</option>
                                                        <option value="500" {{ request()->limit == 500 ? 'selected' : '' }}>500</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="col-form-label">Başlanğıc tarix</label>
                                                    <input class="form-control" id="start_date" value="{{ request()->start_date }}" type="date" name="start_date">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="col-form-label">Son tarix</label>
                                                    <input class="form-control" id="end_date" value="{{ request()->end_date }}" type="date" name="end_date">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="col-form-label">Text</label>
                                                    <input class="form-control" id="text" value="{{ request()->text}}" type="text" name="text">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="col-form-label">Əməliyyat</label><br>
                                                    <button value="submit" class="btn btn-primary">Axtar</button>
                                                    <a class="btn btn-primary" href="{{route('plan_reports.index')}}">Sıfırla</a>
                                                    <span class="text-primary">Nəticə: {{$data['count']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>Yoxlamanın nömrəsi</th>
                                            <th>Yoxlamanın tarixi</th>
                                            <th>Yoxlanılan əməkdaş</th>
                                            <th>Xidmətin növü</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['items'] as $plan_order)

                                            <tr>
                                                <td>{{$plan_order->plan_order_id}}</td>
                                                <td>{{$plan_order->time}}</td>
                                                <td>{{$plan_order->worker}}</td>
                                                <td>{{$plan_order->service}}</td>
                                                <td><a href="{{route('plan_orders.edit',$plan_order->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('plan_orders.destroy', $plan_order->id)}}" method="post" style="display: inline-block">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $data['items']->links('vendor.pagination.bootstrap-5') }}
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
