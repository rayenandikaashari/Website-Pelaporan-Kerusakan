<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Laporan Kerusakan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('operator.laporan.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="mb-5">
                        <label for="mesin_id"
                               class="block font-medium text-gray-700 mb-2">
                            Pilih Mesin
                        </label>

                        <select name="mesin_id" id="mesin_id" required
                                class="w-full rounded-md border-gray-300">
                            <option value="">-- Pilih Mesin --</option>

                            @foreach ($mesins as $mesin)
                                <option value="{{ $mesin->id }}"
                                    @selected(old('mesin_id') == $mesin->id)>
                                    {{ $mesin->kode_mesin }} -
                                    {{ $mesin->nama_mesin }}
                                </option>
                            @endforeach
                        </select>

                        @if ($mesins->isEmpty())
                            <p class="text-red-600 text-sm mt-2">
                                Belum ada data mesin. Hubungi Supervisor
                                untuk menambahkan data mesin.
                            </p>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label for="deskripsi_kerusakan"
                               class="block font-medium text-gray-700 mb-2">
                            Deskripsi Kerusakan
                        </label>

                        <textarea
                            name="deskripsi_kerusakan"
                            id="deskripsi_kerusakan"
                            rows="5"
                            required
                            minlength="10"
                            class="w-full rounded-md border-gray-300"
                            placeholder="Jelaskan kerusakan yang ditemukan..."
                        >{{ old('deskripsi_kerusakan') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="foto"
                               class="block font-medium text-gray-700 mb-2">
                            Foto Kerusakan (Opsional)
                        </label>

                        <input type="file"
                               name="foto"
                               id="foto"
                               accept=".jpg,.jpeg,.png,.webp"
                               class="w-full rounded-md border-gray-300">

                        <p class="text-sm text-gray-500 mt-1">
                            Format JPG, PNG, atau WEBP. Maksimal 2 MB.
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Kirim Laporan
                        </button>

                        <a href="{{ route('operator.laporan.index') }}"
                           class="px-5 py-2 bg-gray-200 text-gray-700 rounded-md">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>