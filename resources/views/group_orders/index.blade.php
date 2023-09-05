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
                            <form action="{{route($route, $group->id)}}" method="get">
                                <div class="row">
                                    <div class="col-1">
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
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <label class="col-form-label">Sifariş id görə</label>
                                            <input class="form-control" value="{{ request()->text}}" id="text" type="text" name="text">
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="mb-3">
                                            <div class="pt-4 mt-3">
                                                <button value="submit" class="btn btn-primary">Axtar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="mb-3">
                                            <div class="pt-4 mt-3">
                                                <a class="btn btn-primary" href="{{route($route, $group->id)}}">Sıfırla</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="mb-3">
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
                                        <th>#</th>
                                        <th>Sifariş tarixi</th>
                                        <th>Sifariş id</th>
                                        <th>Xidmət növü</th>
                                        <th>Telefon 2</th>
                                        <th>Sifarişin bitmə tarixi</th>
                                        <th>Müştəri</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody id="results">
                                    @foreach($orders as $order)
                                        <tr>
                                            <th scope="row">{{$order->order_number}}</th>
                                            <td>{{$order->order_date}}</td>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->service_type}}</td>
                                            <td>{{$order->phone_2}}</td>
                                            <td>{{$order->order_end_date}}</td>
                                            <td>{{$order->customer_name}}</td>

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
