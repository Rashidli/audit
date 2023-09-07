@include('includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sifariş tarixi</th>
                                        <th>Sifariş id</th>
                                        <th>Xidmət növü</th>
                                        <th>Sifarişin bitmə tarixi</th>
                                        <th>Auditor status</th>
                                        <th>Auditor</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody id="results">
                                    @foreach($orders as $order)
                                        <tr>
                                            <th scope="row">{{$order->id}}</th>
                                            <td>{{$order->order_date}}</td>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->service_type}}</td>
                                            <td>{{$order->order_end_date}}</td>
                                            <td>{{$order->auditor_status}}</td>
                                            <td>{{$order->auditor_name}}</td>

                                            <td><a href="{{route('orders.edit',$order->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                <form action="{{route('orders.destroy', $order->id)}}" method="post" style="display: inline-block">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button  type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@include('includes.footer')
