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
                                <h4 class="card-title">Suallar</h4>
                                <a href="{{route('questions.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Sual</th>
                                            <th>Dərəcəsi</th>
                                            <th>Kateqoriya</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $question)

                                            <tr>
                                                <th scope="row">{{$question->id}}</th>
                                                <td>{{$question->title}}</td>
                                                <td>
                                                    @if($question->level == 1)
                                                        Yüngül
                                                    @elseif($question->level == 2)
                                                        Orta
                                                    @elseif($question->level == 3)
                                                        Ağır
                                                    @elseif($question->level == 4)
                                                        Orta/Ağır
                                                    @elseif($question->level == 5)
                                                        Kateqoriyasız
                                                    @endif
                                                </td>
                                                <td>{{$question->question_cat->title}}</td>
                                                <td><a href="{{route('questions.edit',$question->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('questions.destroy', $question->id)}}" method="post" style="display: inline-block">
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
