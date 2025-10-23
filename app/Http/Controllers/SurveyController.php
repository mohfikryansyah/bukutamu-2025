<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $survei = Survey::paginate();
        return view('survei.index', compact('survei'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('survei.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:255',
            'link' => 'required',
        ]);

        Survey::create($validatedData);

        return redirect()->route('survei.index')->with('success', 'Survei berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('survei.index')->with('success', 'Survei berhasil dihapus.');
    }
}
