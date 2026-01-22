@extends('layouts.app')

@section('content')
    @include('public.partials.navbar')

<main class="min-h-screen bg-white">
    <div class="relative min-h-[60vh] flex items-center bg-[#003366] overflow-hidden pt-20">
        <div class="absolute inset-0">
            <img src="{{ asset('images/Prima.png') }}" class="w-full h-full object-cover opacity-30 scale-105">
            <div class="absolute inset-0 bg-gradient-to-r from-[#003366] via-[#003366]/90 to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-6 w-full text-left">
            <div class="max-w-3xl">
                <span class="text-[#0099FF] font-black tracking-[0.4em] text-xs uppercase block mb-4">Quality Processed Food</span>
                <h1 class="text-5xl md:text-8xl font-black text-white leading-none mb-8 uppercase">
                    MAKANAN <span class="text-[#0099ff]">OLAHAN</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl italic leading-relaxed border-l-4 border-[#0099ff] pl-6">
                    Menghadirkan kelezatan berkualitas melalui merek terpercaya: Golden Fiesta, Fiesta, Champ, Okey, Akumo, dan Asimo.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex flex-wrap gap-3 justify-center md:justify-start">
            @foreach(['Golden Fiesta', 'Fiesta', 'Champ', 'Okey', 'Akumo', 'Asimo'] as $brand)
            <span class="px-6 py-2 bg-slate-50 border border-slate-100 rounded-full text-[10px] font-black text-[#003366] uppercase tracking-widest hover:bg-[#0099ff] hover:text-white transition-all cursor-default">
                {{ $brand }}
            </span>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20 space-y-16">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-black text-[#003366]uppercase">Katalog <span class="text-[#0099ff]">Produk Kami</span></h2>
                <p class="text-gray-500 italic mt-2">Kualitas premium untuk hidangan keluarga Anda.</p>
            </div>
            <a href="https://www.cpfood.co.id" target="_blank" class="px-8 py-4 bg-[#0099ff] text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:scale-105 transition-all uppercase text-xs tracking-widest">
                Lihat produk kami lainnya....
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
            @foreach(range(1, 10) as $i)
                @php
                    // Logika ekstensi gambar sesuai instruksi
                    $ext = 'jpg';
                    if($i == 8) $ext = 'jpeg';
                    if($i == 6) $ext = 'webp';
                    $fileName = "pr{$i}.{$ext}";
                @endphp
                
                <div class="group relative bg-white rounded-[2rem] p-4 shadow-md hover:shadow-2xl transition-all duration-500 border border-slate-50 overflow-hidden flex flex-col h-full">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#001AFF]/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    
                    <div class="relative aspect-square mb-4 overflow-hidden rounded-2xl bg-slate-50">
                        <img src="{{ asset('images/' . $fileName) }}" 
                             class="w-full h-full object-contain object-center transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-700"
                             alt="Produk {{ $i }}"
                             onerror="this.onerror=null; this.src='https://placehold.co/400x400/f8fafc/001AFF?text=Image+Not+Found';">
                    </div>

                    <div class="mt-auto text-center">
                        <div class="h-1 w-8 bg-[#001AFF]/20 mx-auto mb-3 group-hover:w-16 transition-all duration-500"></div>
                        <span class="text-[9px] font-black text-[#003366] uppercase tracking-[0.2em] block opacity-50 group-hover:opacity-100">Premium Selection</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 pb-24">
        <div class="bg-slate-50 rounded-[3rem] p-10 md:p-16 border border-slate-100 flex flex-col md:flex-row items-center justify-between gap-10">
            <div class="max-w-xl text-center md:text-left">
                <h3 class="text-2xl font-black text-[#003366] uppercase mb-4">Informasi Lebih Lanjut</h3>
                <p class="text-gray-500 italic leading-relaxed">
                    Keterangan lebih lanjut mengenai produk makanan olahan Perseroan serta jaringan ritel (Prima Freshmart, Kios Unggas, Prima Meat Shop) dapat dilihat pada website resmi kami.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://www.cpfood.co.id" target="_blank" class="px-6 py-3 border-2 border-[#001AFF] text-[#001AFF] font-bold rounded-xl hover:bg-[#001AFF] hover:text-white transition-all text-center text-xs tracking-widest uppercase">www.cpfood.co.id</a>
                <a href="https://www.primafreshmart.com" target="_blank" class="px-6 py-3 border-2 border-[#003366] text-[#003366] font-bold rounded-xl hover:bg-[#003366] hover:text-white transition-all text-center text-xs tracking-widest uppercase">www.primafreshmart.com</a>
            </div>
        </div>
    </div>
</main>
@endsection