<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Kerusakan Saya
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-lg font-semibold">
                        Riwayat Laporan
                    </h3>

                    <a href="{{ route('operator.laporan.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-md">
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
                                        {{ $laporan->mesin->nama_mesin }}
                                    </td>

                                    <td class="p-3">
                                        {{ \Illuminate\Support\Str::limit(
                                            $laporan->deskripsi_kerusakan, 60
                                        ) }}
                                    </td>

                                    <td class="p-3">
                                        {{ $laporan->teknisi?->name ?? 'Belum ditugaskan' }}
                                    </td>

                                    <td class="p-3">
                                        @if ($laporan->status === 'menunggu')
                                            <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800">
                                                Menunggu
                                            </span>
                                        @elseif ($laporan->status === 'diproses')
                                            <span class="px-2 py-1 rounded bg-blue-100 text-blue-800">
                                                Diproses
                                            </span>
                                        @else
                                            <span class="px-2 py-1 rounded bg-green-100 text-green-800">
                                                Selesai
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-3">
                                        <a href="{{ route(
                                            'operator.laporan.show',
                                            $laporan
                                        ) }}" class="text-blue-600 hover:underline">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="p-6 text-center text-gray-500">
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
        </div>
    </div>
</x-app-layout>