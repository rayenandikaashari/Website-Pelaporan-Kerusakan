
@extends('layouts.operator')

@section('title', 'Laporan Kerusakan')
@section('heading', 'Laporan Kerusakan Saya')
@section('description', 'Pantau riwayat dan status laporan kerusakan mesin Anda.')

@section('content')

<div class="content-card">

    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-100 p-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
        <h2 class="text-lg font-semibold">
            Riwayat Laporan
        </h2>

        <a href="{{ route('operator.laporan.create') }}"
           class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            + Buat Laporan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Mesin</th>
                    <th class="p-3">Kerusakan</th>
                    <th class="p-3">Teknisi</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Detail</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($laporans as $laporan)
                    <tr class="border-b">
                        <td class="p-3">
                            {{ $laporan->created_at->format('d/m/Y') }}
                        </td>

                        <td class="p-3">
                            {{ $laporan->mesin->nama_mesin ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ \Illuminate\Support\Str::limit($laporan->deskripsi_kerusakan, 60) }}
                        </td>

                        <td class="p-3">
                            {{ $laporan->teknisi?->name ?? 'Belum ditugaskan' }}
                        </td>

                        <td class="p-3">
                            @if ($laporan->status === 'menunggu')
                                <span class="rounded bg-yellow-100 px-2 py-1 text-yellow-800">
                                    Menunggu
                                </span>
                            @elseif ($laporan->status === 'diproses')
                                <span class="rounded bg-blue-100 px-2 py-1 text-blue-800">
                                    Diproses
                                </span>
                            @else
                                <span class="rounded bg-green-100 px-2 py-1 text-green-800">
                                    Selesai
                                </span>
                            @endif
                        </td>

                        <td class="p-3">
                            <a href="{{ route('operator.laporan.show', $laporan) }}"
                               class="text-blue-600 hover:underline">
                                Lihat
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">
                            Belum ada laporan kerusakan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        {{ $laporans->links() }}
    </div>

</div>

@endsection