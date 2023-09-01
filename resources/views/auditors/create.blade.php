@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('auditors.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Auditor əlavə et</h4>
                            <div class="row">

                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Ad</label>
                                        <input class="form-control" type="text" name="title" >
                                        @if($errors->first('title')) <small class="form-text text-danger">{{$errors->first('title')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Qrupun seçin</label>
                                        <select class="form-control" type="text" name="group_id">
                                            <option selected disabled>--seçin--</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('group_id')) <small class="form-text text-danger">{{$errors->first('group_id')}}</small> @endif
                                    </div>

                                    <div class="mb-3">

                                        <button class="btn btn-primary">Yadda saxla</button>
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
