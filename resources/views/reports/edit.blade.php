@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('auditor_orders_update', $order->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş nömrəsi</label>
                                    <input value="{{$order->order_number}}" class="form-control" type="text" name="order_number">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş tarixi</label>
                                    <input value="{{$order->order_date}}" class="form-control" type="text" name="order_date">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifariş id</label>
                                    <input value="{{$order->order_id}}" class="form-control" type="text" name="order_id">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Xidmət növü</label>
                                    <input value="{{$order->service_type}}" class="form-control" type="text" name="service_type">
                                </div>
                            </div>

                            @if($order->service_type == 'Evakuasiya')
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <label class="col-form-label">Natamam yoxlama</label>
                                        <input type="checkbox" {{$order->is_completed_evacuation == true ? 'checked' : ''}}  name="is_completed_evacuation" >
                                    </div>
                                </div>
                            @endif

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon 2</label>
                                    <input value="{{$order->phone_2}}" class="form-control" type="text" name="phone_2">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş qeydi</label>
                                    <input value="{{$order->service_note}}" class="form-control" type="text" name="service_note">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Zəng tarixi</label>
                                    <input value="{{$order->call_date}}" class="form-control" type="text" name="call_date">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label"> Maşın nömrəsi</label>
                                    <input  class="form-control" value="{{$order->car_number}}" type="text" name="car_number">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Fəhlə sayı</label>
                                    <input  class="form-control" value="{{$order->worker_count}}" type="text" name="worker_count">
                                </div>
                            </div>


                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Usta sayı</label>
                                    <input  class="form-control" value="{{$order->master_count}}" type="text" name="master_count">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücünün telefon nömrəsi</label>
                                    <input  class="form-control" value="{{$order->driver_phone}}" type="text" name="driver_phone">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücünün qrup rəhbəri</label>
                                    <input  class="form-control" value="{{$order->driver_group_head}}" type="text" name="driver_group_head">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Qaraj adı</label>
                                    <input  class="form-control" type="text" value="{{$order->garage_name}}" name="garage_name">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin bitmə tarixi</label>
                                    <input value="{{$order->order_end_date}}" class="form-control" type="text" name="order_end_date">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Müştəri</label>
                                    <input value="{{$order->customer_name}}" class="form-control" type="text" name="customer_name">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon</label>
                                    <input value="{{$order->phone}}" class="form-control" type="text" name="phone">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Korporativ</label>
                                    <input value="{{$order->corporate}}" class="form-control" type="text" name="corporate">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="row">
{{--                                    <div class="col-10 col-md-10 col-lg-10">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="col-form-label">Operator</label>--}}
{{--                                            <input value="{{$order->operator}}" class="form-control" type="text">--}}
{{--                                            @if($errors->first('operator')) <small class="form-text text-danger">{{$errors->first('operator')}}</small> @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-10 col-md-10 col-lg-10">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Operator</label>
                                            <select class="js-example-basic-single1 form-control" style="width: 100%" name="operator" >
                                                <option selected disabled >----</option>

                                                @foreach($operators as $operator)
                                                    <option value="{{$operator->title}}" {{$order->operator == $operator->title ? 'selected' : ''}}>{{$operator->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <input disabled value="{{$order->operator}}" class="form-control">
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2">
                                        <div class="mt-5">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox4"  value="1" name="operator_thick" {{$order->operator_thick ? 'checked' : ''}}>
                                                <input type="text" id="custom-input4" name="custom_input_operator" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin statusu</label>
                                    <input value="{{$order->order_status}}" class="form-control" type="text" name="order_status">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Öz tutma</label>
                                    <input value="{{$order->oz_tutma}}" class="form-control" type="text" name="oz_tutma">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Məbləğ</label>
                                    <input value="{{$order->amount}}" class="form-control" type="text" name="amount">
                                </div>
                            </div>

{{--                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-10 col-md-10 col-lg-10">--}}
{{--                                            <label class="col-form-label">Sürücü</label>--}}
{{--                                            <input value="{{$order->driver}}" class="form-control" type="text" >--}}
{{--                                        </div>--}}

{{--                                        <div class="col-2 col-md-2 col-lg-2">--}}
{{--                                            <div class="mt-5">--}}
{{--                                                <div class="form-check mt-4">--}}
{{--                                                    <input class="form-check-input" type="checkbox" id="my-checkbox"  value="1" name="driver_thick" {{$order->driver_thick ? 'checked' : ''}}>--}}
{{--                                                    <input type="text" id="custom-input" name="custom_input_driver" style="display: none;">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <div class="row">

                                        <div class="col-10 col-md-10 col-lg-10">
                                            <div class="mb-3">
                                                <label class=" col-form-label">Sürücü seç</label>
                                                <select class="js-example-basic-single1 form-control" style="width: 100%" name="driver" id="continent">
                                                    <option selected disabled >----</option>

                                                    @foreach($drivers as $driver)
                                                        <option value="{{$driver->title}}" {{$order->driver == $driver->title ? 'selected' : ''}}>{{$driver->title}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <input disabled value="{{$order->driver}}" class="form-control">
                                        </div>

                                        <div class="col-2 col-md-2 col-lg-2">
                                            <div class="mt-5">
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" type="checkbox" id="my-checkbox"  value="1" name="driver_thick"  {{$order->driver_thick ? 'checked' : ''}}>
                                                    <input type="text" id="custom-input" value="0" name="custom_input_driver" style="display: none;">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">İmtina səbəbi</label>
                                    <input value="{{$order->reason_of_cancel}}" class="form-control" type="text" name="reason_of_cancel">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sürücü məbləği</label>
                                    <input value="{{$order->driver_amount}}" class="form-control" type="text" name="driver_amount">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Usta</label>
                                    <input value="{{$order->master}}" class="form-control" type="text" name="master">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Fəhlə</label>
                                    <input value="{{$order->worker}}" class="form-control" type="text" name="worker">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Əlavə xidmət</label>
                                    <input value="{{$order->additional_service}}" class="form-control" type="text" name="additional_service">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Şöbə</label>
                                    <input value="{{$order->department}}" class="form-control" type="text" name="department">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Məmnuniyyət statusu</label>
                                    <input value="{{$order->satisfaction_status}}" class="form-control" type="text" name="satisfaction_status">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Ünvan</label>
                                    <input value="{{$order->address}}" class="form-control" type="text" name="address">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Danışıq müddəti(san)</label>
                                    <input value="{{$order->speaking_duration}}" class="form-control" type="text" name="speaking_duration">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Qeyd</label>
                                    <input value="{{$order->note}}" class="form-control" type="text" name="note">
                                </div>
                            </div>


                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Auditor</label>
                                    <input value="{{$order->auditor_name}}" class="form-control" type="text" >
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="row">
                                    <div class="col-10 col-md-10 col-lg-10">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Ustaları seç</label>
                                            <select class="js-example-basic-multiple" style="width: 100%" name="masters[]" multiple="multiple">

                                                @foreach($masters as $master)
                                                    <option value="{{$master->id}}" @foreach($order->masters as $order_master) {{$order_master->id == $master->id ? 'selected' : ''}} @endforeach>{{$master->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2">
                                        <div class="mt-5">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox2"  value="1"  name="master_thick"  {{$order->master_thick ? 'checked' : ''}}>
                                                <input type="text" id="custom-input2" name="custom_input_master" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="row">
                                    <div class="col-10 col-md-10 col-lg-10">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Köməkçiləri seç</label>
                                            <select class="js-example-basic-multiple" style="width: 100%" name="workers[]" multiple="multiple">

                                                @foreach($workers as $worker)
                                                    <option value="{{$worker->id}}"   @foreach($order->workers as $order_worker) {{$order_worker->id == $worker->id ? 'selected' : ''}} @endforeach>{{$worker->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2">
                                        <div class="mt-5">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox3"  value="1" name="worker_thick" {{$order->worker_thick ? 'checked' : ''}}>
                                                <input type="text" id="custom-input3" name="custom_input_worker" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <nav>
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    @foreach($question_cats as $key => $question_cat)
                                        <a class="nav-item nav-link mb-3 {{$key == 0 ? 'active' : ''}}" id="nav-{{$question_cat->id}}-tab" data-toggle="tab" href="#nav-{{$question_cat->id}}" role="tab" aria-controls="nav-{{$question_cat->id}}" aria-checked="true">{{$question_cat->title}}</a>
                                    @endforeach
                                </div>
                            </nav>
                            <br><br>
                            <br>
                            <div class="tab-content mb-3" id="nav-tabContent">
                                @foreach($question_cats as $key => $question_cat)
                                    <div class="tab-pane fade  {{$key == 0 ? 'show active' : ''}}" id="nav-{{$question_cat->id}}" role="tabpanel" aria-labelledby="nav-{{$question_cat->id}}-tab">
                                        <div class="row">

                                            @foreach($question_cat->questions as $question)
                                                @foreach($order->questions()->wherePivot('answer', 0)->get() as $q)
                                                    @if($question->id == $q->id)
                                                        <div class="col-2 col-md-6 col-lg-4">
                                                            <div class="mb-3">
                                                                <div class="radio-icon-container">

                                                                    <input type="radio" name="answers[{{ $question->id }}]" class="radio_button" value="1" @foreach($order->questions as $q) @if($question->id == $q->id) {{$q->pivot->answer == '1' ? 'checked' : ''}} @endif @endforeach >
                                                                    <input type="radio" name="answers[{{ $question->id }}]" class="radio_button" value="0" @foreach($order->questions as $q) @if($question->id == $q->id) {{$q->pivot->answer == '0' ? 'checked' : ''}} @endif @endforeach >

                                                                    <label for="option1" class="radio-label">
                                                                        <i class="fas fa-check clicked_jquery_check @foreach($order->questions as $q) @if($question->id == $q->id) {{$q->pivot->answer == '1' ? 'checked' : ''}} @endif @endforeach  "></i>
                                                                        <i class="fas fa-times clicked_jquery_uncheck  @foreach($order->questions as $q) @if($question->id == $q->id) {{$q->pivot->answer == '0' ? 'checked' : ''}} @endif @endforeach"></i>
                                                                        {{$question->title}}
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Auditor qeyd</label>
                                    <textarea style="width: 100%"  class="form-control" type="text" name="auditor_note">{{$order->auditor_note}}</textarea>
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="mb-3">
                                            <label class="col-form-label">Hər şey qaydasındadır</label>
                                        </div>
                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1">
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox5"  value="1" name="satisfied_thick" {{$order->satisfied_thick ? 'checked' : ''}}>
                                                <input type="text" id="custom-input4" value="0" name="custom_input_satisfied" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($order->images)
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        @foreach($order->images as $image)
                                            <a href="{{asset('storage/' . $image->file)}}" target="_blank"><img style="width: 100px; height: 100px" src="{{asset('storage/' . $image->file)}}" alt=""></a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                            <div class="mb-3">
                                <button class="btn btn-primary">Yadda saxla</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@include('includes.footer')
<script>

    $('.js-example-basic-single1').select2({
        tags: true
    });

</script>
