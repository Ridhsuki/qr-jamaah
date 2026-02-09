<x-app-layout>
    @section('title', 'Data Jamaah')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Jamaah') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 p-6">
                <form method="GET" action="#">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cari Siswa</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Nama, Paspor, Hotel...">
                            </div>
                        </div>
                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Filter Kelas</label>
                            <select name="kelas"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option value="all">Semua Kelas</option>
                                @foreach ($availableClasses as $kelas)
                                    <option value="{{ $kelas }}"
                                        {{ request('kelas') == $kelas ? 'selected' : '' }}>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:col-span-4 flex items-end gap-2">
                            <div class="flex-grow">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Urutkan</label>
                                <select name="sort"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru
                                        Bergabung</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama
                                        Bergabung</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama
                                        (A-Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                        Nama (Z-A)</option>
                                </select>
                            </div>

                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-md shadow-sm transition">
                                <i class="fa-solid fa-filter"></i>
                            </button>

                            <a href="{{ route('admin.pilgrims.create') }}"
                                class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-2.5 rounded-md transition"
                                title="Reset Filter">
                                <i class="fa-solid fa-rotate-left"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div> --}}
            <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-200">
                <div class="px-5 pt-5">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                        <h3 class="text-lg font-bold text-gray-800">
                            Daftar Jamaah
                            <span class="text-sm font-normal text-gray-500">
                                (Total: {{ $pilgrims->total() }})
                            </span>
                        </h3>

                        <a href="{{ route('admin.pilgrims.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="fa-solid fa-user-plus mr-2"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>

                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                    Jamaah</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Info
                                    Porsi & Paspor</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Hotel
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pilgrims as $pilgrim)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                @if ($pilgrim->photo_path)
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ asset('storage/' . $pilgrim->photo_path) }}"
                                                        alt="{{ $pilgrim->name }}" loading="lazy">
                                                @else
                                                    <img class="h-10 w-10 rounded-full object-cover bg-gray-200"
                                                        src="https://ui-avatars.com/api/?name={{ urlencode($pilgrim->name) }}"
                                                        alt="tidak ada gambar" loading="lazy">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $pilgrim->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $pilgrim->ppiu }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Porsi: {{ $pilgrim->umrah_id }}</div>
                                        <div class="text-sm text-gray-500">Paspor: {{ $pilgrim->passport_number }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $pilgrim->hotel_name }}</div>
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Check-in: {{ $pilgrim->check_in->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('admin.pilgrims.show', $pilgrim) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Detail</a>
                                            <span class="text-gray-300">|</span>
                                            <a href="{{ route('admin.pilgrims.print', $pilgrim) }}" target="_blank"
                                                class="text-emerald-600 hover:text-emerald-900">Print Card</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        Belum ada data jamaah.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $pilgrims->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
