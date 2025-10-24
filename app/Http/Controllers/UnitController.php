<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }

    public function manage()
    {
        $units = Unit::all();
        return view('admin.unit.manage', compact('units'));
    }

    public function store(UnitRequest $request)
    {
        $data = $request->validated();
        $data['description'] = $request->input('description') ?? 'Not Given.';
        Unit::create($data);
        return redirect()->route('unit.add')->with('success', 'Unit created successfully.');
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('admin.unit.edit', compact('unit'));
    }

    public function update(UnitRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $data = $request->validated();
        $unit->update($data);
        return back()->with('success', 'Unit updated successfully.');
    }

    public function is_active($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->is_active = !$unit->is_active;
        $unit->save();
        return back();
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return back()->with('success', 'Unit deleted successfully.');
    }
}
