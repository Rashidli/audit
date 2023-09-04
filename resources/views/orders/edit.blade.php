@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('orders.update', $order->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş nömrəsi</label>
                                    <input value="{{$order->order_number}}" class="form-control" type="text" name="order_number">
                                    @if($errors->first('order_number')) <small class="form-text text-danger">{{$errors->first('order_number')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş tarixi</label>
                                    <input value="{{$order->order_date}}" class="form-control" type="date" name="order_date">
                                    @if($errors->first('order_date')) <small class="form-text text-danger">{{$errors->first('order_date')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifariş id</label>
                                    <input value="{{$order->order_id}}" class="form-control" type="text" name="order_id">
                                    @if($errors->first('order_id')) <small class="form-text text-danger">{{$errors->first('order_id')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Xidmət növü</label>
                                    <input value="{{$order->service_type}}" class="form-control" type="text" name="service_type">
                                    @if($errors->first('service_type')) <small class="form-text text-danger">{{$errors->first('service_type')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon 2</label>
                                    <input value="{{$order->phone_2}}" class="form-control" type="text" name="phone_2">
                                    @if($errors->first('phone_2')) <small class="form-text text-danger">{{$errors->first('phone_2')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Sifariş qeydi</label>
                                    <input value="{{$order->service_note}}" class="form-control" type="text" name="service_note">
                                    @if($errors->first('service_note')) <small class="form-text text-danger">{{$errors->first('service_note')}}</small> @endif
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Zəng tarixi</label>
                                    <input value="{{$order->call_date}}" class="form-control" type="text" name="call_date">
                                    @if($errors->first('call_date')) <small class="form-text text-danger">{{$errors->first('call_date')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin bitmə tarixi</label>
                                    <input value="{{$order->order_end_date}}" class="form-control" type="text" name="order_end_date">
                                    @if($errors->first('order_end_date')) <small class="form-text text-danger">{{$errors->first('order_end_date')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Müştəri</label>
                                    <input value="{{$order->customer_name}}" class="form-control" type="text" name="customer_name">
                                    @if($errors->first('customer_name')) <small class="form-text text-danger">{{$errors->first('customer_name')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Telefon</label>
                                    <input value="{{$order->phone}}" class="form-control" type="text" name="phone">
                                    @if($errors->first('phone')) <small class="form-text text-danger">{{$errors->first('phone')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Korporativ</label>
                                    <input value="{{$order->corporate}}" class="form-control" type="text" name="corporate">
                                    @if($errors->first('corporate')) <small class="form-text text-danger">{{$errors->first('corporate')}}</small> @endif
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Operator</label>
                                    <input value="{{$order->operator}}" class="form-control" type="text" name="operator">
                                    @if($errors->first('operator')) <small class="form-text text-danger">{{$errors->first('operator')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Sifarişin statusu</label>
                                    <input value="{{$order->order_status}}" class="form-control" type="text" name="order_status">
                                    @if($errors->first('order_status')) <small class="form-text text-danger">{{$errors->first('order_status')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Öz tutma</label>
                                    <input value="{{$order->oz_tutma}}" class="form-control" type="text" name="oz_tutma">
                                    @if($errors->first('oz_tutma')) <small class="form-text text-danger">{{$errors->first('oz_tutma')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Məbləğ</label>
                                    <input value="{{$order->amount}}" class="form-control" type="text" name="amount">
                                    @if($errors->first('amount')) <small class="form-text text-danger">{{$errors->first('amount')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Sürücü</label>
                                    <input value="{{$order->driver}}" class="form-control" type="text" name="driver">
                                    @if($errors->first('driver')) <small class="form-text text-danger">{{$errors->first('driver')}}</small> @endif
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="col-form-label">İmtina səbəbi</label>
                                    <input value="{{$order->reason_of_cancel}}" class="form-control" type="text" name="reason_of_cancel">
                                    @if($errors->first('reason_of_cancel')) <small class="form-text text-danger">{{$errors->first('reason_of_cancel')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Sürücü məbləği</label>
                                    <input value="{{$order->driver_amount}}" class="form-control" type="text" name="driver_amount">
                                    @if($errors->first('driver_amount')) <small class="form-text text-danger">{{$errors->first('driver_amount')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Usta</label>
                                    <input value="{{$order->master}}" class="form-control" type="text" name="master">
                                    @if($errors->first('master')) <small class="form-text text-danger">{{$errors->first('master')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Fəhlə</label>
                                    <input value="{{$order->worker}}" class="form-control" type="text" name="worker">
                                    @if($errors->first('worker')) <small class="form-text text-danger">{{$errors->first('worker')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Əlavə xidmət</label>
                                    <input value="{{$order->additional_service}}" class="form-control" type="text" name="additional_service">
                                    @if($errors->first('additional_service')) <small class="form-text text-danger">{{$errors->first('additional_service')}}</small> @endif
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="col-form-label">Şöbə</label>
                                    <input value="{{$order->department}}" class="form-control" type="text" name="department">
                                    @if($errors->first('department')) <small class="form-text text-danger">{{$errors->first('department')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Məmnuniyyət statusu</label>
                                    <input value="{{$order->satisfaction_status}}" class="form-control" type="text" name="satisfaction_status">
                                    @if($errors->first('satisfaction_status')) <small class="form-text text-danger">{{$errors->first('satisfaction_status')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Ünvan</label>
                                    <input value="{{$order->address}}" class="form-control" type="text" name="address">
                                    @if($errors->first('address')) <small class="form-text text-danger">{{$errors->first('address')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Danışıq müddəti(san)</label>
                                    <input value="{{$order->speaking_duration}}" class="form-control" type="text" name="speaking_duration">
                                    @if($errors->first('speaking_duration')) <small class="form-text text-danger">{{$errors->first('speaking_duration')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Qeyd</label>
                                    <input value="{{$order->note}}" class="form-control" type="text" name="note">
                                    @if($errors->first('note')) <small class="form-text text-danger">{{$errors->first('note')}}</small> @endif
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
