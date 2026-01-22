@extends('layouts.app')

@section('content')
    @include('public.partials.navbar')

<main class="min-h-screen bg-white">
    <div class="relative min-h-[70vh] flex items-center bg-[#003366] overflow-hidden pt-20">
        <div class="absolute inset-0">
            <img src="{{ asset('images/feedmill.jpeg') }}" class="w-full h-full object-cover opacity-40 scale-105">
            <div class="absolute inset-0 bg-gradient-to-r from-[#003366] via-[#003366]/80 to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-6 w-full text-left">
            <div class="max-w-3xl">
                <span class="text-[#0099ff] font-bold tracking-[0.4em] text-xs uppercase block mb-4">Nutrisi Unggul, Hasil Maksimal</span>
                <h1 class="text-5xl md:text-8xl font-black text-white leading-none mb-8 uppercase">
                    PAKAN <span class="text-[#0099ff]">TERNAK</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl italic leading-relaxed border-l-4 border-[#0099ff] pl-6">
                    Formulasi pakan presisi yang disesuaikan dengan setiap fase pertumbuhan untuk menjamin efisiensi pakan dan kesehatan ternak yang optimal.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24 space-y-32">
        
        <div class="space-y-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-[#0099ff] font-black text-6xl opacity-20 italic mb-4 block">01</span>
                    <h2 class="text-4xl font-black text-[#003366] italic mb-6 uppercase">Pakan Ayam <span class="text-[#0099ff]">Pedaging</span></h2>
                    <p class="text-gray-600 mb-8 italic text-justify leading-relaxed">
                        Memiliki 3 jenis produk dengan formula khusus yang disesuaikan dengan kandungan nutrisi yang dibutuhkan pada setiap masa pertumbuhannya.
                    </p>
                </div>
                <div class="relative h-[350px] rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-slate-50">
                    <img src="{{ asset('images/feed1.jpeg') }}" class="w-full h-full object-cover object-center hover:scale-110 transition-transform duration-700">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative pt-10 items-stretch">
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-slate-100 -translate-y-1/2 z-0"></div>

                @foreach([
                    ['fase' => 'Pre-Starter', 'day' => '1 - 7 Hari', 'icon' => '🐣', 'size' => 'text-4xl', 'detail' => 'Fokus pada perkembangan organ dalam dan sistem imun awal.'],
                    ['fase' => 'Starter', 'day' => '1 - 21 Hari', 'icon' => '🐥', 'size' => 'text-6xl', 'detail' => 'Mendukung pembentukan kerangka tulang dan percepatan bobot.'],
                    ['fase' => 'Finisher', 'day' => '22 - Panen', 'icon' => '🐔', 'size' => 'text-8xl', 'detail' => 'Optimalisasi konversi pakan untuk kualitas daging maksimal.']
                ] as $item)
                <div class="relative z-10 bg-white p-8 rounded-[2.5rem] shadow-xl border border-slate-50 flex flex-col items-center text-center group hover:border-[#0099ff] transition-all duration-500 h-full">
                    <div class="h-32 flex items-center justify-center mb-6 transform group-hover:scale-110 transition-transform duration-500 {{ $item['size'] }} filter drop-shadow-lg text-4xl">
                        {{ $item['icon'] }}
                    </div>
                    <div class="bg-[#0099ff] text-white px-4 py-1 rounded-full text-xs font-bold mb-4 uppercase tracking-widest">
                        {{ $item['day'] }}
                    </div>
                    <h3 class="text-[#003366] font-black text-xl uppercase mb-2">{{ $item['fase'] }}</h3>
                    <p class="text-gray-500 text-sm italic mt-auto">
                        {{ $item['detail'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="group flex flex-col lg:flex-row-reverse items-center gap-12 md:gap-20">
            <div class="w-full lg:w-1/2 relative">
                <div class="absolute -inset-4 bg-[#001AFF]/5 rounded-[3rem] rotate-2 group-hover:rotate-0 transition-transform duration-500"></div>
                <div class="relative h-[500px] rounded-[2.5rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/feed2.jpeg') }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <span class="text-[#003366] font-black text-6xl opacity-10 italic mb-4 block">02</span>
                <h2 class="text-4xl font-black text-[#003366] italic mb-6 uppercase text-right lg:text-left">Pakan Ayam <span class="text-[#001AFF]">Petelur</span></h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach([
                        ['fase' => 'Pre-Starter', 'range' => 'Umur 1 hari - 5 minggu', 'icon' => '🥚'],
                        ['fase' => 'Starter', 'range' => 'Umur 6 - 10 minggu', 'icon' => '🐣'],
                        ['fase' => 'Grower', 'range' => 'Umur 11 minggu - telur pertama', 'icon' => '🐥'],
                        ['fase' => 'Laying Phase', 'range' => 'Periode peneluran - afkir', 'icon' => '🐔']
                    ] as $item)
                    <div class="p-6 bg-white rounded-2xl border-2 border-[#001AFF]/20 hover:bg-[#001AFF] hover:border-[#001AFF] hover:text-white transition-all duration-300 group flex flex-col items-center md:items-start text-center md:text-left shadow-sm">
                        <span class="text-2xl mb-2 block filter drop-shadow-sm">{{ $item['icon'] }}</span>
                        <p class="text-[#001AFF] font-black text-xs uppercase mb-1 group-hover:text-white transition-colors">{{ $item['fase'] }}</p>
                        <p class="text-sm italic text-gray-600 group-hover:text-blue-50 transition-colors">{{ $item['range'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="space-y-12">
            <div class="text-center">
                <h3 class="text-4xl font-black text-[#003366]  uppercase">Varian Pakan <span class="text-[#0099ff]">Lainnya</span></h3>
                <p class="text-gray-500 mt-4 italic max-w-3xl mx-auto">Tersedia untuk ayam pembibit turunan, itik, babi, sapi, dan lainnya.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4">
                @foreach([
                    ['name' => 'Ayam Pembibit', 'icon' => '🐣'],
                    ['name' => 'Itik', 'icon' => '🦆'],
                    ['name' => 'Ayam Kampung', 'icon' => '🐓'],
                    ['name' => 'Ayam Aduan', 'icon' => '🔥'],
                    ['name' => 'Burung Puyuh', 'icon' => '🐦'],
                    ['name' => 'Babi', 'icon' => '🐖'],
                    ['name' => 'Sapi', 'icon' => '🐄']
                ] as $ternak)
                <div class="bg-white p-6 rounded-[2rem] shadow-lg border border-slate-100 flex flex-col items-center justify-center text-center hover:-translate-y-2 hover:border-[#001AFF]/30 transition-all duration-300 group min-h-[160px]">
                    <div class="text-4xl mb-4 transform group-hover:scale-125 transition-transform">
                        {{ $ternak['icon'] }}
                    </div>
                    <span class="text-[10px] font-bold text-[#003366] uppercase tracking-tighter leading-tight">
                        {{ $ternak['name'] }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</main>
@endsection