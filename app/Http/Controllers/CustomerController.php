<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use App\Models\Settings\ActivityArea;
use App\Models\Settings\CompanyAddress;
use App\Models\Settings\CompanyCategory;
use App\Models\Settings\CompanyType;
use App\Models\Settings\Contract;
use App\Services\SearchService;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CustomerController extends Controller
{

    public $searchService;

    public function __construct(SearchService $searchService)
    {

        $this->searchService = $searchService;
        $this->middleware('permission:list-customers|create-customers|edit-customers|delete-customers', ['only' => ['index','show']]);
        $this->middleware('permission:create-customers', ['only' => ['create','store']]);
        $this->middleware('permission:edit-customers', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-customers', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {

        $data = $this->searchService->getData($request, 'customers');

        $route = 'customers.index';

        return view('customers.index', compact('data','route'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $field_activities = ActivityArea::all();
        $company_categories = CompanyCategory::all();
        $company_addresses = CompanyAddress::all();
        $company_types = CompanyType::all();
        $contracts = Contract::all();
        return view('customers.create', compact('field_activities','contracts','company_addresses','company_types','company_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CustomerStoreRequest $request)
    {

        $validated = $request->validated();

        $fileUploadService = new FileService();
        $validated['contract_file'] =  $fileUploadService->uploadFile($request->contract_file, 'contracts');

        Customer::create($validated);

        return redirect()->route('customers.index')->with('message', 'Müştəri əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Customer $customer)
    {
        $field_activities = ActivityArea::all();
        $company_categories = CompanyCategory::all();
        $company_addresses = CompanyAddress::all();
        $company_types = CompanyType::all();
        $contracts = Contract::all();
        return view('customers.edit', compact('customer','field_activities','contracts','company_addresses','company_types','company_categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        if($request->contract_file){
            $fileUploadService = new FileService();
            $validated['contract_file'] =  $fileUploadService->uploadFile($request->contract_file, 'contracts');
        }

        $customer->update($validated);

        return redirect()->back()->with('message', 'Məlumat update edildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Customer $customer)
    {

//        if ($customer->contract_file) {
//            Storage::disk('public')->delete('contracts/' . $customer->contract_file);
//        }

        $customer->delete();

        return redirect()->back()->with('message', 'Məlumat silindi.');

    }

}
