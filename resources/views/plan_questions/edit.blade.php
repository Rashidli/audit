@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <form action="{{route('plan_questions.update', $plan_question->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sualı editlə</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Sual</label>
                                        <input value="{{$plan_question->title}}" class="form-control" type="text" name="title">
                                        @if($errors->first('title')) <small class="form-text text-danger">{{$errors->first('title')}}</small> @endif
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

