@extends('layouts.app')

@section('content')
    @include('public.partials.navbar')

<main class="min-h-screen bg-slate-50">
    <div class="relative bg-[#003366] min-h-[60vh] flex items-center overflow-hidden pt-20">
        <div class="absolute inset-0">
            <img src="{{ asset('images/AyamPdg1.jpg') }}" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-[#003366] via-[#003366]/80 to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-6 w-full">
            <div class="max-w-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-[2px] w-10 bg-[#0099ff]"></span>
                    <span class="text-[#0099ff] font-bold tracking-[0.2em] text-xs uppercase">Premium Poultry Supply</span>
                </div>
                <h1 class="text-4xl md:text-7xl font-black text-white leading-none mb-6">
                    AYAM <span class="text-[#0099ff]">PEDAGING</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl leading-relaxed border-l-4 border-[#0099ff] pl-6 italic">
                    Menghasilkan kualitas terbaik melalui integrasi teknologi peternakan modern dan pemberdayaan masyarakat lokal.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 -mt-12 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([
                ['icon' => '🏠', 'label' => 'Kandang Modern', 'val' => 'Bio-Security'],
                ['icon' => '🤝', 'label' => 'Kemitraan', 'val' => 'Plasma System'],
                ['icon' => '📍', 'label' => 'Distribusi', 'val' => 'Nasional'],
                ['icon' => '🛡️', 'label' => 'Kualitas', 'val' => 'HACCP Cert.']
            ] as $stat)
            <div class="bg-white p-6 rounded-2xl shadow-xl border-b-4 border-[#0099ff] hover:-translate-y-2 transition-transform duration-300">
                <div class="text-2xl mb-2">{{ $stat['icon'] }}</div>
                <div class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">{{ $stat['label'] }}</div>
                <div class="text-[#003366] font-extrabold">{{ $stat['val'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-20 px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            <div class="lg:col-span-7 space-y-16">
                <section>
                    <h2 class="text-3xl font-black text-[#003366] mb-8 flex items-end gap-3 uppercase">
                        OPERASIONAL <span class="text-sm font-bold text-[#0099ff] mb-1 tracking-widest not-italic">/ STRATEGIS</span>
                    </h2>
                    
                    <div class="prose prose-lg text-gray-600 max-w-none leading-relaxed mb-8">
                        <p class="text-justify">
                            Budi daya ayam pedaging dilakukan oleh Perseroan di beberapa lokasi peternakan yang tersebar di wilayah strategis Indonesia. Kami berkomitmen untuk menghasilkan produk ayam berkualitas tinggi melalui standar manajemen peternakan yang modern.
                        </p>
                    </div>

                    <div x-data="{ 
                        active: 0,
                        loop() {
                            setInterval(() => { this.active = this.active === 3 ? 0 : this.active + 1 }, 5000)
                        },
                        slides: [
                            { img: 'kandang1.webp', text: 'Peresmian Teaching Farm Broiler Closed House: Wujud kolaborasi PT Charoen Pokphand Indonesia dengan berbagai kampus nasional.' },
                            { img: 'kandang2.webp', text: 'Peresmian Teaching Farm Broiler Closed House: Wujud kolaborasi PT Charoen Pokphand Indonesia dengan berbagai kampus nasional.' },
                            { img: 'kandang3.webp', text: 'Peresmian Teaching Farm Broiler Closed House: Wujud kolaborasi PT Charoen Pokphand Indonesia dengan berbagai kampus nasional.' },
                            { img: 'kandang4.webp', text: 'Kemitraan strategis dengan peternak lokal di berbagai wilayah Indonesia.' }
                        ]
                    }" x-init="loop()" class="relative rounded-[2rem] overflow-hidden aspect-video group shadow-2xl bg-slate-200">
                        
                        <div class="relative h-full w-full">
                            <template x-for="(slide, index) in slides" :key="index">
                                <div x-show="active === index" 
                                     x-transition:enter="transition ease-out duration-1000"
                                     x-transition:enter-start="opacity-0 scale-110"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-1000"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0"
                                     class="absolute inset-0">
                                    
                                    <img :src="'{{ asset('images/') }}/' + slide.img" class="w-full h-full object-cover" :alt="slide.text">
                                    
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#003366]/90 via-[#003366]/20 to-transparent"></div>
                                    
                                    <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                                        <div class="flex flex-col gap-2" x-show="active === index" x-transition:enter="translate-y-4 opacity-0 transition duration-700 delay-300" x-transition:enter-end="translate-y-0 opacity-100">
                                            <span class="text-[#0099ff] font-bold tracking-widest text-xs uppercase">Project Highlight</span>
                                            <p class="text-white font-bold  text-lg md:text-2xl max-w-3xl leading-tight" x-text="slide.text"></p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <button @click="active = active === 0 ? 3 : active - 1" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-[#0099ff] p-3 rounded-full text-white backdrop-blur-md opacity-0 group-hover:opacity-100 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button @click="active = active === 3 ? 0 : active + 1" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-[#0099ff] p-3 rounded-full text-white backdrop-blur-md opacity-0 group-hover:opacity-100 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>

                        <div class="absolute bottom-6 right-12 flex gap-3">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button @click="active = index" 
                                        :class="active === index ? 'bg-[#0099ff] w-10' : 'bg-white/40 w-3'"
                                        class="h-1.5 rounded-full transition-all duration-500"></button>
                            </template>
                        </div>
                    </div>
                </section>

                <section class="bg-[#003366] rounded-[3rem] p-8 md:p-12 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#0099ff] opacity-10 rounded-full -mr-20 -mt-20"></div>
                    <h2 class="text-2xl font-black mb-6 uppercase">Kemitraan Usaha Plasma</h2>
                    <div class="space-y-6 relative z-10 text-blue-100">
                        <p class="leading-relaxed text-justify">
                            Selain peternakan milik sendiri, Perseroan menjalin kerja sama kemitraan usaha dengan peternak plasma. Dalam hubungan ini, peternak plasma menyediakan lahan dan kandang, sementara Perseroan memberikan bimbingan teknis serta input produksi berkualitas.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                            <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm border border-white/10">
                                <span class="block font-bold text-[#0099ff] mb-1">Peternak Plasma</span>
                                <span class="text-xs">Menyediakan Lahan & Kandang Standar Perseroan.</span>
                            </div>
                            <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm border border-white/10">
                                <span class="block font-bold text-[#0099ff] mb-1">Perseroan</span>
                                <span class="text-xs">DOC, Pakan, Obat-obatan, & Bimbingan Teknis.</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="lg:col-span-5 lg:sticky lg:top-24 space-y-8">
                <div class="group relative bg-[#001EF2] h-[250px] rounded-3xl shadow-2xl overflow-hidden flex items-center justify-center p-10 cursor-pointer">
                    <div class="absolute inset-0 flex items-center justify-center p-12 transition-all duration-500 group-hover:opacity-0 group-hover:scale-75">
                        <img src="{{ asset('images/Charoend.png') }}" class="w-full h-full object-contain brightness-0 invert" alt="Logo">
                    </div>
                    <div class="relative z-10 text-center opacity-0 transform translate-y-4 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
                        <h3 class="text-[10px] font-bold uppercase tracking-widest text-blue-300 mb-2">Our Core Vision</h3>
                        <p class="text-xl font-bold italic text-white leading-tight">
                            "Menyediakan pangan bagi dunia yang berkembang."
                        </p>
                    </div>
                    <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>

                <div class="bg-white p-8 rounded-[2rem] shadow-xl border border-gray-100">
                    <h3 class="font-black text-[#003366] text-xl mb-8 border-b border-gray-100 pb-4 uppercase">Quality Standards</h3>
                    <div class="space-y-8">
                        @foreach([
                            ['title' => 'Self-Supply Feed', 'desc' => 'Pakan berkualitas tinggi dari pabrik sendiri.'],
                            ['title' => 'Expert Guidance', 'desc' => 'Bimbingan teknis berkala bagi peternak plasma.'],
                            ['title' => 'Hygiene Facility', 'desc' => 'Fasilitas kandang modern, higienis, dan aman.']
                        ] as $index => $item)
                        <div class="flex gap-4 group">
                            <span class="text-[#0099ff] font-black text-2xl opacity-30 group-hover:opacity-100 transition-opacity">0{{ $index+1 }}</span>
                            <div>
                                <h4 class="font-bold text-[#003366] leading-none mb-2 tracking-tight">{{ $item['title'] }}</h4>
                                <p class="text-sm text-gray-500 leading-snug">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="w-full mt-10 py-4 bg-[#0099ff] text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:bg-[#001EF2] transition-all transform hover:scale-[1.02]">
                        Hubungi Tim Kemitraan
                    </button>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection