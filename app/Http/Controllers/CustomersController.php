<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function jawabanA()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function jawabanB($customerNumber)
    {
        $customers = Customer::where('customerNumber', $customerNumber)->first();
        return response()->json($customers);
    }

    public function jawabanC(Request $request)
    {
        $customers = Customer::create($request->all());
        if ($customers != null) {
            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $customers
            ], 201);
        } else {
            return response()->json([
                'message' => 'Data gagal ditambahkan',
                'data' => null
            ], 400);
        }
    }

    public function jawabanD(Request $request, $customerNumber)
    {
        $customers = DB::table('customers')->where('customerNumber', $customerNumber);
        if ($customers->first() !== null) {
            $customers->update($request->all());
            return response()->json([
                'message' => 'Data berhasil diubah',
                'data' => $customers->first()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data gagal diubah',
                'data' => null
            ], 400);
        }
    }

    public function jawabanE($customerNumber)
    {
        $customers = DB::table('customers')->where('customerNumber', $customerNumber);
        if ($customers->first() != null) {
            $customers->delete();
            return response()->json([
                'message' => 'Data berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data gagal dihapus',
            ], 400);
        }
    }

}
