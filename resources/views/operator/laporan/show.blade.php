<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Laporan Kerusakan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">
                        Laporan #{{ $laporan->id }}
                    </h3>

                    <a href="{{ route('operator.laporan.index') }}"
                       class="text-blue-600 hover:underline">
                        Kembali
                    </a>
                </div>

                <div class="space-y-5">
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Laporan</p>
                        <p class="font-medium">
                            {{ $laporan->created_at->format('d F Y, H:i') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Kode Mesin</p>
                        <p class="font-medium">
                            {{ $laporan->mesin->kode_mesin }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nama Mesin</p>
                        <p class="font-medium">
                            {{ $laporan->mesin->nama_mesin }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Lokasi Mesin</p>
                        <p class="font-medium">
                            {{ $laporan->mesin->lokasi ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Deskripsi Kerusakan</p>
                        <p class="whitespace-pre-line">
                            {{ $laporan->deskripsi_kerusakan }}
                        </p>
                    </div>

                    @if ($laporan->foto)
                        <div>
                            <p class="text-sm text-gray-500 mb-2">
                                Foto Kerusakan
                            </p>

                            <a href="{{ asset('storage/' . $laporan->foto) }}"
                               target="_blank" rel="noopener noreferrer">
                                <img
                                    src="{{ asset('storage/' . $laporan->foto) }}"
                                    alt="Foto kerusakan mesin"
                                    class="max-w-md w-full rounded-lg border"
                                >
                            </a>
                        </div>
                    @endif

                    <div>
                        <p class="text-sm text-gray-500 mb-2">Status Laporan</p>

                        @if ($laporan->status === 'menunggu')
                            <span class="px-3 py-1 rounded bg-yellow-100 text-yellow-800">
                                Menunggu
                            </span>
                        @elseif ($laporan->status === 'diproses')
                            <span class="px-3 py-1 rounded bg-blue-100 text-blue-800">
                                Sedang Diproses
                            </span>
                        @else
                            <span class="px-3 py-1 rounded bg-green-100 text-green-800">
                                Selesai
                            </span>
                        @endif
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Teknisi</p>
                        <p class="font-medium">
                            {{ $laporan->teknisi?->name ?? 'Belum ditugaskan' }}
                        </p>
                    </div>

                    @if ($laporan->waktu_mulai)
                        <div>
                            <p class="text-sm text-gray-500">Waktu Mulai Perbaikan</p>
                            <p class="font-medium">
                                {{ $laporan->waktu_mulai->format('d F Y, H:i') }}
                            </p>
                        </div>
                    @endif

                    @if ($laporan->waktu_selesai)
                        <div>
                            <p class="text-sm text-gray-500">Waktu Selesai</p>
                            <p class="font-medium">
                                {{ $laporan->waktu_selesai->format('d F Y, H:i') }}
                            </p>
                        </div>
                    @endif

                    @if ($laporan->hasil_perbaikan)
                        <div>
                            <p class="text-sm text-gray-500">Hasil Perbaikan</p>
                            <p class="whitespace-pre-line">
                                {{ $laporan->hasil_perbaikan }}
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>