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
                                <h4 class="card-title">Müştərilər</h4>
                                <a href="{{route('customers.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>

                                    @include('includes.search_form')
                                    <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Şirkət|Adı</th>
                                            <th>VÖEN</th>
                                            <th>M|şəxs</th>
                                            <th>Ünvan</th>
                                            <th>M|nömrəsi</th>
                                            <th>Telefon</th>
                                            <th>Fayl</th>
                                            <th>Status</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody id="results">
                                        @foreach($data['items'] as $customer)
                                            <tr>
                                                <th scope="row">{{$customer->id}}</th>
                                                <td>{{$customer->company_name}}</td>
                                                <td>{{$customer->company_voen}}</td>
                                                <td>{{$customer->person_name}}</td>
                                                <td>{{$customer->main_address}}</td>
                                                <td>{{$customer->person_phone}}</td>
                                                <td>{{$customer->company_phone}}</td>

                                                <td><a href="{{asset('storage/' . $customer->contract_file)}}">File</a></td>

                                                <td>{{$customer->is_active == true ? 'Active' : 'Deactive'}}</td>
                                                <td><a href="{{route('customers.edit',$customer->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('customers.destroy', $customer->id)}}" method="post" style="display: inline-block">
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
