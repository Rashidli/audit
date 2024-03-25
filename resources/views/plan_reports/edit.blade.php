@include('includes.header')
<style>
    th{
        text-align: center;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <form action="{{route('plan_orders.update', $plan_order->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Yoxlamanı editlə</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Yoxlamanın nömrəsi</label>
                                        <input value="{{$plan_order->plan_order_id}}" class="form-control" type="text" name="plan_order_id">
                                        @if($errors->first('plan_order_id')) <small class="form-text text-danger">{{$errors->first('plan_order_id')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Yoxlamanın tarixi</label>
                                        <input value="{{$plan_order->time}}" class="form-control" type="date" name="time">
                                        @if($errors->first('time')) <small class="form-text text-danger">{{$errors->first('time')}}</small> @endif
                                    </div>



                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="col-form-label">Yoxlanılan əməkdaş</label>
                                        <input value="{{$plan_order->worker}}" class="form-control" type="text" name="worker">
                                        @if($errors->first('worker')) <small class="form-text text-danger">{{$errors->first('worker')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Xidmətin növü</label>
                                        <input value="{{$plan_order->service}}" class="form-control" type="text" name="service">
                                        @if($errors->first('service')) <small class="form-text text-danger">{{$errors->first('service')}}</small> @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Proseslərin Sualları</th>
                                            <th colspan="2">Uyğunluq</th>
                                            <th>Aşkar etmə/müşahidə</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2"></th>
                                            <th>Bəli</th>
                                            <th>Xeyr</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($plan_questions as $key => $plan_question)
                                            <tr>
                                                <input type="hidden" name="question_id[]" value="{{ $plan_question->id }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $plan_question->title }}</td>
                                                <td style="text-align: center">
                                                    <input type="radio" name="answer{{ $key }}" value="yes" {{ $plan_order->planQuestions->contains($plan_question->id) && $plan_order->planQuestions->find($plan_question->id)->pivot->answer == 'yes' ? 'checked' : '' }}>
                                                </td>
                                                <td style="text-align: center">
                                                    <input type="radio" name="answer{{ $key }}" value="no" {{ $plan_order->planQuestions->contains($plan_question->id) && $plan_order->planQuestions->find($plan_question->id)->pivot->answer == 'no' ? 'checked' : '' }}>
                                                </td>
                                                <td style="text-align: center">
                                                    <textarea style="width: 100%; resize: none" type="text" name="comment{{ $key }}">{{ $plan_order->planQuestions->contains($plan_question->id) ? $plan_order->planQuestions->find($plan_question->id)->pivot->comment : '' }}</textarea>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12">
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

