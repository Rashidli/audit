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
                            <form id="fileUploadForm" action="{{route('import_excel')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Fayl</label>
                                            <input value="{{old('file')}}" id="fileInput" class="form-control" type="file" name="file">
                                            @if($errors->first('file')) <small class="form-text text-danger">{{$errors->first('file')}}</small> @endif
                                        </div>
                                        <div class="progress_display form-group">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                            </div>
                                        </div>

                                        <div id="successMessage" class="progress_success alert alert-success">File yükləndi.</div>
                                        {{--                                                <div id="errorMessage" class="alert alert-danger"></div>--}}
                                        <div class="mb-3">
                                            <button type="submit" class="btn progress_button btn-primary">Import et</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <h4 class="card-title">Sifarişlər</h4>
                            <br>
                            <br>

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
                                                <label class="col-form-label">Text</label>
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
