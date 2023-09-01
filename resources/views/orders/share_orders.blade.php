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
                                <p>Yeni sifariş sayı: {{$orders_count}}</p>
                            <br>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Ad</th>
                                        <th>Sifarişləri</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $group)

                                        <tr>
                                            <th scope="row">{{$group->id}}</th>
                                            <td>{{$group->title}}</td>
                                            <td></td>
                                            <td>
                                                <a href="#">Sifariş ver</a>
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
