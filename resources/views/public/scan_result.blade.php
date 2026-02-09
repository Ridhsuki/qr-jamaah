<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex, nofollow">

    <title>Informasi Jamaah - {{ $pilgrim->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .label-text {
            color: #555;
            font-weight: bold;
            font-size: 0.85rem;
        }

        .value-text {
            color: #000;
            font-weight: bold;
            font-size: 0.95rem;
        }

        @media (min-width: 768px) {
            .value-text {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body class="bg-white min-h-screen">

    <div class="w-full bg-[#FF0000] text-white py-4 px-4 shadow-md">
        <div class="max-w-5xl mx-auto flex flex-col items-center justify-center text-center relative">
            <div class="mb-2">
                <img src="{{ asset('assets/img/kaba.png') }}" alt="Kaba" class="h-10 w-10 object-contain">
            </div>


            <h1 class="text-xl md:text-2xl font-bold uppercase tracking-wide leading-tight">
                Informasi Dan Sertifikat Vaksin Jamaah Umrah
            </h1>
            <p class="text-xs md:text-sm font-light italic opacity-90 mt-1">
                Umrah Pilgrim Information And Vaccine Certificates
            </p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto p-4 md:p-8">

        <div class="flex flex-col md:flex-row md:gap-10">

            <div class="md:w-1/3 flex flex-col items-center md:items-start mb-8 md:mb-0">

                <div class="mb-4">
                    @if ($pilgrim->photo_path)
                        <img class="w-48 h-64 md:w-56 md:h-72 object-cover border border-gray-300 shadow-sm bg-gray-100"
                            src="{{ asset('storage/' . $pilgrim->photo_path) }}" alt="Foto Jamaah">
                    @else
                        <img class="w-48 h-64 md:w-56 md:h-72 object-cover border border-gray-300 shadow-sm bg-gray-100"
                            src="https://ui-avatars.com/api/?name={{ urlencode($pilgrim->name) }}&size=500&background=random"
                            alt="Foto Jamaah">
                    @endif
                </div>

                <div class="bg-white p-1 border border-gray-200">
                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(160)->generate(route('scan.show', $pilgrim->uuid)) !!}
                </div>
            </div>

            <div class="md:w-2/3 w-full">
                <div class="space-y-4">

                    <div class="grid grid-cols-1 md:grid-cols-3 border-b border-gray-100 pb-2">
                        <div class="label-text md:col-span-1">Nomor Porsi Umrah <br><span
                                class="text-xs font-normal italic text-gray-400">Umrah ID</span></div>
                        <div class="value-text md:col-span-2">: {{ $pilgrim->umrah_id }}</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 border-b border-gray-100 pb-2">
                        <div class="label-text md:col-span-1">Nama <br><span
                                class="text-xs font-normal italic text-gray-400">Name</span></div>
                        <div class="value-text md:col-span-2 uppercase">: {{ $pilgrim->name }}</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 border-b border-gray-100 pb-2">
                        <div class="label-text md:col-span-1">No Paspor <br><span
                                class="text-xs font-normal italic text-gray-400">Passport</span></div>
                        <div class="value-text md:col-span-2">: {{ $pilgrim->passport_number }}</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 border-b border-gray-100 pb-2">
                        <div class="label-text md:col-span-1">PPIU <br><span
                                class="text-xs font-normal italic text-gray-400">Travel Agent</span></div>
                        <div class="value-text md:col-span-2 uppercase">: {{ $pilgrim->ppiu }}</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 pt-2">
                        <div class="label-text md:col-span-1">Hotel <br><span
                                class="text-xs font-normal italic text-gray-400">Hotel</span></div>
                        <div class="value-text md:col-span-2">
                            <div class="mb-2">
                                <span class="block text-gray-800 uppercase">: {{ $pilgrim->hotel_name }}</span>
                                <span class="text-sm text-gray-500 font-normal">
                                    (Check-in: {{ $pilgrim->check_in->format('d/m/Y') }} - Check-out:
                                    {{ $pilgrim->check_out->format('d/m/Y') }})
                                </span>
                            </div>

                            <div class="mt-2 text-gray-400 text-xs font-normal">
                                * Data akomodasi sesuai sistem
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>

</html>
