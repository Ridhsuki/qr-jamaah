<x-app-layout>
    @section('title', 'Tambah Jamaah')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Data Jamaah Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('admin.pilgrims.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2">
                            <x-input-label for="photo" :value="__('Foto Jamaah')" />
                            <input id="photo" name="photo" type="file"
                                class="block w-full text-sm text-gray-500 mt-1
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-emerald-50 file:text-emerald-700
                                hover:file:bg-emerald-100
                                border border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500" />
                            <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG. Maks: 2MB.</p>
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label for="name" :value="__('Nama Lengkap (Sesuai Paspor)')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label for="ppiu" :value="__('Agen Travel (PPIU)')" />
                            <x-text-input id="ppiu" class="block mt-1 w-full" type="text" name="ppiu"
                                :value="old('ppiu')" required />
                            <x-input-error :messages="$errors->get('ppiu')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="umrah_id" :value="__('Nomor Porsi / ID Umrah')" />
                            <x-text-input id="umrah_id" class="block mt-1 w-full" type="text" name="umrah_id"
                                :value="old('umrah_id')" required />
                            <x-input-error :messages="$errors->get('umrah_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="passport_number" :value="__('Nomor Paspor')" />
                            <x-text-input id="passport_number" class="block mt-1 w-full" type="text"
                                name="passport_number" :value="old('passport_number')" required />
                            <x-input-error :messages="$errors->get('passport_number')" class="mt-2" />
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label for="hotel_name" :value="__('Nama Hotel')" />
                            <x-text-input id="hotel_name" class="block mt-1 w-full" type="text" name="hotel_name"
                                :value="old('hotel_name')" required />
                            <x-input-error :messages="$errors->get('hotel_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="check_in" :value="__('Tanggal Check In')" />
                            <x-text-input id="check_in" class="block mt-1 w-full" type="date" name="check_in"
                                :value="old('check_in')" required />
                            <x-input-error :messages="$errors->get('check_in')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="check_out" :value="__('Tanggal Check Out')" />
                            <x-text-input id="check_out" class="block mt-1 w-full" type="date" name="check_out"
                                :value="old('check_out')" required />
                            <x-input-error :messages="$errors->get('check_out')" class="mt-2" />
                        </div>

                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-secondary-button type="button" onclick="window.history.back()" class="mr-3">
                            {{ __('Batal') }}
                        </x-secondary-button>

                        <x-primary-button
                            class="bg-emerald-600 hover:bg-emerald-700 focus:bg-emerald-700 active:bg-emerald-900">
                            {{ __('Simpan Data') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
