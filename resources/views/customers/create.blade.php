@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Əsas məlumat</h4>
                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkətin adı</label>
                                        <input value="{{old('company_name')}}" class="form-control" type="text" name="company_name">
                                        @if($errors->first('company_name')) <small class="form-text text-danger">{{$errors->first('company_name')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Vöen</label>
                                        <input value="{{old('company_voen')}}" class="form-control" type="text" name="company_voen">
                                        @if($errors->first('company_voen')) <small class="form-text text-danger">{{$errors->first('company_voen')}}</small> @endif
                                    </div>
                                    <!-- end row -->
                                    <div class="mb-3">
                                        <label class="col-form-label">Fəaliyyət sahəsi</label>
                                        <select class="form-control" type="text" name="company_area">
                                            <option selected disabled>----- </option>
                                            @foreach($field_activities as $f)
                                                <option {{old('company_area') == $f->title ? 'selected' : ''}} value="{{$f->title}}">{{$f->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('company_area')) <small class="form-text text-danger">{{$errors->first('company_area')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Telefon</label>
                                        <input value="{{old('company_phone')}}" class="form-control" type="text" name="company_phone">
                                        @if($errors->first('company_phone')) <small class="form-text text-danger">{{$errors->first('company_phone')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Ünvan</label>
                                        <input value="{{old('main_address')}}" class="form-control" type="text" name="main_address">
                                        @if($errors->first('main_address')) <small class="form-text text-danger">{{$errors->first('main_address')}}</small> @endif
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
                                        <input value="{{old('bank_branch')}}" class="form-control" type="text" name="bank_branch">
                                        @if($errors->first('bank_branch')) <small class="form-text text-danger">{{$errors->first('bank_branch')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Bankın Vöeni</label>
                                        <input value="{{old('bank_voen')}}" class="form-control" type="text" name="bank_voen">
                                        @if($errors->first('bank_voen')) <small class="form-text text-danger">{{$errors->first('bank_voen')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Swift</label>
                                        <input value="{{old('bank_swift')}}" class="form-control" type="text" name="bank_swift">
                                        @if($errors->first('bank_swift')) <small class="form-text text-danger">{{$errors->first('bank_swift')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">İban</label>
                                        <input value="{{old('bank_iban')}}" class="form-control" type="text" name="bank_iban">
                                        @if($errors->first('bank_iban')) <small class="form-text text-danger">{{$errors->first('bank_iban')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Kod</label>
                                        <input value="{{old('bank_code')}}" class="form-control" type="text" name="bank_code">
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

                                                <option value="{{$c->title}}" {{old('company_cat') == $c->title ? 'selected': ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('company_cat')) <small class="form-text text-danger">{{$errors->first('company_cat')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Əməkdaşların sayı</label>
                                        <input value="{{old('company_count_employee')}}" class="form-control" type="number" name="company_count_employee">
                                        @if($errors->first('company_count_employee')) <small class="form-text text-danger">{{$errors->first('company_count_employee')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkət Ünvanı</label>
                                        <select class="form-control" type="text" name="company_address">
                                            <option selected disabled>----- </option>
                                            @foreach($company_addresses as $c)

                                                <option value="{{$c->title}}" {{old('company_address') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('company_address')) <small class="form-text text-danger">{{$errors->first('company_address')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkətin dönüşü</label>
                                        <input value="{{old('company_return')}}" class="form-control" type="number" name="company_return">
                                        @if($errors->first('company_return')) <small class="form-text text-danger">{{$errors->first('company_return')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Şirkət Növü</label>
                                        <select class="form-control" type="text" name="company_type">
                                            <option selected disabled>----- </option>
                                            @foreach($company_types as $c)
                                                <option value="{{$c->title}}" {{old('company_type') == $c->title ? 'selected' : ''}}>{{$c->title}} </option>
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

                                                <option value="{{$c->title}}" {{old('contract_name') == $c->title ? 'selected' : ''}}>{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('contract_name')) <small class="form-text text-danger">{{$errors->first('contract_name')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Kurator</label>
                                        <input value="{{old('contract_curator')}}" class="form-control" type="text" name="contract_curator">
                                        @if($errors->first('contract_curator')) <small class="form-text text-danger">{{$errors->first('contract_curator')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Müqavilə tarixi</label>
                                        <input value="{{old('contract_date')}}" class="form-control" type="date" name="contract_date">
                                        @if($errors->first('contract_date')) <small class="form-text text-danger">{{$errors->first('contract_date')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Müqavilə nömrəsi</label>
                                        <input value="{{old('contract_number')}}" class="form-control" type="text" name="contract_number">
                                        @if($errors->first('contract_number')) <small class="form-text text-danger">{{$errors->first('contract_number')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Müqavilə Bitmə Tarixi</label>
                                        <input value="{{old('contract_end_date')}}" class="form-control" type="date" name="contract_end_date">
                                        @if($errors->first('contract_end_date')) <small class="form-text text-danger">{{$errors->first('contract_end_date')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Fayl</label>
                                        <input value="{{old('contract_file')}}" class="form-control" type="file" name="contract_file">
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
                                        <input value="{{old('person_name')}}" class="form-control" type="text" name="person_name">
                                        @if($errors->first('person_name')) <small class="form-text text-danger">{{$errors->first('person_name')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Filialın adı</label>
                                        <input value="{{old('person_filial')}}" class="form-control" type="text" name="person_filial">
                                        @if($errors->first('person_filial')) <small class="form-text text-danger">{{$errors->first('person_filial')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Məsuliyyət daşıyan şəxsin telefonu</label>
                                        <input value="{{old('person_phone')}}" class="form-control" type="text" name="person_phone">
                                        @if($errors->first('person_phone')) <small class="form-text text-danger">{{$errors->first('person_phone')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Məsuliyyət daşıyan şəxs emaili</label>
                                        <input value="{{old('person_email')}}" class="form-control" type="email" name="person_email">
                                        @if($errors->first('person_email')) <small class="form-text text-danger">{{$errors->first('person_email')}}</small> @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class=" col-form-label">Məsuliyyət daşıyan şəxs ünvanı</label>
                                        <input value="{{old('person_address')}}" class="form-control" type="text" name="person_address">
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
