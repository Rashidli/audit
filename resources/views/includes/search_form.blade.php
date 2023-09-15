
<form action="{{route($route)}}" method="get">
    <div class="row">

        <div class="col-1 col-md-1">
            <div class="mb-3">
                <label class=" col-form-label">Limit</label>
                <select class="form-control" type="text" name="limit">
                    <option value="10" {{ request()->limit == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request()->limit == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request()->limit == 100 ? 'selected' : '' }}>100</option>
                    <option value="500" {{ request()->limit == 500 ? 'selected' : '' }}>500</option>
                </select>
            </div>
        </div>
        <div class="col-2 col-md-2">
            <div class="mb-3">
                <label class=" col-form-label" for="is_active">Status</label>
                <select class="form-control" id="is_active" type="text" name="is_new">
                    <option selected value="">---</option>
                    <option value="1" {{ request()->is_new == 1 ? 'selected' : '' }}>Yeni</option>
                    <option value="0" {{ request()->is_new == 0 && request()->is_new != null ? 'selected' : '' }}>Paylanmışlar</option>
                </select>
            </div>
        </div>
        <div class="col-2 col-md-2">
            <div class="mb-3">
                <label class="col-form-label" for="mixin_single">Mixin or single</label>
                <select class="form-control" id="mixin_single" name="mixin_single">
                    <option selected value="">---</option>
                    <option value="mixin" {{ request()->mixin_single == 'mixin' ? 'selected' : '' }}>Mixin</option>
                    <option value="single" {{ request()->mixin_single == 'single' ? 'selected' : '' }}>Single</option>
                </select>
            </div>
        </div>
        <div class="col-2 col-md-2">
            <div class="mb-3">
                <label class="col-form-label" for="mixin_single">Auditor status</label>
                <select class="form-control" id="mixin_single" name="auditor_status">
                    <option selected value="">---</option>
                    <option value="not_null" {{ request()->auditor_status == 'not_null' ? 'selected' : '' }}>İşlənmişlər</option>
                    <option value="is_null" {{ request()->auditor_status == 'is_null' ? 'selected' : '' }}>Yenilər</option>
                </select>
            </div>
        </div>
        <div class="col-2 col-md-2">
            <div class="mb-3">
                <label class="col-form-label">Text</label>
                <input class="form-control" value="{{ request()->text}}" type="text" name="text">
            </div>
        </div>
        <div class="col-1 col-md-1">
            <div class="mb-3">
                <div class="pt-4 mt-3">
                    <button value="submit" class="btn btn-primary">Axtar</button>
                </div>
            </div>
        </div>
        <div class="col-1 col-md-1">
            <div class="mb-3">
                <div class="pt-4 mt-3">
                    <a class="btn btn-primary" href="{{route($route)}}">Sıfırla</a>
                </div>
            </div>
        </div>
        <div class="col-1 col-md-1">
            <div class="mb-3">
                <div class="pt-4 mt-3">
                    <p class="text-primary">Nəticə: {{$data['count']}}</p>
                </div>
            </div>
        </div>

    </div>
</form>
