<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    //
    public function index()
    {
        $cars = Car::paginate(5);
        return view('/car/car',compact('cars'))->with ('i',request()->input('page',1)-1*5+4);
    }
    public function create()
    {
        return view('/car/car_create');
    }
    public function edit(Car $cars)
    {
        return view('/car/car_edit',compact('cars'));
    }
    public function update(Request $request, Car $cars){
        
        $cars->update($request->all());
        return redirect()->route('car.index')->with('thongbao', 'Cập nhật xe thành công!');
    }
    public function destroy(Car $cars)
    {
        $cars -> delete();
        return redirect()->route('car.index')->with('thongbao', 'Xóa xe thành công!');

    }
    public function store(Request $request)
    {
        try 
        {
            $validatedData = $request->validate([
                'model' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'plateNum' => 'required|string|max:255',
            ]);
    
            // Xử lý lưu trữ dữ liệu vào cơ sở dữ liệu (nếu cần)
            Car::create($validatedData);
    
            return redirect()->route('car.index')->with('thongbao', 'Thêm xe thành công!');
        } 
        catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    

}
