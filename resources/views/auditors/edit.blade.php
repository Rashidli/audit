@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <form action="{{route('auditors.update', $auditor->id)}}" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$auditor->title}}</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Ad</label>
                                        <input value="{{$auditor->title}}" class="form-control" type="text" name="title">
                                        @if($errors->first('title')) <small class="form-text text-danger">{{$errors->first('title')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Qrupun seçin</label>
                                        <select class="form-control" type="text" name="group_id">
                                            <option selected disabled>--seçin--</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}" {{$group->id == $auditor->group_id ? 'selected' :''}}>{{$group->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('group_id')) <small class="form-text text-danger">{{$errors->first('group_id')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary">Yadda saxla</button>
                                        <a class="btn btn-primary" href="{{route('auditors.index')}}">Siyahıya qayıt</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@include('includes.footer')
