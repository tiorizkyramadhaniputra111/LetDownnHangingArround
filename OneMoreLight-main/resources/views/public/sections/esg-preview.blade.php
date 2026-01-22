@php
$achievements = [
    [
        'value' => "100%",
        'label' => "Food Safety",
        'sub' => "FSSC 22000 / HACCP"
    ],
    [
        'value' => "0",
        'label' => "LTIR",
        'sub' => "Zero Accident Target"
    ],
    [
        'value' => "12%",
        'label' => "Renewable Energy",
        'sub' => "Target 2029"
    ]
];

$pilarESG = [
    [
        'title' => "Mendukung Ketahanan Pangan",
        'icon' => 'shield', // using string to select icon
        'desc' => "Fokus pada keamanan pangan, kualitas produk, dan distribusi bertanggung jawab.",
        'target' => "100% fasilitas food tersertifikasi FSSC 22000/HACCP",
        'color' => "border-blue-200 bg-blue-50/50",
        'iconColor' => "text-blue-600"
    ],
    [
        'title' => "Kesejahteraan Mitra & Masyarakat",
        'icon' => 'users',
        'desc' => "Meningkatkan pertumbuhan ekonomi mitra dan pemberdayaan masyarakat.",
        'target' => "Lost Time Injury Rate (LTIR) = 0",
        'color' => "border-rose-200 bg-rose-50/50",
        'iconColor' => "text-rose-600"
    ],
    [
        'title' => "Melindungi Lingkungan Hidup",
        'icon' => 'leaf',
        'desc' => "Fokus pada mitigasi iklim, ekonomi sirkular, dan pengadaan berkelanjutan.",
        'target' => "Energi terbarukan 12% & Daur ulang air 30%",
        'color' => "border-green-200 bg-green-50/50",
        'iconColor' => "text-green-600"
    ]
];
@endphp

<section 
    x-data="{ 
        currentAchieve: 0, 
        achievements: {{ json_encode($achievements) }},
        init() {
            setInterval(() => {
                this.currentAchieve = (this.currentAchieve + 1) % this.achievements.length;
            }, 3000);
        }
    }" 
    class="py-24 bg-white relative overflow-hidden"
>
    <!-- Background Shape -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-50 skew-x-12 translate-x-20 z-0"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12">

            <!-- LEFT SIDE -->
            <div class="w-full lg:w-5/12">
                <div class="animate-fade-right">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-10 h-[2px] bg-[#0AA1FF]"></span>
                        <h2 class="text-[#0AA1FF] font-bold tracking-widest text-sm uppercase">
                            Strategi ESG 2025–2029
                        </h2>
                    </div>

                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Berkomitmen untuk Masa Depan yang 
                        <span class="text-[#001EF2]">Bertanggung Jawab</span>
                    </h3>

                    <p class="text-gray-600 mb-8">
                        Strategi ESG terintegrasi dalam seluruh proses bisnis
                        <span class="font-bold"> FEED, FARM, dan FOOD</span> untuk
                        menciptakan nilai jangka panjang.
                    </p>

                    <div class="space-y-4">
                        @foreach($pilarESG as $idx => $pilar)
                            <div 
                                class="p-4 rounded-2xl border-l-4 {{ $pilar['color'] }} border-l-current flex gap-4 hover:shadow-md transition-all animate-fade-up"
                                style="animation-delay: {{ $idx * 200 }}ms;"
                            >
                                <div class="shrink-0 mt-1 {{ $pilar['iconColor'] }}">
                                    @if($pilar['icon'] === 'shield')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                                    @elseif($pilar['icon'] === 'users')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    @elseif($pilar['icon'] === 'leaf')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold">{{ $pilar['title'] }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ $pilar['desc'] }}</p>
                                    <div class="flex items-center gap-2 text-[10px] font-bold text-[#001EF2] uppercase">
                                        <!-- Target Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                                        {{ $pilar['target'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="w-full lg:w-7/12 flex justify-center items-center relative">
                <div class="relative w-full max-w-[600px] group cursor-pointer perspective-1000">
                    <!-- IMAGE -->
                    <div class="transition-transform duration-500 transform group-hover:scale-105 group-hover:-translate-y-4 group-hover:rotate-x-6 group-hover:-rotate-y-6">
                         <img
                            src="{{ asset('images/Esg.png') }}"
                            alt="Infografis ESG CP Indonesia"
                            class="w-full h-auto object-contain drop-shadow-[0_30px_50px_rgba(0,0,0,0.25)]"
                        />
                    </div>

                     <!-- FLOATING BADGE -->
                    <div class="absolute -top-6 -right-6 z-30">
                        <template x-for="(item, index) in achievements" :key="index">
                            <div 
                                x-show="currentAchieve === index"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-x-4 scale-90"
                                x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                                x-transition:leave-end="opacity-0 -translate-x-4 scale-90"
                                class="bg-[#0AA1FF] p-5 rounded-2xl shadow-2xl text-white absolute top-0 right-0 w-max"
                            >
                                <div class="flex items-center gap-2 mb-2 opacity-80">
                                    <!-- BarChart3 -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                                    <span class="text-[9px] font-bold uppercase">
                                        Capaian Target
                                    </span>
                                </div>
                                <p class="font-black text-3xl" x-text="item.value"></p>
                                <p class="text-[10px] font-bold uppercase" x-text="item.label"></p>
                                <p class="text-[9px] opacity-70 italic" x-text="item.sub"></p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .perspective-1000 { perspective: 1000px; }
    .rotate-x-6 { transform: rotateX(6deg); }
    .-rotate-y-6 { transform: rotateY(-6deg); }
    
    @keyframes fadeRight {
        from { opacity: 0; transform: translateX(-30px); }
        to { opacity: 1; transform: translateX(0); }
    }
    .animate-fade-right {
        animation: fadeRight 0.8s ease-out forwards;
        opacity: 0;
    }
</style>
