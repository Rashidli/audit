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
                                <h4 class="card-title">Proseslərin Sualları</h4>
                                <a href="{{route('plan_questions.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Sual</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($plan_questions as $plan_question)

                                            <tr>
                                                <th scope="row">{{$plan_question->id}}</th>
                                                <td>{{$plan_question->title}}</td>
                                                <td><a href="{{route('plan_questions.edit',$plan_question->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('plan_questions.destroy', $plan_question->id)}}" method="post" style="display: inline-block">
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
