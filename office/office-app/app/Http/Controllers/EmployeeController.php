<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function delete(Request $request)
    {
    $id = (int) $request->id;

    // ID'nin geçerli bir tamsayı olup olmadığını kontrol et
    if (!is_int($id) || $id <= 0) {
        return response()->json(['message' => 'Geçersiz ID'], 400);
    }

    $employee = Employee::find($id);

    if (!$employee) {
        return response()->json(['message' => 'Çalışan bulunamadı'], 404);
    }

    $employee->delete();

    return response()->json("Başarıyla Silindi");
    }


    public function create(Request $request)
    {

        $employee = new Employee([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ]);

        $employee->save();

    return response()->json("Başarıyla Eklendi");
    }

    public function update(Request $request)
    {
        $employee = Employee::find($request->id);
        if (!$employee) {
            return response()->json(['message' => 'Kullanıcı bulunamadı'], 404);
        }
        $dataToUpdate = $request->only(['name', 'address', 'mobile']); // Örneğin, 'name' ve 'email' alanlarını güncelliyoruz
        $employee->update($dataToUpdate);


        return response()->json(['message' => 'Kullanıcı başarıyla güncellendi']);

    }
}
