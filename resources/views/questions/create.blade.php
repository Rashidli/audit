@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('questions.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sual əlavə et</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Sual</label>
                                        <input value="{{old('title')}}" class="form-control" type="text" name="title">
                                        @if($errors->first('title')) <small class="form-text text-danger">{{$errors->first('title')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Kateqoriya</label>
                                        <select class="form-control" type="text" name="question_cat_id">
                                            <option selected disabled>----- </option>
                                            @foreach($question_cats as $c)
                                                <option value="{{$c->id}}" {{old('question_cat_id') == $c->id ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('question_cat_id')) <small class="form-text text-danger">{{$errors->first('question_cat_id')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Dərəcə</label>
                                        <select class="form-control" type="text" name="level">
                                            <option selected disabled>----- </option>

                                                <option value="1" {{old('level') == 1 ? 'selected' : ''}}>Yüngül</option>
                                                <option value="2" {{old('level') == 2 ? 'selected' : ''}}>Orta</option>
                                                <option value="3" {{old('level') == 3 ? 'selected' : ''}}>Ağır</option>
                                                <option value="4" {{old('level') == 4 ? 'selected' : ''}}>Orta/Ağır</option>
                                                <option value="5" {{old('level') == 5 ? 'selected' : ''}}>Katqoriyasız</option>

                                        </select>
                                        @if($errors->first('level')) <small class="form-text text-danger">{{$errors->first('level')}}</small> @endif
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

