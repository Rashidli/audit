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
                                <p>Yeni {{$mixin}} sifariş sayı: {{$orders_count}}</p>
                            <br>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Ad</th>
                                        <th>Yeni Sifariş sayı</th>
                                        <th>İşlənmiş sifariş sayı</th>
                                        <th>Sifariş ver</th>
                                        <th>Sifariş geri al</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $group)

                                        <tr>
                                            <th scope="row">{{$group->id}}</th>
                                            <td>{{$group->title}}</td>
                                            <td> <a class="btn btn-primary" href="{{route('group_orders', $group->id)}}">Sifarişlərinə bax</a>  <span class="btn btn-primary">{{count($group->orders()->whereNull('auditor_status')->get())}}</span></td>
                                            <td> <a class="btn btn-primary" href="{{route('worked_group_orders', $group->id)}}">Sifarişlərinə bax</a>  <span class="btn btn-primary">{{count($group->orders()->whereNotNull('auditor_status')->get())}}</span></td>

                                            <td>
                                                <form action="{{route('distributeNewOrders')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$group->id}}" name="group_id">
                                                    <input type="hidden" value="{{$mixin}}" name="mixin">
                                                    <input  type="number" required name="number">
                                                    <button class="btn btn-primary" type="submit">Sifariş ver</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route('removeOrders')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$group->id}}" name="group_id">
                                                    <input type="hidden" value="{{$mixin}}" name="mixin">
                                                    <input  type="number" required name="number">
                                                    <button class="btn btn-primary" type="submit">Sifariş geri al</button>
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
