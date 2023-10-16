@include('includes.header')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Hesabat</h4>

                                <form action="{{route('report')}}" method="get">
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
                                                <label class=" col-form-label" for="group_id">Qrupu seç</label>
                                                <select class="form-control" id="group_id" type="text" name="group_id">
                                                    <option selected value="">---</option>
                                                    @foreach($groups as $group)
                                                        <option value="{{$group->id}}" {{ request()->group_id == $group->id ? 'selected' : '' }}>{{$group->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class=" col-form-label" for="auditor_title">Auditor seç</label>
                                                <select class="form-control" id="auditor_title" type="text" name="auditor_title">
                                                    <option selected value="">---</option>
                                                    @foreach($auditors as $auditor)
                                                        <option value="{{$auditor->name}}" {{ request()->auditor_title == $auditor->name ? 'selected' : '' }}>{{$auditor->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class=" col-form-label" for="order_status">Sifariş statusu</label>
                                                <select class="form-control" id="order_status" type="text" name="order_status">
                                                    <option selected value="">---</option>
                                                    <option value="1" {{ request()->order_status == '1' ? 'selected' : '' }}>Yüngül</option>
                                                    <option value="2" {{ request()->order_status == '2' ? 'selected' : '' }}>Orta</option>
                                                    <option value="3" {{ request()->order_status == '3' ? 'selected' : '' }}>Ağır</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="mixin_single">Mixin or single</label>
                                                <select class="form-control" id="mixin_single" name="mixin_single">
                                                    <option selected value="">---</option>
                                                    <option value="mixin" {{ request()->mixin_single == 'mixin' ? 'selected' : '' }}>Mixin</option>
                                                    <option value="single" {{ request()->mixin_single == 'single' ? 'selected' : '' }}>Single</option>
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
                                                <a class="btn btn-primary" href="{{route('report')}}">Sıfırla</a>
                                                <span class="text-primary">Nəticə: {{$data['count']}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <button class="btn btn-primary" id="excel_export" type="button">export</button>

                                <br>
                                <br>
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

                                                <td><a href="{{route('report_edit',$order->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a></td>

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
