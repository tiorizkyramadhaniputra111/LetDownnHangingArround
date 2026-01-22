@php
use Illuminate\Support\Facades\Storage;

$managementJson = Storage::get('cms/management.json');
$managementRaw = json_decode($managementJson, true) ?? [];

$managementData = [];
foreach ($managementRaw as $key => $data) {
    $managementData[$key] = [
        'label' => $data['label'],
        'members' => array_map(function($member) {
            return [
                'name' => $member['name'],
                'role' => $member['role'],
                'image' => asset($member['image']),
                'bio' => $member['bio']
            ];
        }, $data['members'])
    ];
}
@endphp


<section 
    x-data="{ 
        activeTab: 'direksi', 
        selectedPerson: null 
    }" 
    class="py-24 bg-white overflow-hidden"
>
    <div class="container mx-auto px-4">
        
        <!-- HEADER & TAB SWITCHER -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="max-w-xl text-left">
                <h2 class="text-[#0AA1FF] font-bold tracking-[0.2em] text-xs uppercase mb-3">MANAGEMENT</h2>
                <h3 class="text-3xl md:text-5xl font-black text-gray-900 leading-tight">Kepemimpinan <br/>Perseroan</h3>
            </div>
            
            <div class="flex bg-[#F1F5F9] p-1.5 rounded-xl border border-slate-200 flex-wrap">
                @foreach(array_keys($managementData) as $key)
                    <button 
                        @click="activeTab = '{{ $key }}'"
                        :class="activeTab === '{{ $key }}' ? 'bg-white text-[#001EF2] shadow-sm' : 'text-slate-500 hover:text-slate-800'"
                        class="px-4 py-2 rounded-lg text-[11px] md:text-xs font-bold transition-all uppercase tracking-wider"
                    >
                        {{ $managementData[$key]['label'] }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- GRID CARDS -->
        <div class="flex flex-wrap justify-center gap-4 md:gap-6 min-h-[400px]">
             @foreach($managementData as $key => $data)
                <template x-if="activeTab === '{{ $key }}'">
                    <div class="contents">
                        @foreach($data['members'] as $idx => $person)
                            <div
                                @click="selectedPerson = {{ json_encode($person) }}"
                                class="group cursor-pointer flex flex-col w-[45%] md:w-[22%] lg:w-[15%] min-w-[160px] animate-fade-in"
                                style="animation-delay: {{ $idx * 50 }}ms;"
                            >
                                <!-- CARD VISUAL -->
                                <div class="relative aspect-[3/4.2] bg-[#F1F5F9] rounded-[2rem] overflow-hidden mb-5 border border-slate-100 shadow-sm transition-all group-hover:shadow-2xl">
                                    <!-- Gambar Personil -->
                                    <div class="absolute inset-0">
                                        <img 
                                            src="{{ $person['image'] }}" 
                                            alt="{{ $person['name'] }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                            onerror="this.src='https://api.dicebear.com/7.x/initials/svg?seed={{ urlencode($person['name']) }}'"
                                        />
                                    </div>
                                    
                                    <!-- HOVER OVERLAY BLUE GRADIENT -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#3B82F6] via-[#3B82F6]/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-6">
                                        <p class="text-white text-[10px] font-bold flex items-center gap-1 tracking-widest uppercase">
                                            LIHAT PROFIL 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5"><path d="m9 18 6-6-6-6"/></svg>
                                        </p>
                                    </div>
                                </div>

                                <!-- TEXT INFO -->
                                <div class="px-1 text-center">
                                    <h4 class="font-bold text-gray-900 text-sm md:text-base leading-tight group-hover:text-[#001EF2] transition-colors line-clamp-2 uppercase">
                                        {{ $person['name'] }}
                                    </h4>
                                    <p class="text-[10px] md:text-[11px] text-slate-400 font-bold mt-1.5 tracking-wide leading-snug uppercase">
                                        {{ $person['role'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </template>
            @endforeach
        </div>

        <!-- MODAL BIO DETAIL -->
        <template x-if="selectedPerson">
            <div class="fixed inset-0 z-[100] flex items-center justify-center p-4">
                <!-- Backdrop -->
                <div 
                    @click="selectedPerson = null"
                    class="absolute inset-0 bg-black/60 backdrop-blur-sm"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                ></div>

                <!-- Modal Content -->
                <div 
                    class="relative bg-white w-full max-w-2xl rounded-[2.5rem] shadow-2xl overflow-hidden z-10 p-8 md:p-12 text-left"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                >
                    <button @click="selectedPerson = null" class="absolute top-8 right-8 p-3 bg-slate-100 rounded-full hover:bg-slate-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-600"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="w-full md:w-1/3 aspect-[3/4] bg-slate-100 rounded-2xl overflow-hidden shrink-0">
                            <img 
                                :src="selectedPerson.image" 
                                :alt="selectedPerson.name" 
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <div>
                            <h5 class="text-[#0AA1FF] font-bold text-[10px] uppercase tracking-[0.3em] mb-3">BIOGRAFI EKSEKUTIF</h5>
                            <h4 class="text-2xl md:text-3xl font-black text-gray-900 mb-4" x-text="selectedPerson.name"></h4>
                            <p class="font-bold text-blue-600 text-xs mb-6 tracking-widest uppercase" x-text="selectedPerson.role"></p>
                            <div class="text-sm text-slate-600 leading-relaxed max-h-[250px] overflow-y-auto pr-4 scrollbar-thin scrollbar-thumb-slate-200" x-text="selectedPerson.bio"></div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</section>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
        opacity: 0;
    }
</style>
