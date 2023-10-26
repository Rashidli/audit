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
                                    <label class=" col-form-label">Sifariş id</label>
                                    <input readonly value="{{$order->order_id}}" class="form-control" type="text">
                                    @if($errors->first('order_id')) <small class="form-text text-danger">{{$errors->first('order_id')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş tarixi</label>
                                    <input readonly value="{{$order->order_date}}" class="form-control" type="text">
                                    @if($errors->first('order_date')) <small class="form-text text-danger">{{$errors->first('order_date')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Ünvan</label>
                                    <input readonly value="{{$order->address}}" class="form-control" type="text" ">
                                    @if($errors->first('address')) <small class="form-text text-danger">{{$errors->first('address')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-10 col-md-10 col-lg-10">
                                            <label class="col-form-label">Sürücü</label>
                                            <input readonly value="{{$order->driver}}" class="form-control" type="text" >
                                        </div>

                                        <div class="col-2 col-md-2 col-lg-2">
                                            <div class="mt-5">
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" type="checkbox" id="my-checkbox"  value="1" name="driver_thick" {{$order->driver_thick ? 'checked' : ''}}>
                                                    <input type="text" id="custom-input" value="0" name="custom_input_driver" style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin statusu</label>
                                    <input readonly value="{{$order->order_status}}" class="form-control" type="text">
                                    @if($errors->first('order_status')) <small class="form-text text-danger">{{$errors->first('order_status')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label"> Maşın nömrəsi</label>
                                    <input   class="form-control" value="{{$order->car_number}}" type="text" name="car_number">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Fəhlə sayı</label>
                                    <input   class="form-control" value="{{$order->worker_count}}" type="text" name="worker_count">
                                </div>
                            </div>


                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Usta sayı</label>
                                    <input   class="form-control" value="{{$order->master_count}}" type="text" name="master_count">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="row">
                                    <div class="col-10 col-md-10 col-lg-10">
                                        <div class="mb-3">
                                            <label class="col-form-label">Operator</label>
                                            <input readonly value="{{$order->operator}}" class="form-control" type="text">
                                            @if($errors->first('operator')) <small class="form-text text-danger">{{$errors->first('operator')}}</small> @endif
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2">
                                        <div class="mt-5">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox4"  value="1" name="operator_thick" {{$order->operator_thick ? 'checked' : ''}}>
                                                <input type="text" id="custom-input4" value="0" name="custom_input_operator" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
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
                                                <input type="text" id="custom-input2" value="0" name="custom_input_master" style="display: none;">
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
                                                <input type="text" id="custom-input3" value="0" name="custom_input_worker" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücünün telefon nömrəsi</label>
                                    <input   class="form-control" value="{{$order->driver_phone}}" type="text" name="driver_phone">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Fəhlə məbləği</label>
                                    <input readonly value="{{$order->worker}}" class="form-control" type="text" >
                                    @if($errors->first('worker')) <small class="form-text text-danger">{{$errors->first('worker')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Usta məbləği</label>
                                    <input readonly value="{{$order->master}}" class="form-control" type="text" >
                                    @if($errors->first('master')) <small class="form-text text-danger">{{$errors->first('master')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sürücü məbləği</label>
                                    <input readonly value="{{$order->driver_amount}}" class="form-control" type="text" >
                                    @if($errors->first('driver_amount')) <small class="form-text text-danger">{{$errors->first('driver_amount')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Ümumi məbləğ</label>
                                    <input readonly value="{{$order->amount}}" class="form-control" type="text" >
                                    @if($errors->first('amount')) <small class="form-text text-danger">{{$errors->first('amount')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücünün qrup rəhbəri</label>
                                    <input   class="form-control" value="{{$order->driver_group_head}}" type="text" name="driver_group_head">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Qaraj adı</label>
                                    <input   class="form-control" type="text" value="{{$order->garage_name}}" name="garage_name">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş nömrəsi</label>
                                    <input readonly value="{{$order->order_number}}" class="form-control" type="text" >
                                    @if($errors->first('order_number')) <small class="form-text text-danger">{{$errors->first('order_number')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Xidmət növü</label>
                                    <input readonly value="{{$order->service_type}}" class="form-control" type="text">
                                    @if($errors->first('service_type')) <small class="form-text text-danger">{{$errors->first('service_type')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon 2</label>
                                    <input readonly value="{{$order->phone_2}}" class="form-control" type="text" >
                                    @if($errors->first('phone_2')) <small class="form-text text-danger">{{$errors->first('phone_2')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş qeydi</label>
                                    <input readonly value="{{$order->service_note}}" class="form-control" type="text" >
                                    @if($errors->first('service_note')) <small class="form-text text-danger">{{$errors->first('service_note')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Zəng tarixi</label>
                                    <input readonly value="{{$order->call_date}}" class="form-control" type="text">
                                    @if($errors->first('call_date')) <small class="form-text text-danger">{{$errors->first('call_date')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin bitmə tarixi</label>
                                    <input readonly value="{{$order->order_end_date}}" class="form-control" type="text">
                                    @if($errors->first('order_end_date')) <small class="form-text text-danger">{{$errors->first('order_end_date')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Müştəri</label>
                                    <input readonly value="{{$order->customer_name}}" class="form-control" type="text" >
                                    @if($errors->first('customer_name')) <small class="form-text text-danger">{{$errors->first('customer_name')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon</label>
                                    <input readonly value="{{$order->phone}}" class="form-control" type="text" >
                                    @if($errors->first('phone')) <small class="form-text text-danger">{{$errors->first('phone')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Korporativ</label>
                                    <input readonly value="{{$order->corporate}}" class="form-control" type="text">
                                    @if($errors->first('corporate')) <small class="form-text text-danger">{{$errors->first('corporate')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Öz tutma</label>
                                    <input readonly value="{{$order->oz_tutma}}" class="form-control" type="text">
                                    @if($errors->first('oz_tutma')) <small class="form-text text-danger">{{$errors->first('oz_tutma')}}</small> @endif
                                </div>
                            </div>

                            <input type="hidden" value="1" name="auditor_status">

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">İmtina səbəbi</label>
                                    <input readonly value="{{$order->reason_of_cancel}}" class="form-control" type="text">
                                    @if($errors->first('reason_of_cancel')) <small class="form-text text-danger">{{$errors->first('reason_of_cancel')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Əlavə xidmət</label>
                                    <input readonly value="{{$order->additional_service}}" class="form-control" type="text" >
                                    @if($errors->first('additional_service')) <small class="form-text text-danger">{{$errors->first('additional_service')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Şöbə</label>
                                    <input readonly value="{{$order->department}}" class="form-control" type="text">
                                    @if($errors->first('department')) <small class="form-text text-danger">{{$errors->first('department')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Məmnuniyyət statusu</label>
                                    <input readonly value="{{$order->satisfaction_status}}" class="form-control" type="text" >
                                    @if($errors->first('satisfaction_status')) <small class="form-text text-danger">{{$errors->first('satisfaction_status')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Danışıq müddəti(san)</label>
                                    <input readonly value="{{$order->speaking_duration}}" class="form-control" type="text" >
                                    @if($errors->first('speaking_duration')) <small class="form-text text-danger">{{$errors->first('speaking_duration')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Qeyd</label>
                                    <input readonly value="{{$order->note}}" class="form-control" type="text">
                                    @if($errors->first('note')) <small class="form-text text-danger">{{$errors->first('note')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Auditor</label>
                                    <input readonly value="{{$order->auditor_name}}" class="form-control" type="text" name="auditor_name">
                                </div>
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <nav>
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    @foreach($question_cats as $key => $question_cat)
                                        @if($question_cat->id !== 7)
                                            <a class="nav-item nav-link mb-3 {{$key == 0 ? 'active' : ''}}" id="nav-{{$question_cat->id}}-tab" data-toggle="tab" href="#nav-{{$question_cat->id}}" role="tab" aria-controls="nav-{{$question_cat->id}}" aria-checked="true">{{$question_cat->title}}</a>
                                        @endif
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
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
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
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Şəkillər</label><br>
                                    <input type="file" name="auditor_images[]" multiple class="form-control">
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
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <button class="btn btn-primary">Yadda saxla</button>
                                </div>
                            </div>
                            @foreach($order->groups  as $group)
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <a href="{{route('auditor_orders', $group->id)}}" class="btn btn-primary">Yeni sifarişlər siyahısına qayıt</a>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($order->groups  as $group)

                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <a href="{{route('worked_auditor_orders', $group->id)}}" class="btn btn-primary">İşlənmiş sifarişlər siyahısına qayıt</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@include('includes.footer')
