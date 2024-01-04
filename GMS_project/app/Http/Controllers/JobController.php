<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::paginate(5);
        return view('/job/job',compact('jobs'))->with ('i',request()->input('page',1)-1*5+4);
    }
    public function create()
    {
        $job = Job::paginate(5);
        return view('/job/job-create');
    }
    public function edit(Job $job)
    {
        return view('/job/job-edit',compact('job'));
    }
    public function update(Request $request, Job $job){
        
        $job->update($request->all());
        return redirect()->route('job.index')->with('thongbao', 'Cập nhật khách hàng thành công!');
    }
    public function destroy(Job $job)
    {
        $job -> delete();
        return redirect()->route('job.index')->with('thongbao', 'Xóa khách hàng thành công!');

    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:jobs',
            'phone' => 'required|string|max:20',
            'plateNo' => 'required|string|max:15',
        ]);

        // Create a new Job record
        Job::create($validatedData);
        return redirect()->route('Job.index')->with('thongbao', 'Thêm khách hàng thành công!');
    }

}
