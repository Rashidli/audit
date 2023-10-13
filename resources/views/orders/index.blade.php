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
                                    <form id="fileUploadForm" method="POST" action="{{route('insert_excel')}}" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-4">

                                                <div class="mb-3">
                                                    <label class=" col-form-label">Fayl</label>
                                                    <input id="fileInput" class="form-control" type="file" name="excel_file">
{{--                                                    @if($errors->first('excel_file')) <small class="form-text text-danger">{{$errors->first('excel_file')}}</small> @endif--}}
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
                                <a href="{{route('orders.create')}}" class="btn btn-primary">+</a><br><br>
                                <a href="{{route('share_orders', 'mixin')}}" class="btn btn-primary">Mixin sifarişləri paylaşdır(yeni) {{$mixin_count}}</a><br><br>
                                <a href="{{route('share_orders', 'single')}}" class="btn btn-primary">Single sifarişləri paylaşdır(yeni) {{$single_count}}</a>

                                <br>
                                <br>

                                    @include('includes.search_form')
                                    <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sifariş tarixi</th>
                                            <th>Sifariş id</th>
                                            <th>Xidmət növü</th>
                                            <th>Sifarişin bitmə tarixi</th>
                                            <th>Auditor</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody id="results">
                                        @foreach($data['items'] as $order)
                                            <tr>
                                                <th scope="row">{{$order->order_number}}</th>
                                                <td>{{$order->order_date}}</td>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{$order->service_type}}</td>
                                                <td>{{$order->order_end_date}}</td>
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
                                    <br>
                                    {{ $data['items']->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@include('includes.footer')
