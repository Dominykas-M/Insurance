<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    // GET /api/owners
    public function index()
    {
        return response()->json(Owner::with('cars')->get(), 200);
    }

    // POST /api/owners
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|unique:owners,email',
            'address' => 'required|string|max:100',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $owner = Owner::create($validated);
        return response()->json($owner, 201);
    }

    // GET /api/owners/{owner}
    public function show(Owner $owner)
    {
        return response()->json($owner->load('cars'), 200);
    }

    // PUT/PATCH /api/owners/{owner}
    public function update(Request $request, Owner $owner)
    {
        $validated = $request->validate([
            'name'    => 'sometimes|required|string|max:50',
            'surname' => 'sometimes|required|string|max:50',
            'phone'   => 'sometimes|required|string|max:20',
            'email'   => 'sometimes|required|email|unique:owners,email,'.$owner->id,
            'address' => 'sometimes|required|string|max:100',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $owner->update($validated);
        return response()->json($owner, 200);
    }

    // DELETE /api/owners/{owner}
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return response()->json(['message' => 'Owner deleted successfully'], 200);
    }
}
