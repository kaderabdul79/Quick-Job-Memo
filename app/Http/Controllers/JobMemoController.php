<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\JobMemo;
use Illuminate\Http\Request;

class JobMemoController extends Controller
{
    public function index()
    {
        $jobMemos = JobMemo::all();

        $response = ResponseHelper::successResponse("Received List of jobMemos!", $data = $jobMemos);
        return response()->json($response);
    }

    public function show(JobMemo $jobMemo)
    {
        $response = ResponseHelper::successResponse("Received data requested jobMemo!", $data = $jobMemo);
        return response()->json($response);
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
