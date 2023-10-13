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

                            <h4 class="card-title">Sifarişlər</h4>
                                <a href="{{route('auditor_create_order')}}" class="btn btn-primary">Yeni sifariş yarat</a>

                            <form action="{{route($route, $group->id)}}" method="get">
                                <div class="row">
                                    <div class="col-md-2 col-sm-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Limit</label>
                                            <select class="form-control" type="text" name="limit">
                                                <option value="10" {{ request()->limit == 10 ? 'selected' : '' }}>10</option>
                                                <option value="25" {{ request()->limit == 25 ? 'selected' : '' }}>25</option>
                                                <option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
                                                <option value="100" {{ request()->limit == 100 ? 'selected' : '' }}>100</option>
                                                <option value="500" {{ request()->limit == 500 ? 'selected' : '' }}>500</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Sifariş id görə</label>
                                            <input class="form-control" value="{{ request()->order_id}}" id="text" type="text" name="order_id">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Ünvan</label>
                                            <input class="form-control" value="{{ request()->address}}" id="text" type="text" name="address">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Sürücü adı</label>
                                            <input class="form-control" value="{{ request()->driver_name}}" id="text" type="text" name="driver_name">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="pt-4 mt-3">
                                            <button value="submit" class="btn btn-primary">Axtar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="mb-3" style="display: flex; justify-content: space-between">

                                            <div class="pt-4 mt-3">
                                                <a class="btn btn-primary" href="{{route($route, $group->id)}}">Sıfırla</a>
                                            </div>
                                            <div class="pt-4 mt-3">
                                                <p class="text-primary">Nəticə: {{$count}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>

                                        <th>Sifariş id</th>
                                        <th>Ünvan</th>
                                        <th>Sürücü</th>

                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody id="results">
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->driver}}</td>

                                            <td>
                                                <a href="{{route('auditor_orders_edit',$order->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                <br>
                                {{ $orders->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('includes.footer')
