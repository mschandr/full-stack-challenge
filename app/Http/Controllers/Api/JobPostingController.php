<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\JobPostingDehydratedResource;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class JobPostingController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::dehydrated()->paginate(15);
        return JobPostingDehydratedResource::collection($jobs);
    }

    public function all()
    {
        return JobPostingDehydratedResource::collection(
            JobPosting::dehydrated()->get()
        );
    }

    public function show(string $id)
    {
        $job = JobPosting::findOrFail($id);
        return response()->json($job);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'work_type'  => ['required', Rule::in([1, 2, 3])],
            'salary'     => 'nullable|numeric|min:0',
            'company_id' => 'required|uuid|exists:companies,id',
        ]);

        $data['created_by'] = Auth::id();

        $job = JobPosting::create($data);
        return response()->json($job, 201);
    }

    public function update(Request $request, string $id)
    {
        $job = JobPosting::findOrFail($id);

        if (Auth::user()?->company_id !== $job->company_id) {
            abort(403, 'Not allowed to update this job posting');
        }

        $data = $request->validate([
            'title'     => 'sometimes|string|max:255',
            'location'  => 'sometimes|string|max:255',
            'work_type' => ['sometimes', Rule::in([1, 2, 3])],
            'salary'    => 'nullable|numeric|min:0',
        ]);

        $data['updated_by'] = Auth::id();

        $job->update($data);
        return response()->json($job);
    }

    public function destroy(string $id)
    {
        $job = JobPosting::findOrFail($id);

        if (Auth::user()?->company_id !== $job->company_id) {
            abort(403, 'Not allowed to delete this job posting');
        }

        $job->delete();
        return response()->json(['deleted' => true]);
    }
}
