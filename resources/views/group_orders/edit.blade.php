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

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş nömrəsi</label>
                                    <input readonly value="{{$order->order_number}}" class="form-control" type="text" name="order_number">
                                    @if($errors->first('order_number')) <small class="form-text text-danger">{{$errors->first('order_number')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş tarixi</label>
                                    <input readonly value="{{$order->order_date}}" class="form-control" type="date" name="order_date">
                                    @if($errors->first('order_date')) <small class="form-text text-danger">{{$errors->first('order_date')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifariş id</label>
                                    <input readonly value="{{$order->order_id}}" class="form-control" type="text" name="order_id">
                                    @if($errors->first('order_id')) <small class="form-text text-danger">{{$errors->first('order_id')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Xidmət növü</label>
                                    <input readonly value="{{$order->service_type}}" class="form-control" type="text" name="service_type">
                                    @if($errors->first('service_type')) <small class="form-text text-danger">{{$errors->first('service_type')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon 2</label>
                                    <input readonly value="{{$order->phone_2}}" class="form-control" type="text" name="phone_2">
                                    @if($errors->first('phone_2')) <small class="form-text text-danger">{{$errors->first('phone_2')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş qeydi</label>
                                    <input readonly value="{{$order->service_note}}" class="form-control" type="text" name="service_note">
                                    @if($errors->first('service_note')) <small class="form-text text-danger">{{$errors->first('service_note')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Zəng tarixi</label>
                                    <input readonly value="{{$order->call_date}}" class="form-control" type="text" name="call_date">
                                    @if($errors->first('call_date')) <small class="form-text text-danger">{{$errors->first('call_date')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin bitmə tarixi</label>
                                    <input readonly value="{{$order->order_end_date}}" class="form-control" type="text" name="order_end_date">
                                    @if($errors->first('order_end_date')) <small class="form-text text-danger">{{$errors->first('order_end_date')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Müştəri</label>
                                    <input readonly value="{{$order->customer_name}}" class="form-control" type="text" name="customer_name">
                                    @if($errors->first('customer_name')) <small class="form-text text-danger">{{$errors->first('customer_name')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon</label>
                                    <input readonly value="{{$order->phone}}" class="form-control" type="text" name="phone">
                                    @if($errors->first('phone')) <small class="form-text text-danger">{{$errors->first('phone')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Korporativ</label>
                                    <input readonly value="{{$order->corporate}}" class="form-control" type="text" name="corporate">
                                    @if($errors->first('corporate')) <small class="form-text text-danger">{{$errors->first('corporate')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Operator</label>
                                    <input readonly value="{{$order->operator}}" class="form-control" type="text" name="operator">
                                    @if($errors->first('operator')) <small class="form-text text-danger">{{$errors->first('operator')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin statusu</label>
                                    <input readonly value="{{$order->order_status}}" class="form-control" type="text" name="order_status">
                                    @if($errors->first('order_status')) <small class="form-text text-danger">{{$errors->first('order_status')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Öz tutma</label>
                                    <input readonly value="{{$order->oz_tutma}}" class="form-control" type="text" name="oz_tutma">
                                    @if($errors->first('oz_tutma')) <small class="form-text text-danger">{{$errors->first('oz_tutma')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Məbləğ</label>
                                    <input readonly value="{{$order->amount}}" class="form-control" type="text" name="amount">
                                    @if($errors->first('amount')) <small class="form-text text-danger">{{$errors->first('amount')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücü</label>
                                    <input readonly value="{{$order->driver}}" class="form-control" type="text" name="driver">
                                    @if($errors->first('driver')) <small class="form-text text-danger">{{$errors->first('driver')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">İmtina səbəbi</label>
                                    <input readonly value="{{$order->reason_of_cancel}}" class="form-control" type="text" name="reason_of_cancel">
                                    @if($errors->first('reason_of_cancel')) <small class="form-text text-danger">{{$errors->first('reason_of_cancel')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sürücü məbləği</label>
                                    <input readonly value="{{$order->driver_amount}}" class="form-control" type="text" name="driver_amount">
                                    @if($errors->first('driver_amount')) <small class="form-text text-danger">{{$errors->first('driver_amount')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Usta</label>
                                    <input readonly value="{{$order->master}}" class="form-control" type="text" name="master">
                                    @if($errors->first('master')) <small class="form-text text-danger">{{$errors->first('master')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Fəhlə</label>
                                    <input readonly value="{{$order->worker}}" class="form-control" type="text" name="worker">
                                    @if($errors->first('worker')) <small class="form-text text-danger">{{$errors->first('worker')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Əlavə xidmət</label>
                                    <input readonly value="{{$order->additional_service}}" class="form-control" type="text" name="additional_service">
                                    @if($errors->first('additional_service')) <small class="form-text text-danger">{{$errors->first('additional_service')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Şöbə</label>
                                    <input readonly value="{{$order->department}}" class="form-control" type="text" name="department">
                                    @if($errors->first('department')) <small class="form-text text-danger">{{$errors->first('department')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Məmnuniyyət statusu</label>
                                    <input readonly value="{{$order->satisfaction_status}}" class="form-control" type="text" name="satisfaction_status">
                                    @if($errors->first('satisfaction_status')) <small class="form-text text-danger">{{$errors->first('satisfaction_status')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Ünvan</label>
                                    <input readonly value="{{$order->address}}" class="form-control" type="text" name="address">
                                    @if($errors->first('address')) <small class="form-text text-danger">{{$errors->first('address')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Danışıq müddəti(san)</label>
                                    <input readonly value="{{$order->speaking_duration}}" class="form-control" type="text" name="speaking_duration">
                                    @if($errors->first('speaking_duration')) <small class="form-text text-danger">{{$errors->first('speaking_duration')}}</small> @endif
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Qeyd</label>
                                    <input readonly value="{{$order->note}}" class="form-control" type="text" name="note">
                                    @if($errors->first('note')) <small class="form-text text-danger">{{$errors->first('note')}}</small> @endif
                                </div>
                            </div>


                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Auditor status</label>
                                    <input readonly value="{{$order->auditor_status}}" class="form-control" type="text" >
                                </div>
                            </div>

                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Auditor</label>
                                    <input readonly value="{{$order->auditor_name}}" class="form-control" type="text" >
                                </div>
                            </div>
                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Ustaları seç</label>
                                    <select class="js-example-basic-multiple" style="width: 100%" name="masters[]" multiple="multiple">
                                        @foreach($masters as $master)
                                            <option value="{{$master->id}}" @foreach($order->masters as $order_master) {{$order_master->id == $master->id ? 'selected' : ''}} @endforeach>{{$master->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-2 col-md-4 col-lg-3">
                                <div class="mb-3">
                                    <label class=" col-form-label">Köməkçiləri seç</label>
                                    <select class="js-example-basic-multiple" style="width: 100%" name="workers[]" multiple="multiple">
                                        @foreach($workers as $worker)
                                            <option value="{{$worker->id}}"   @foreach($order->workers as $order_worker) {{$order_worker->id == $worker->id ? 'selected' : ''}} @endforeach>{{$worker->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <nav>
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link mb-3 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-checked="true">Ümumi suallar</a>
                                    <a class="nav-item nav-link mb-3" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-checked="false">Sürücüyə aid suallar</a>
                                    <a class="nav-item nav-link mb-3" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-checked="false">Ustalara aid suallar</a>
                                    <a class="nav-item nav-link mb-3" id="nav-one-tab" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-checked="false">Yardımçı- köməkçilərə aid olan suallar</a>
                                    <a class="nav-item nav-link mb-3" id="nav-two-tab" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-checked="false">Müştəriyə aid suallar</a>
                                </div>
                            </nav>
                            <br><br>
                            <br>
                            <div class="tab-content mb-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Geyim forması, saç-saqqal düzümü</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->clothes == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="clothes" id="clothes1">
                                                        <label  class="form-check-label" for="clothes1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->clothes == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="clothes" id="clothes2">
                                                        <label class="form-check-label" for="clothes2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->clothes == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="clothes" id="clothes3">
                                                        <label class="form-check-label" for="clothes3">
                                                            Ağır
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div class="form-check form-switch mb-3" dir="ltr">
                                                    <input type="checkbox" class="form-check-input" id="customSwitch1" checked="">
                                                    <label class="form-check-label" for="customSwitch1">Geyim forması, saç-saqqal düzümü (Orta)</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div class="radio-icon-container">
                                                    <input type="checkbox" name="clothes_new" class="radio_button">
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check"></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck"></i>
                                                        Geyim forması, saç-saqqal düzümü (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div class="radio-icon-container">
                                                    <input type="checkbox" name="clothes_test" class="radio_button">
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check"></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck"></i>
                                                        Geyim forması, saç-saqqal düzümü (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">FMV-dən istifadə edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->fmv == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="fmv" id="fmv1">
                                                        <label  class="form-check-label" for="fmv1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->fmv == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="fmv" id="fmv2">
                                                        <label class="form-check-label" for="fmv2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->fmv == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="fmv" id="fmv3">
                                                        <label class="form-check-label" for="fmv3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Riskləri düzgün qiymətləndirirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->risk == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="risk" id="risk1" >
                                                        <label  class="form-check-label" for="risk1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->risk == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="risk" id="risk2">
                                                        <label class="form-check-label" for="risk2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->risk == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="risk" id="risk3">
                                                        <label class="form-check-label" for="risk3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Şirkət daxili tələblərə əməl edirmi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->internal_rules == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="internal_rules" id="internal_rules1">
                                                        <label  class="form-check-label" for="internal_rules1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->internal_rules == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="internal_rules" id="internal_rules2">
                                                        <label class="form-check-label" for="internal_rules2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->internal_rules == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="internal_rules" id="internal_rules3">
                                                        <label class="form-check-label" for="internal_rules3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Etik və müştəri ilə davranış qaydalarına əməl olunurmu?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->behavior_rules == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="behavior_rules" id="behavior_rules1">
                                                        <label  class="form-check-label" for="behavior_rules1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->behavior_rules == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="behavior_rules" id="behavior_rules2">
                                                        <label class="form-check-label" for="behavior_rules2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->behavior_rules == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="behavior_rules" id="behavior_rules3">
                                                        <label class="form-check-label" for="behavior_rules3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Təhlükəsizlik qaydalarını riyaət edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->safety == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="safety" id="safety1">
                                                        <label  class="form-check-label" for="safety1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->safety == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="safety" id="safety2">
                                                        <label class="form-check-label" for="safety2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->safety == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="safety" id="safety3">
                                                        <label class="form-check-label" for="safety3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Təhvil-təslim aktı</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->delivery == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="delivery" id="delivery1">
                                                        <label  class="form-check-label" for="delivery1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->delivery == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="delivery" id="delivery2">
                                                        <label class="form-check-label" for="delivery2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->delivery == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="delivery" id="delivery3">
                                                        <label class="form-check-label" for="delivery3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">İş dəftərinin yazılması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->workbook == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="workbook" id="workbook1">
                                                        <label  class="form-check-label" for="workbook1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->workbook == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="workbook" id="workbook2">
                                                        <label class="form-check-label" for="workbook2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->workbook == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="workbook" id="workbook3">
                                                        <label class="form-check-label" for="workbook3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Sürücülük vəsiqəsi, yol vərəqəsi, texpasport, təmir kitabçası, gündəlik baxış kitabı qaydasındadırmı?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->license == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="license" id="license1">
                                                        <label  class="form-check-label" for="license1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->license == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="license" id="license2">
                                                        <label class="form-check-label" for="license2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->license == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="license" id="license3">
                                                        <label class="form-check-label" for="license3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">YSB-nin yoxlanılması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->ysb == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="ysb" id="ysb1">
                                                        <label  class="form-check-label" for="ysb1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->ysb == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="ysb" id="ysb2">
                                                        <label class="form-check-label" for="ysb2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->ysb == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="ysb" id="ysb3">
                                                        <label class="form-check-label" for="ysb3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Tibb qutusunun yoxlanılması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->medicine == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="medicine" id="medicine1" >
                                                        <label  class="form-check-label" for="medicine1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->medicine == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="medicine" id="medicine2">
                                                        <label class="form-check-label" for="medicine2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->medicine == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="medicine" id="medicine3">
                                                        <label class="form-check-label" for="medicine3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Maşının ümumi təmizliyi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->cleaning == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="cleaning" id="cleaning1">
                                                        <label  class="form-check-label" for="cleaning1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->cleaning == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="cleaning" id="cleaning2">
                                                        <label class="form-check-label" for="cleaning2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->cleaning == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="cleaning" id="cleaning3">
                                                        <label class="form-check-label" for="cleaning3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Sürücü yükləmə-boşaltma işlərinə nəzarəti</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->loading_unloading == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="loading_unloading" id="loading_unloading1">
                                                        <label  class="form-check-label" for="loading_unloading1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->loading_unloading == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="loading_unloading" id="loading_unloading2">
                                                        <label class="form-check-label" for="loading_unloading2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->loading_unloading == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="loading_unloading" id="loading_unloading3">
                                                        <label class="form-check-label" for="loading_unloading3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Yol hərəkəti qaydalarına riayət edilməsi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->traffic_rules == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="traffic_rules" id="traffic_rules1">
                                                        <label  class="form-check-label" for="traffic_rules1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->traffic_rules == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="traffic_rules" id="traffic_rules2">
                                                        <label class="form-check-label" for="traffic_rules2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->traffic_rules == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="traffic_rules" id="traffic_rules3">
                                                        <label class="form-check-label" for="traffic_rules3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Qablaşdırmanın düzgün icra edilməsi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->packaging == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="packaging" id="packaging1">
                                                        <label  class="form-check-label" for="packaging1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->packaging == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="packaging" id="packaging2">
                                                        <label class="form-check-label" for="packaging2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->packaging == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="packaging" id="packaging3">
                                                        <label class="form-check-label" for="packaging3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Sökülmə və quraşdırılmanın düzgün icra olunması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->installation == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="installation" id="installation1">
                                                        <label  class="form-check-label" for="installation1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->installation == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="installation" id="installation2">
                                                        <label class="form-check-label" for="installation2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->installation == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="installation" id="installation3">
                                                        <label class="form-check-label" for="installation3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Xüsusi yükləri düzgün daşıyırmı?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->special_loads == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="special_loads" id="special_loads1">
                                                        <label  class="form-check-label" for="special_loads1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->special_loads == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="special_loads" id="special_loads2">
                                                        <label class="form-check-label" for="special_loads2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->special_loads == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="special_loads" id="special_loads3">
                                                        <label class="form-check-label" for="special_loads3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Əllə yük qaldırma qaydalarına düzgün riyaət edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->manual_lifting == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="manual_lifting" id="manual_lifting1">
                                                        <label  class="form-check-label" for="manual_lifting1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->manual_lifting == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="manual_lifting" id="manual_lifting2">
                                                        <label class="form-check-label" for="manual_lifting2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->manual_lifting == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="manual_lifting" id="manual_lifting3">
                                                        <label class="form-check-label" for="manual_lifting3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">  Əllə yük qaldırma və daşıma   vasitələrindən düzgün istifadə edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->lifting_correctly == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="lifting_correctly" id="lifting_correctly1">
                                                        <label  class="form-check-label" for="lifting_correctly1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->lifting_correctly == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="lifting_correctly" id="lifting_correctly2">
                                                        <label class="form-check-label" for="lifting_correctly2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->lifting_correctly == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="lifting_correctly" id="lifting_correctly3">
                                                        <label class="form-check-label" for="lifting_correctly3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Xidmətimiz işinizi asanlaşdırdımı? </h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->job_easier == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="job_easier" id="job_easier1">
                                                        <label  class="form-check-label" for="job_easier1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->job_easier == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="job_easier" id="job_easier2">
                                                        <label class="form-check-label" for="job_easier2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->job_easier == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="job_easier" id="job_easier3">
                                                        <label class="form-check-label" for="job_easier3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Hansısa alternativ(rəqib) şirkətlərlə danışmısınız?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->alternative_companies == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="alternative_companies" id="alternative_companies1">
                                                        <label  class="form-check-label" for="alternative_companies1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->alternative_companies == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="alternative_companies" id="alternative_companies2">
                                                        <label class="form-check-label" for="alternative_companies2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->alternative_companies == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="alternative_companies" id="alternative_companies3">
                                                        <label class="form-check-label" for="alternative_companies3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Xidmətimizi başqalarına tövsiyə edərsinizmi? </h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->recommend == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="recommend" id="recommend1">
                                                        <label  class="form-check-label" for="recommend1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->recommend == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="recommend" id="recommend2">
                                                        <label class="form-check-label" for="recommend2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->recommend == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="recommend" id="recommend3">
                                                        <label class="form-check-label" for="recommend3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <div>
                                    <input type="hidden" value="{{auth()->user()->name}}" name="auditor_name">
                                    <h5 class="font-size-14 mb-4">Status</h5>
                                    <div class="form-check mb-3">
                                        <input value="Yaxşı" {{$order->auditor_status == 'Yaxşı' ? 'checked' : ''}} class="form-check-input" type="radio" name="auditor_status" id="auditor_status1">
                                        <label  class="form-check-label" for="auditor_status1">
                                            Yaxşı
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input value="Orta" {{$order->auditor_status == 'Orta' ? 'checked' : ''}} class="form-check-input" type="radio" name="auditor_status" id="auditor_status2">
                                        <label class="form-check-label" for="auditor_status2">
                                            Orta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="Ağır" {{$order->auditor_status == 'Ağır' ? 'checked' : ''}} class="form-check-input" type="radio" name="auditor_status" id="auditor_status3">
                                        <label class="form-check-label" for="auditor_status3">
                                            Ağır
                                        </label>
                                    </div>
                                </div>
                            </div>
{{--                            <p>Auditor adı: {{$order->auditor_name}}</p>--}}
                            <div class="row">
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="mb-3">
                                        <button class="btn btn-primary">Yadda saxla</button>
                                    </div>
                                </div>
                                @foreach($order->groups  as $group)
                                    <div class="col-2 col-md-4 col-lg-3">
                                        <div class="mb-3">
                                            <a href="{{route('auditor_orders', $group->id)}}" class="btn btn-primary">Yeni sifarişlər siyahısına qayıt</a>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach($order->groups  as $group)

                                    <div class="col-2 col-md-4 col-lg-3">
                                        <div class="mb-3">
                                            <a href="{{route('worked_auditor_orders', $group->id)}}" class="btn btn-primary">İşlənmiş sifarişlər siyahısına qayıt</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@include('includes.footer')
