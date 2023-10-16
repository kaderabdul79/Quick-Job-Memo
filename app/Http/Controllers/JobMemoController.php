<?php

namespace App\Http\Controllers;

use App\Models\JobMemo;
use Illuminate\Http\Request;

class JobMemoController extends Controller
{
    public function index()
    {
        $jobMemos = JobMemo::all();

        return response()->json(['data' => $jobMemos], 200);
    }

    public function show(JobMemo $jobMemo)
    {
        return response()->json(['data' => $jobMemo], 200);
    }
    
    public function store(Request $request)
    {
        // Add logic to store a new job memo in the database
    }

    public function edit(JobMemo $jobMemo)
    {
        // Add logic to show the form for editing a job memo
    }

    public function update(Request $request, JobMemo $jobMemo)
    {
        // Add logic to update a job memo in the database
    }

    public function destroy(JobMemo $jobMemo)
    {
        // Add logic to delete a job memo from the database
    }
}
