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
                                <a href="{{route('plan_orders.create')}}" class="btn btn-primary">+</a>
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
                                        @foreach($plan_orders as $plan_order)

                                            <tr>
                                                <th scope="row">{{$plan_order->plan_order_id}}</th>
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
