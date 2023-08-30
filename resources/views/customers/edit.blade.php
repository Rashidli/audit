@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('customers.update', $customer->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Əsas məlumat</h4>
                                <div class="mb-3">
                                    <label class="col-form-label">Şirkətin adı</label>
                                    <input value="{{$customer->company_name}}" class="form-control" type="text"  name="company_name">
                                    @if($errors->first('company_name')) <small class="form-text text-danger">{{$errors->first('company_name')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Vöen</label>
                                    <input value="{{$customer->company_voen}}" class="form-control" type="text" name="company_voen">
                                    @if($errors->first('company_voen')) <small class="form-text text-danger">{{$errors->first('company_voen')}}</small> @endif
                                </div>
                                <!-- end row -->
                                <div class="mb-3">
                                    <label class="col-form-label">Fəaliyyət sahəsi</label>
                                    <select class="form-control" type="text" name="company_area">
                                        <option selected disabled>----- </option>
                                        @foreach($field_activities as $f)
                                            <option {{$customer->company_area == $f->title ? 'selected' : ''}}  value="{{$f->title}}">{{$f->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('company_area')) <small class="form-text text-danger">{{$errors->first('company_area')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Telefon</label>
                                    <input value="{{$customer->company_phone}}" class="form-control" type="text" name="company_phone">
                                    @if($errors->first('company_phone')) <small class="form-text text-danger">{{$errors->first('company_phone')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Ünvan</label>
                                    <input value="{{$customer->main_address}}" class="form-control" type="text" name="main_address">
                                    @if($errors->first('main_address')) <small class="form-text text-danger">{{$errors->first('main_address')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Status</label>
                                    <select class="form-control" type="text" name="is_active">
                                        <option selected disabled>----- </option>
                                        <option value="1" {{$customer->is_active == true ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$customer->is_active == false ? 'selected' : ''}}>Deactive</option>
                                    </select>
                                    @if($errors->first('is_active')) <small class="form-text text-danger">{{$errors->first('is_active')}}</small> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bank məlumatları</h4>
                                <div class="mb-3">
                                    <label class="col-form-label">Bank filialı</label>
                                    <input value="{{$customer->bank_branch}}" class="form-control" type="text" name="bank_branch">
                                    @if($errors->first('bank_branch')) <small class="form-text text-danger">{{$errors->first('bank_branch')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Bankın Vöeni</label>
                                    <input value="{{$customer->bank_voen}}" class="form-control" type="text" name="bank_voen">
                                    @if($errors->first('bank_voen')) <small class="form-text text-danger">{{$errors->first('bank_voen')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Swift</label>
                                    <input value="{{$customer->bank_swift}}" class="form-control" type="text" name="bank_swift">
                                    @if($errors->first('bank_swift')) <small class="form-text text-danger">{{$errors->first('bank_swift')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">İban</label>
                                    <input value="{{$customer->bank_iban}}" class="form-control" type="text" name="bank_iban">
                                    @if($errors->first('bank_iban')) <small class="form-text text-danger">{{$errors->first('bank_iban')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Kod</label>
                                    <input value="{{$customer->bank_code}}" class="form-control" type="text" name="bank_code">
                                    @if($errors->first('bank_code')) <small class="form-text text-danger">{{$errors->first('bank_code')}}</small> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Şirkət məlumatları</h4>
                                <div class="mb-3">
                                    <label class="col-form-label">Şirkət Kateqoriyası</label>
                                    <select class="form-control" type="text" name="company_cat">
                                        <option selected disabled>----- </option>
                                        @foreach($company_categories as $c)
                                            <option value="{{$c->title}}" {{$customer->company_cat == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('company_cat')) <small class="form-text text-danger">{{$errors->first('company_cat')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Əməkdaşların sayı</label>
                                    <input value="{{$customer->company_count_employee}}" class="form-control" type="number" name="company_count_employee">
                                    @if($errors->first('company_count_employee')) <small class="form-text text-danger">{{$errors->first('company_count_employee')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Şirkət Ünvanı</label>
                                    <select class="form-control" type="text" name="company_address">
                                        <option selected disabled>----- </option>
                                        @foreach($company_addresses as $c)
                                            <option value="{{$c->title}}" {{$customer->company_address == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('company_address')) <small class="form-text text-danger">{{$errors->first('company_address')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Şirkətin dönüşü</label>
                                    <input value="{{$customer->company_return}}" class="form-control" type="number" name="company_return">
                                    @if($errors->first('company_return')) <small class="form-text text-danger">{{$errors->first('company_return')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Şirkət Növü</label>
                                    <select class="form-control" type="text" name="company_type">
                                        <option selected disabled>----- </option>
                                        @foreach($company_types as $c)
                                            <option value="{{$c->title}}" {{$customer->company_type == $c->title ? 'selected' : ''}}>{{$c->title}} </option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('company_type')) <small class="form-text text-danger">{{$errors->first('company_type')}}</small> @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Müqavilə detalları</h4>
                                <div class="mb-3">
                                    <label class="col-form-label">Müqavilə</label>
                                    <select class="form-control" type="text" name="contract_name">
                                        <option selected disabled>----- </option>
                                        @foreach($contracts as $c)
                                            <option value="{{$c->title}}" {{$customer->contract_name == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('contract_name')) <small class="form-text text-danger">{{$errors->first('contract_name')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Kurator</label>
                                    <input value="{{$customer->contract_curator}}" class="form-control" type="text" name="contract_curator">
                                    @if($errors->first('contract_curator')) <small class="form-text text-danger">{{$errors->first('contract_curator')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Müqavilə tarixi</label>
                                    <input value="{{$customer->contract_date}}" class="form-control" type="date" name="contract_date">
                                    @if($errors->first('contract_date')) <small class="form-text text-danger">{{$errors->first('contract_date')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Müqavilə nömrəsi</label>
                                    <input value="{{$customer->contract_number}}" class="form-control" type="text" name="contract_number">
                                    @if($errors->first('contract_number')) <small class="form-text text-danger">{{$errors->first('contract_number')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Müqavilə Bitmə Tarixi</label>
                                    <input value="{{$customer->contract_end_date}}" class="form-control" type="date" name="contract_end_date">
                                    @if($errors->first('contract_end_date')) <small class="form-text text-danger">{{$errors->first('contract_end_date')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Fayl</label>
                                    <a href="{{asset('storage/' . $customer->contract_file)}}">File</a>
                                    <input class="form-control" type="file" name="contract_file">
                                @if($errors->first('contract_file')) <small class="form-text text-danger">{{$errors->first('contract_file')}}</small> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Məsul şəxs</h4>
                                <div class="mb-3">
                                    <label class="col-form-label">Məsuliyyət daşıyan şəxs adı</label>
                                    <input value="{{$customer->person_name}}" class="form-control" type="text" name="person_name">
                                    @if($errors->first('person_name')) <small class="form-text text-danger">{{$errors->first('person_name')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Filialın adı</label>
                                    <input value="{{$customer->person_filial}}" class="form-control" type="text" name="person_filial">
                                    @if($errors->first('person_filial')) <small class="form-text text-danger">{{$errors->first('person_filial')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Məsuliyyət daşıyan şəxsin telefonu</label>
                                    <input value="{{$customer->person_phone}}" class="form-control" type="text" name="person_phone">
                                    @if($errors->first('person_phone')) <small class="form-text text-danger">{{$errors->first('person_phone')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Məsuliyyət daşıyan şəxs emaili</label>
                                    <input value="{{$customer->person_email}}" class="form-control" type="email" name="person_email">
                                    @if($errors->first('person_email')) <small class="form-text text-danger">{{$errors->first('person_email')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class=" col-form-label">Məsuliyyət daşıyan şəxs ünvanı</label>
                                    <input value="{{$customer->person_address}}" class="form-control" type="text" name="person_address">
                                    @if($errors->first('person_address')) <small class="form-text text-danger">{{$errors->first('person_address')}}</small> @endif
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
