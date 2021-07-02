<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(2);
        $cities = City::all();
        return view('customers.index', compact('customers', 'cities'));
    }

    public function create()
    {
        $cities = City::all();
        return view('customers.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->birthday = $request->input('birthday');
        $customer->email = $request->input('email');
        $customer->city_id = $request->input('city_id');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->save();
        return redirect()->route('customers.index')->with('success','tao moi thanh cong');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $cities = City::all();
        return view('customers.edit',compact('customer','cities'));
    }


    public function update(Request $request,$id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->birthday = $request->input('birthday');
        $customer->email = $request->input('email');
        $customer->city_id = $request->input('city_id');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->save();
        return redirect()->route('customers.index');
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer -> delete();
        return redirect()->route('customers.index');

    }

    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        $cityFilter = City::findOrFail($idCity);

        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customers.index', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->paginate(2);
        $cities = City::all();
        return view('customers.index', compact('customers', 'cities'));
    }
}
