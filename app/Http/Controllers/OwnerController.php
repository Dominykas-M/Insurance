<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:50',
            'surname' => 'required|string|min:2|max:50',
            'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/',
            'email' => 'required|email|unique:owners,email',
            'address' => 'required|string|min:5|max:100',
        ], [
            'name.required' => __('validation.name_required'),
            'name.min' => __('validation.name_min'),
            'surname.required' => __('validation.surname_required'),
            'surname.min' => __('validation.surname_min'),
            'phone.required' => __('validation.phone_required'),
            'phone.regex' => __('validation.phone_regex'),
            'email.required' => __('validation.email_required'),
            'email.email' => __('validation.email_invalid'),
            'email.unique' => __('validation.email_unique'),
            'address.required' => __('validation.address_required'),
            'address.min' => __('validation.address_min'),
        ]);

        Owner::create($request->all());
        return redirect()->route('owners.index')->with('success', __('validation.owner_added'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:50',
            'surname' => 'required|string|min:2|max:50',
            'phone' => 'required|string|regex:/^\+?[0-9]{7,15}$/',
            'email' => 'required|email|unique:owners,email,'.$owner->id,
            'address' => 'required|string|min:5|max:100',
        ], [
            'name.required' => __('validation.name_required'),
            'name.min' => __('validation.name_min'),
            'surname.required' => __('validation.surname_required'),
            'surname.min' => __('validation.surname_min'),
            'phone.required' => __('validation.phone_required'),
            'phone.regex' => __('validation.phone_regex'),
            'email.required' => __('validation.email_required'),
            'email.email' => __('validation.email_invalid'),
            'email.unique' => __('validation.email_unique'),
            'address.required' => __('validation.address_required'),
            'address.min' => __('validation.address_min'),
        ]);

        $owner->update($request->all());
        return redirect()->route('owners.index')->with('success', __('validation.owner_updated'));
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')->with('success', 'Owner deleted!');
    }
}
