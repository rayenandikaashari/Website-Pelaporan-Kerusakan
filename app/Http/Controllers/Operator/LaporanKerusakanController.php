<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\LaporanKerusakan;
use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanKerusakanController extends Controller
{
    public function index()
    {
        $laporans = LaporanKerusakan::with(['mesin', 'teknisi'])
            ->where('operator_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('operator.laporan.index', compact('laporans'));
    }

    public function create()
    {
        $mesins = Mesin::orderBy('nama_mesin')->get();

        return view('operator.laporan.create', compact('mesins'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mesin_id' => ['required', 'exists:mesins,id'],
            'deskripsi_kerusakan' => ['required', 'string', 'min:10'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('laporan-kerusakan', 'public');
        }

        $validated['operator_id'] = auth()->id();
        $validated['status'] = 'menunggu';

        LaporanKerusakan::create($validated);

        return redirect()
            ->route('operator.laporan.index')
            ->with('success', 'Laporan kerusakan berhasil dibuat.');
    }

    public function show(LaporanKerusakan $laporan)
    {
        abort_unless(
            $laporan->operator_id === auth()->id(),
            403
        );

        $laporan->load(['mesin', 'teknisi', 'penggunaanSparepart.sparepart']);

        return view('operator.laporan.show', compact('laporan'));
    }
}