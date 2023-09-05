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

                            <div class="col-2">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifariş id</label>
                                    <input readonly value="{{$order->order_id}}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="col-form-label">Ünvan</label>
                                    <input readonly value="{{$order->address}}" class="form-control" type="text">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücü</label>
                                    <input readonly value="{{$order->driver}}" class="form-control" type="text" >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş tarixi</label>
                                    <input readonly value="{{$order->order_date}}" class="form-control" type="date">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="mb-3">
                                    <label class="col-form-label">Zəng tarixi</label>
                                    <input readonly value="{{$order->call_date}}" class="form-control" type="text" >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin bitmə tarixi</label>
                                    <input readonly value="{{$order->order_end_date}}" class="form-control" type="text" >
                                </div>
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-checked="true">Ümumi suallar</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-checked="false">Sürücüyə aid suallar</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-checked="false">Ustalara aid suallar</a>
                                    <a class="nav-item nav-link" id="nav-one-tab" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-checked="false">Yardımçı- köməkçilərə aid olan suallar</a>
                                    <a class="nav-item nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-checked="false">Müştəriyə aid suallar</a>
                                </div>
                            </nav>
                            <br><br>
                            <br>
                            <div class="tab-content mb-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">

                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Geyim forması, saç-saqqal düzümü</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->clothes == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="clothes" id="clothes1">
                                                        <label  class="form-check-label" for="clothes1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->clothes == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="clothes" id="clothes2">
                                                        <label class="form-check-label" for="clothes2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->clothes == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="clothes" id="clothes3">
                                                        <label class="form-check-label" for="clothes3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">FMV-dən istifadə edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->fmv == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="fmv" id="fmv1">
                                                        <label  class="form-check-label" for="fmv1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->fmv == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="fmv" id="fmv2">
                                                        <label class="form-check-label" for="fmv2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->fmv == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="fmv" id="fmv3">
                                                        <label class="form-check-label" for="fmv3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Riskləri düzgün qiymətləndirirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->risk == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="risk" id="risk1" >
                                                        <label  class="form-check-label" for="risk1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->risk == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="risk" id="risk2">
                                                        <label class="form-check-label" for="risk2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->risk == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="risk" id="risk3">
                                                        <label class="form-check-label" for="risk3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Şirkət daxili tələblərə əməl edirmi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->internal_rules == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="internal_rules" id="internal_rules1">
                                                        <label  class="form-check-label" for="internal_rules1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->internal_rules == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="internal_rules" id="internal_rules2">
                                                        <label class="form-check-label" for="internal_rules2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->internal_rules == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="internal_rules" id="internal_rules3">
                                                        <label class="form-check-label" for="internal_rules3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Etik və müştəri ilə davranış qaydalarına əməl olunurmu?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->behavior_rules == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="behavior_rules" id="behavior_rules1">
                                                        <label  class="form-check-label" for="behavior_rules1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->behavior_rules == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="behavior_rules" id="behavior_rules2">
                                                        <label class="form-check-label" for="behavior_rules2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->behavior_rules == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="behavior_rules" id="behavior_rules3">
                                                        <label class="form-check-label" for="behavior_rules3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Təhlükəsizlik qaydalarını riyaət edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->safety == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="safety" id="safety1">
                                                        <label  class="form-check-label" for="safety1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->safety == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="safety" id="safety2">
                                                        <label class="form-check-label" for="safety2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->safety == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="safety" id="safety3">
                                                        <label class="form-check-label" for="safety3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Təhvil-təslim aktı</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->delivery == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="delivery" id="delivery1">
                                                        <label  class="form-check-label" for="delivery1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->delivery == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="delivery" id="delivery2">
                                                        <label class="form-check-label" for="delivery2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->delivery == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="delivery" id="delivery3">
                                                        <label class="form-check-label" for="delivery3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">İş dəftərinin yazılması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->workbook == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="workbook" id="workbook1">
                                                        <label  class="form-check-label" for="workbook1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->workbook == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="workbook" id="workbook2">
                                                        <label class="form-check-label" for="workbook2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->workbook == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="workbook" id="workbook3">
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
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Sürücülük vəsiqəsi, yol vərəqəsi, texpasport, təmir kitabçası, gündəlik baxış kitabı qaydasındadırmı?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->license == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="license" id="license1">
                                                        <label  class="form-check-label" for="license1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->license == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="license" id="license2">
                                                        <label class="form-check-label" for="license2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->license == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="license" id="license3">
                                                        <label class="form-check-label" for="license3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">YSB-nin yoxlanılması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->ysb == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="ysb" id="ysb1">
                                                        <label  class="form-check-label" for="ysb1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->ysb == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="ysb" id="ysb2">
                                                        <label class="form-check-label" for="ysb2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->ysb == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="ysb" id="ysb3">
                                                        <label class="form-check-label" for="ysb3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Tibb qutusunun yoxlanılması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->medicine == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="medicine" id="medicine1" >
                                                        <label  class="form-check-label" for="medicine1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->medicine == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="medicine" id="medicine2">
                                                        <label class="form-check-label" for="medicine2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->medicine == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="medicine" id="medicine3">
                                                        <label class="form-check-label" for="medicine3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Maşının ümumi təmizliyi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->cleaning == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="cleaning" id="cleaning1">
                                                        <label  class="form-check-label" for="cleaning1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->cleaning == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="cleaning" id="cleaning2">
                                                        <label class="form-check-label" for="cleaning2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->cleaning == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="cleaning" id="cleaning3">
                                                        <label class="form-check-label" for="cleaning3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Sürücü yükləmə-boşaltma işlərinə nəzarəti</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->loading_unloading == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="loading_unloading" id="loading_unloading1">
                                                        <label  class="form-check-label" for="loading_unloading1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->loading_unloading == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="loading_unloading" id="loading_unloading2">
                                                        <label class="form-check-label" for="loading_unloading2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->loading_unloading == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="loading_unloading" id="loading_unloading3">
                                                        <label class="form-check-label" for="loading_unloading3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Yol hərəkəti qaydalarına riayət edilməsi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->traffic_rules == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="traffic_rules" id="traffic_rules1">
                                                        <label  class="form-check-label" for="traffic_rules1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->traffic_rules == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="traffic_rules" id="traffic_rules2">
                                                        <label class="form-check-label" for="traffic_rules2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->traffic_rules == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="traffic_rules" id="traffic_rules3">
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
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Qablaşdırmanın düzgün icra edilməsi</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->packaging == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="packaging" id="packaging1">
                                                        <label  class="form-check-label" for="packaging1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->packaging == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="packaging" id="packaging2">
                                                        <label class="form-check-label" for="packaging2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->packaging == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="packaging" id="packaging3">
                                                        <label class="form-check-label" for="packaging3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Sökülmə və quraşdırılmanın düzgün icra olunması</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->installation == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="installation" id="installation1">
                                                        <label  class="form-check-label" for="installation1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->installation == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="installation" id="installation2">
                                                        <label class="form-check-label" for="installation2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->installation == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="installation" id="installation3">
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
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Xüsusi yükləri düzgün daşıyırmı?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->special_loads == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="special_loads" id="special_loads1">
                                                        <label  class="form-check-label" for="special_loads1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->special_loads == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="special_loads" id="special_loads2">
                                                        <label class="form-check-label" for="special_loads2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->special_loads == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="special_loads" id="special_loads3">
                                                        <label class="form-check-label" for="special_loads3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Əllə yük qaldırma qaydalarına düzgün riyaət edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->manual_lifting == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="manual_lifting" id="manual_lifting1">
                                                        <label  class="form-check-label" for="manual_lifting1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->manual_lifting == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="manual_lifting" id="manual_lifting2">
                                                        <label class="form-check-label" for="manual_lifting2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->manual_lifting == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="manual_lifting" id="manual_lifting3">
                                                        <label class="form-check-label" for="manual_lifting3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">  Əllə yük qaldırma və daşıma   vasitələrindən düzgün istifadə edirmi?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->lifting_correctly == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="lifting_correctly" id="lifting_correctly1">
                                                        <label  class="form-check-label" for="lifting_correctly1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->lifting_correctly == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="lifting_correctly" id="lifting_correctly2">
                                                        <label class="form-check-label" for="lifting_correctly2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->lifting_correctly == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="lifting_correctly" id="lifting_correctly3">
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
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Xidmətimiz işinizi asanlaşdırdımı? </h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->job_easier == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="job_easier" id="job_easier1">
                                                        <label  class="form-check-label" for="job_easier1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->job_easier == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="job_easier" id="job_easier2">
                                                        <label class="form-check-label" for="job_easier2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->job_easier == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="job_easier" id="job_easier3">
                                                        <label class="form-check-label" for="job_easier3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Hansısa alternativ(rəqib) şirkətlərlə danışmısınız?</h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->alternative_companies == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="alternative_companies" id="alternative_companies1">
                                                        <label  class="form-check-label" for="alternative_companies1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->alternative_companies == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="alternative_companies" id="alternative_companies2">
                                                        <label class="form-check-label" for="alternative_companies2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->alternative_companies == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="alternative_companies" id="alternative_companies3">
                                                        <label class="form-check-label" for="alternative_companies3">
                                                            Ağır
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <div>
                                                    <h5 class="font-size-14 mb-4">Xidmətimizi başqalarına tövsiyə edərsinizmi? </h5>
                                                    <div class="form-check mb-3">
                                                        <input value="Yaxşı" {{$order->recommend == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="recommend" id="recommend1">
                                                        <label  class="form-check-label" for="recommend1">
                                                            Yaxşı
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input value="Orta" {{$order->recommend == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="recommend" id="recommend2">
                                                        <label class="form-check-label" for="recommend2">
                                                            Orta
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="Ağır" {{$order->recommend == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="recommend" id="recommend3">
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
                                        <input value="Yaxşı" {{$order->auditor_status == 'Yaxşı' ? 'checked' : ''}} required class="form-check-input" type="radio" name="auditor_status" id="auditor_status1">
                                        <label  class="form-check-label" for="auditor_status1">
                                            Yaxşı
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input value="Orta" {{$order->auditor_status == 'Orta' ? 'checked' : ''}} required class="form-check-input" type="radio" name="auditor_status" id="auditor_status2">
                                        <label class="form-check-label" for="auditor_status2">
                                            Orta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="Ağır" {{$order->auditor_status == 'Ağır' ? 'checked' : ''}} required class="form-check-input" type="radio" name="auditor_status" id="auditor_status3">
                                        <label class="form-check-label" for="auditor_status3">
                                            Ağır
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
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
