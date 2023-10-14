@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('auditor_store_order')}}" method="post" id="create_order_auditor" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifariş id</label>
                                    <input class="form-control" name="order_id" type="text">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Xidmət növü</label>
                                    <select name="service_type" class="form-control">
                                        <option value="Yükdaşıma" selected>Yükdaşıma</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş tarixi</label>
                                    <input  class="form-control"  name="order_date" type="text">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Ünvan</label>
                                    <input  class="form-control" type="text" name="address">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <div class="row">

                                        <div class="col-10 col-md-10 col-lg-10">
                                            <div class="mb-3">
                                                <label class=" col-form-label">Sürücü seç</label>
                                                <select class="js-example-basic-single form-control" style="width: 100%" name="driver">
                                                    <option selected disabled >----</option>
                                                    @foreach($drivers as $driver)
                                                        <option value="{{$driver->title}}">{{$driver->title}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-2 col-md-2 col-lg-2">
                                            <div class="mt-5">
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" type="checkbox" id="my-checkbox"  value="1" name="driver_thick">
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
                                    <input  class="form-control" type="text" name="order_status">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label"> Maşın nömrəsi</label>
                                    <input   class="form-control"  type="text" name="car_number">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Fəhlə sayı</label>
                                    <input   class="form-control"  type="text" name="worker_count">
                                </div>
                            </div>


                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Usta sayı</label>
                                    <input   class="form-control"  type="text" name="master_count">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="row">
                                    <div class="col-10 col-md-10 col-lg-10">
                                        <div class="mb-3">
                                            <label class="col-form-label">Operator</label>
                                            <input  class="form-control" type="text" name="operator">
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2">
                                        <div class="mt-5">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox4"  value="1" name="operator_thick">
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
                                                    <option value="{{$master->id}}">{{$master->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2">
                                        <div class="mt-5">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox2"  value="1"  name="master_thick"  >
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
                                                    <option value="{{$worker->id}}">{{$worker->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2">
                                        <div class="mt-5">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox3"  value="1" name="worker_thick" >
                                                <input type="text" id="custom-input3" value="0" name="custom_input_worker" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücünün telefon nömrəsi</label>
                                    <input   class="form-control"  type="text" name="driver_phone">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Fəhlə məbləği</label>
                                    <input  class="form-control" type="text" name="worker">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Usta məbləği</label>
                                    <input class="form-control" type="text"  name="master">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sürücü məbləği</label>
                                    <input class="form-control" type="text" name="driver_amount">

                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class=" col-form-label">Ümumi məbləğ</label>
                                    <input  class="form-control" type="text" name="amount">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücünün qrup rəhbəri</label>
                                    <input   class="form-control"  type="text" name="driver_group_head">
                                </div>
                            </div>

                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Qaraj adı</label>
                                    <input   class="form-control" type="text"  name="garage_name">
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Korporativ</label>
                                    <input  class="form-control" type="text" name="corporate">
                                </div>
                            </div>

                       <input type="hidden" value="1" name="auditor_status">

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

                                                            <input type="radio" name="answers[{{ $question->id }}]" class="radio_button" value="1" >
                                                            <input type="radio" name="answers[{{ $question->id }}]" class="radio_button" value="0">

                                                            <label for="option1" class="radio-label">
                                                                <i class="fas fa-check clicked_jquery_check   "></i>
                                                                <i class="fas fa-times clicked_jquery_uncheck  "></i>
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
                                    <textarea style="width: 100%"  class="form-control" type="text" name="auditor_note"></textarea>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">

                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="mb-3">
                                            <label class="col-form-label">Müştəri razıdır?</label>
                                        </div>
                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1">
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="my-checkbox5"  value="1" name="satisfied_thick">
                                                <input type="text" id="custom-input4" value="0" name="custom_input_satisfied" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" value="0" name="is_new">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label class="col-form-label">Şəkillər</label><br>
                                    <input type="file" name="auditor_images[]" multiple class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <button class="btn btn-primary">Yadda saxla</button>
                                </div>
                            </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <a href="{{route('auditor_orders', auth()->user()->group_id)}}" class="btn btn-primary">Yeni sifarişlər siyahısına qayıt</a>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <a href="{{route('worked_auditor_orders', auth()->user()->group_id)}}" class="btn btn-primary">İşlənmiş sifarişlər siyahısına qayıt</a>
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
