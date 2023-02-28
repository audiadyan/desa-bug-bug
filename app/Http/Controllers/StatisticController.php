<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        return view('admin.statistic', [
            'page_title' => 'Statistik Desa',
            'statistic' => Statistic::first(),
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'male' => ['required', 'integer', 'gt:0'],
            'female' => ['required', 'integer', 'gt:0'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['total'] = $validatedData['male'] + $validatedData['female'];

        Statistic::firstOrCreate()->update($validatedData);
        return back()->with('success', 'Data berhasil diupdate!');
    }
}
