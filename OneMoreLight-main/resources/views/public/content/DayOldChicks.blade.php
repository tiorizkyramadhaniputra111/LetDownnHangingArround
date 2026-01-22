@extends('layouts.app')

@section('content')
    @include('public.partials.navbar')

<main class="min-h-screen bg-white">
    <div class="relative min-h-[70vh] flex items-center bg-[#003366] overflow-hidden pt-20">
        <div class="absolute inset-0">
            <img src="{{ asset('images/piyik1.jpg') }}" class="w-full h-full object-cover opacity-40 scale-105">
            <div class="absolute inset-0 bg-gradient-to-r from-[#003366] via-[#003366]/80 to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-6 w-full">
            <div class="max-w-3xl">
                <span class="text-[#0099ff] font-bold tracking-[0.4em] text-xs uppercase block mb-4">Integrasi Hulu ke Hilir</span>
                <h1 class="text-5xl md:text-8xl font-black text-white leading-none mb-8 uppercase">
                    Day Old <span class="text-[#0099ff]">Chicks</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl italic leading-relaxed border-l-4 border-[#0099ff] pl-6">
                    Bibit unggul berumur satu hari yang menjadi standar emas peternakan nasional, dihasilkan dari proses seleksi genetik yang ketat dan biosekuriti tingkat tinggi.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24 space-y-32">
        
        <div class="group flex flex-col lg:flex-row items-center gap-12 md:gap-20">
            <div class="w-full lg:w-1/2 relative">
                <div class="absolute -inset-4 bg-[#0099ff]/10 rounded-[3rem] -rotate-2 group-hover:rotate-0 transition-transform duration-500"></div>
                <div class="relative h-[450px] rounded-[2.5rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/Doc1.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <span class="text-[#0099ff] font-black text-6xl opacity-20 italic mb-4 block">01</span>
                <h2 class="text-4xl font-black text-[#003366] italic mb-6 uppercase">DOC Ayam <span class="text-[#0099ff]">Pedaging</span></h2>
                <div class="prose prose-lg text-gray-600 mb-8 leading-relaxed">
                    <p class="text-justify">
                        Anak ayam berumur satu hari yang dijual kepada peternak untuk dibudidayakan menjadi ayam potong. Produk ini dirancang untuk memiliki pertumbuhan yang cepat dan efisiensi pakan yang optimal.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 border-t border-gray-100 pt-8">
                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-bold text-[#0099ff] uppercase tracking-widest mb-1">Masa Budi Daya</p>
                        <p class="text-[#003366] font-black text-xl">30 – 45 Hari</p>
                    </div>
                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-bold text-[#0099ff] uppercase tracking-widest mb-1">Berat Rata-Rata</p>
                        <p class="text-[#003366] font-black text-xl  text-sm md:text-xl">1.39 – 2.45 Kg</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="group flex flex-col lg:flex-row-reverse items-center gap-12 md:gap-20">
            <div class="w-full lg:w-1/2 relative">
                <div class="absolute -inset-4 bg-[#003366]/5 rounded-[3rem] rotate-2 group-hover:rotate-0 transition-transform duration-500"></div>
                <div class="relative h-[450px] rounded-[2.5rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/piyik2.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <span class="text-[#003366] font-black text-6xl opacity-10 italic mb-4 block text-right lg:text-left">02</span>
                <h2 class="text-4xl font-black text-[#003366] italic mb-6 uppercase text-right lg:text-left">DOC Ayam <span class="text-[#0099ff]">Petelur</span></h2>
                <div class="prose prose-lg text-gray-600 mb-8 leading-relaxed">
                    <p class="text-justify">
                        Anak ayam berumur satu hari yang dipasok untuk dibudidayakan menjadi ayam petelur. Ayam ini mulai memproduksi telur pada umur 18 minggu sampai 80 minggu dengan tingkat produktivitas tinggi.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 border-t border-gray-100 pt-8">
                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-bold text-[#0099ff] uppercase tracking-widest mb-1">Masa Produksi</p>
                        <p class="text-[#003366] font-black text-xl">18 – 80 Minggu</p>
                    </div>
                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-bold text-[#0099ff] uppercase tracking-widest mb-1">Produktivitas</p>
                        <p class="text-[#003366] font-black text-xl ">1 Telur / 24-28 Jam</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[#003366] rounded-[3rem] p-8 md:p-16 text-white relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#0099ff] opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-10">
                <div class="max-w-xl text-center md:text-left">
                    <h3 class="text-3xl font-black mb-6 uppercase">Spesialisasi <span class="text-[#0099ff]">DOC Lainnya</span></h3>
                    <p class="text-blue-100 leading-relaxed text-lg italic">
                        Selain DOC di atas, Perseroan juga menawarkan DOC Ayam Pembibit Turunan dan DOC Ayam Pejantan untuk spesifikasi pasar yang lebih luas.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="h-32 w-32 md:h-40 md:w-40 bg-white/5 rounded-[2rem] border border-white/10 flex flex-col items-center justify-center p-4 text-center">
                        <span class="text-[10px] font-bold uppercase text-[#0099ff] mb-2">Breeding</span>
                        <span class="text-xs font-bold leading-tight">Ayam Pembibit</span>
                    </div>
                    <div class="h-32 w-32 md:h-40 md:w-40 bg-white/5 rounded-[2rem] border border-white/10 flex flex-col items-center justify-center p-4 text-center">
                        <span class="text-[10px] font-bold uppercase text-[#0099ff] mb-2">Selection</span>
                        <span class="text-xs font-bold leading-tight">Ayam Pejantan</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection