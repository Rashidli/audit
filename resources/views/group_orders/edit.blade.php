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
                                                <div class="radio-icon-container">

                                                    <input type="radio" name="clothes" class="radio_button" value="1" {{$order->clothes == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="clothes" class="radio_button" value="0" {{$order->clothes == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->clothes == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->clothes == '0' ? 'checked' : ''}}"></i>
                                                        Geyim forması, saç-saqqal düzümü (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="fmv" class="radio_button" value="1" {{$order->fmv == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="fmv" class="radio_button" value="0" {{$order->fmv == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->fmv == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->fmv == '0' ? 'checked' : ''}}"></i>
                                                        FMV-dən istifadə edirmi? (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">
                                                <div class="radio-icon-container">

                                                    <input type="radio" name="risk" class="radio_button" value="1" {{$order->risk == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="risk" class="radio_button" value="0" {{$order->risk == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->risk == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->risk == '0' ? 'checked' : ''}}"></i>
                                                        Riskləri düzgün qiymətləndirirmi? (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="internal_rules" class="radio_button" value="1" {{$order->internal_rules == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="internal_rules" class="radio_button" value="0" {{$order->internal_rules == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->internal_rules == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->internal_rules == '0' ? 'checked' : ''}}"></i>
                                                        Şirkət daxili tələblərə əməl edirmi (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="behavior_rules" class="radio_button" value="1" {{$order->behavior_rules == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="behavior_rules" class="radio_button" value="0" {{$order->behavior_rules == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->behavior_rules == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->behavior_rules == '0' ? 'checked' : ''}}"></i>
                                                        Etik və müştəri ilə davranış qaydalarına əməl olunurmu? (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="safety" class="radio_button" value="1" {{$order->safety == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="safety" class="radio_button" value="0" {{$order->safety == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->safety == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->safety == '0' ? 'checked' : ''}}"></i>
                                                        Təhlükəsizlik qaydalarını riyaət edirmi? (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="delivery" class="radio_button" value="1" {{$order->delivery == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="delivery" class="radio_button" value="0" {{$order->delivery == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->delivery == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->delivery == '0' ? 'checked' : ''}}"></i>
                                                        Təhvil-təslim aktı (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="workbook" class="radio_button" value="1" {{$order->workbook == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="workbook" class="radio_button" value="0" {{$order->workbook == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->workbook == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->workbook == '0' ? 'checked' : ''}}"></i>
                                                        İş dəftərinin yazılması (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="license" class="radio_button" value="1" {{$order->license == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="license" class="radio_button" value="0" {{$order->license == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->license == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->license == '0' ? 'checked' : ''}}"></i>
                                                        Sürücülük vəsiqəsi, yol vərəqəsi, texpasport, təmir kitabçası, gündəlik baxış kitabı qaydasındadırmı? (Orta)
                                                    </label>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="ysb" class="radio_button" value="1" {{$order->ysb == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="ysb" class="radio_button" value="0" {{$order->ysb == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->ysb == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->ysb == '0' ? 'checked' : ''}}"></i>
                                                        YSB-nin yoxlanılması (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="medicine" class="radio_button" value="1" {{$order->medicine == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="medicine" class="radio_button" value="0" {{$order->medicine == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->medicine == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->medicine == '0' ? 'checked' : ''}}"></i>
                                                        Tibb qutusunun yoxlanılması (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">


                                                <div class="radio-icon-container">

                                                    <input type="radio" name="cleaning" class="radio_button" value="1" {{$order->cleaning == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="cleaning" class="radio_button" value="0" {{$order->cleaning == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->cleaning == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->cleaning == '0' ? 'checked' : ''}}"></i>
                                                        Maşının ümumi təmizliyi (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="loading_unloading" class="radio_button" value="1" {{$order->loading_unloading == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="loading_unloading" class="radio_button" value="0" {{$order->loading_unloading == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->loading_unloading == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->loading_unloading == '0' ? 'checked' : ''}}"></i>
                                                        Sürücü yükləmə-boşaltma işlərinə nəzarəti (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="traffic_rules" class="radio_button" value="1" {{$order->traffic_rules == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="traffic_rules" class="radio_button" value="0" {{$order->traffic_rules == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->traffic_rules == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->traffic_rules == '0' ? 'checked' : ''}}"></i>
                                                        Yol hərəkəti qaydalarına riayət edilməsi (Orta/Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="packaging" class="radio_button" value="1" {{$order->packaging == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="packaging" class="radio_button" value="0" {{$order->packaging == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->packaging == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->packaging == '0' ? 'checked' : ''}}"></i>
                                                        Qablaşdırmanın düzgün icra edilməsi (Orta)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="installation" class="radio_button" value="1" {{$order->installation == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="installation" class="radio_button" value="0" {{$order->installation == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->installation == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->installation == '0' ? 'checked' : ''}}"></i>
                                                        Sökülmə və quraşdırılmanın düzgün icra olunması (Orta)
                                                    </label>

                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="special_loads" class="radio_button" value="1" {{$order->special_loads == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="special_loads" class="radio_button" value="0" {{$order->special_loads == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->special_loads == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->special_loads == '0' ? 'checked' : ''}}"></i>
                                                        Xüsusi yükləri düzgün daşıyırmı? (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="manual_lifting" class="radio_button" value="1" {{$order->manual_lifting == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="manual_lifting" class="radio_button" value="0" {{$order->manual_lifting == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->manual_lifting == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->manual_lifting == '0' ? 'checked' : ''}}"></i>
                                                        Əllə yük qaldırma qaydalarına düzgün riyaət edirmi? (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="lifting_correctly" class="radio_button" value="1" {{$order->lifting_correctly == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="lifting_correctly" class="radio_button" value="0" {{$order->lifting_correctly == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->lifting_correctly == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->lifting_correctly == '0' ? 'checked' : ''}}"></i>
                                                        Əllə yük qaldırma və daşıma   vasitələrindən düzgün istifadə edirmi? (Ağır)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                                    <div class="row">
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">


                                                <div class="radio-icon-container">

                                                    <input type="radio" name="job_easier" class="radio_button" value="1" {{$order->job_easier == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="job_easier" class="radio_button" value="0" {{$order->job_easier == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->job_easier == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->job_easier == '0' ? 'checked' : ''}}"></i>
                                                        Xidmətimiz işinizi asanlaşdırdımı?
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="alternative_companies" class="radio_button" value="1" {{$order->alternative_companies == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="alternative_companies" class="radio_button" value="0" {{$order->alternative_companies == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->alternative_companies == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->alternative_companies == '0' ? 'checked' : ''}}"></i>
                                                        Hansısa alternativ(rəqib) şirkətlərlə danışmısınız?
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-4 col-lg-3">
                                            <div class="mb-3">

                                                <div class="radio-icon-container">

                                                    <input type="radio" name="recommend" class="radio_button" value="1" {{$order->recommend == '1' ? 'checked' : ''}}>
                                                    <input type="radio" name="recommend" class="radio_button" value="0" {{$order->recommend == '0' ? 'checked' : ''}}>
                                                    <label for="option1" class="radio-label">
                                                        <i class="fas fa-check clicked_jquery_check {{$order->recommend == '1' ? 'checked' : ''}} "></i>
                                                        <i class="fas fa-times clicked_jquery_uncheck {{$order->recommend == '0' ? 'checked' : ''}}"></i>
                                                        Xidmətimizi başqalarına tövsiyə edərsinizmi?
                                                    </label>

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
                                        <input value="Yüngül" {{$order->auditor_status == 'Yüngül' ? 'checked' : ''}} class="form-check-input" type="radio" name="auditor_status" id="auditor_status1">
                                        <label  class="form-check-label" for="auditor_status1">
                                            Yüngül
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
