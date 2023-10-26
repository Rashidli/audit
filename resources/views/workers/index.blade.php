@include('includes.header')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('import_workers')}}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">

                                            <div class="mb-3">
                                                <label class=" col-form-label">Fayl</label>
                                                <input class="form-control" type="file" name="excel_file">
                                                @if($errors->first('excel_file')) <small class="form-text text-danger">{{$errors->first('excel_file')}}</small> @endif

                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn progress_button btn-primary">Import et</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                                @if(session('message'))
                                    <div class="alert alert-success">{{session('message')}}</div>
                                @endif
                                <h4 class="card-title">Köməkçilər</h4>
{{--                                        <a href="{{route('workers.create')}}" class="btn btn-primary">+</a>--}}
                                <br>
                                <br>

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Ad</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($workers as $worker)

                                            <tr>
                                                <th scope="row">{{$worker->number}}</th>
                                                <td>{{$worker->title}}</td>
                                                <td>
{{--                                                    <a href="{{route('workers.edit',$worker->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>--}}
                                                    <form action="{{route('workers.destroy', $worker->id)}}" method="post" style="display: inline-block">
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
