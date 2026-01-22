@php
use Illuminate\Support\Facades\Storage;

$settingsJson = Storage::get('cms/settings.json');
$settings = json_decode($settingsJson, true) ?? [];

$companyName = $settings['company_name'] ?? 'PT Charoen Pokphand Indonesia Tbk';
$companySince = $settings['company_since'] ?? '1972';
$companyTagline = $settings['company_tagline'] ?? 'Berdedikasi dalam industri pakan ternak dan pembibitan ayam ras di Indonesia.';
$vision = $settings['vision'] ?? 'Menyediakan pangan bagi dunia yang berkembang.';
$missionIntro = $settings['mission_intro'] ?? 'Memproduksi dan menjual produk berkualitas tinggi dan berinovasi yang meliputi:';
$missionItems = $settings['mission_items'] ?? ['Pakan Ternak', 'Anak Ayam Usia Sehari (DOC)', 'Ayam Pedaging', 'Makanan Olahan'];
$visionImage = isset($settings['vision_image']) ? asset($settings['vision_image']) : asset('images/karosel1cp.jpeg');
@endphp

<section class="py-24 bg-white relative overflow-hidden">
      
    <!-- BACKGROUND ACCENTS -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#0AA1FF]/5 -skew-x-12 translate-x-1/2 -translate-y-1/2 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-20 left-0 w-1 h-32 bg-gradient-to-b from-[#0AA1FF] to-transparent hidden lg:block"></div>
    <div class="absolute bottom-10 left-10 w-64 h-64 border border-gray-100 rounded-full opacity-50 pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            
            <!-- VISUAL SIDE (GAMBAR) -->
            <div class="w-full lg:w-1/2 relative">
                <!-- Aksen Kotak Garis Biru -->
                <div class="absolute top-4 -left-4 w-full h-full border-2 border-[#0AA1FF] rounded-2xl z-0 hidden md:block"></div>

                <!-- Container Gambar -->
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl aspect-[4/3] group">
                    <img 
                        src="{{ $visionImage }}" 
                        alt="Visi Misi {{ $companyName }}" 
                        class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#001EF2]/20 to-transparent mix-blend-multiply"></div>
                </div>

                <!-- Floating Card -->
                <div class="absolute -bottom-6 -right-4 lg:-right-8 bg-white p-6 rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] border-l-4 border-[#FFD700] max-w-[280px] z-20 hidden md:block">
                    <p class="font-bold text-[#001EF2] text-xl mb-1">Sejak {{ $companySince }}</p>
                    <p class="text-sm text-gray-600 leading-snug">{{ $companyTagline }}</p>
                </div>
            </div>

            <!-- TEXT SIDE -->
            <div class="w-full lg:w-1/2">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-10 h-[2px] bg-[#0AA1FF]"></span>
                    <h2 class="text-[#0AA1FF] font-bold tracking-widest text-sm uppercase">Tentang Kami</h2>
                </div>
                
                <h3 class="text-3xl md:text-4xl font-bold text-[#001EF2] mb-8 leading-tight">
                    {{ $companyName }}
                </h3>
                
                <div class="space-y-8">
                    <!-- VISI -->
                    <div class="relative pl-6 border-l-2 border-gray-200 hover:border-[#FFD700] transition-colors duration-300">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Visi</h4>
                        <p class="text-gray-600 leading-relaxed italic">
                            "{{ $vision }}"
                        </p>
                    </div>
                    
                    <!-- MISI -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Misi</h4>
                        <p class="text-gray-600 mb-4">{{ $missionIntro }}</p>
                        <ul class="space-y-4">
                            @foreach($missionItems as $item)
                                <li class="flex items-start gap-3 text-gray-600 group">
                                    <div class="mt-1 w-5 h-5 rounded-full bg-[#0AA1FF]/10 flex items-center justify-center shrink-0 group-hover:bg-[#0AA1FF] transition-colors duration-300">
                                        <!-- CheckCircle Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#0AA1FF] group-hover:text-white transition-colors duration-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    </div>
                                    <span class="group-hover:text-[#001EF2] transition-colors duration-300 font-medium">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- CTA -->
             <div class="mt-10 flex flex-wrap gap-4">
    <a href="{{ route('history.unit') }}" class="px-8 py-3 bg-[#0AA1FF] text-white font-semibold rounded shadow-lg shadow-blue-200 hover:bg-[#001EF2] transition-all duration-300 inline-block">
        Lihat Unit Bisnis
    </a>

    <a href="{{ route('history.unit') }}" class="px-8 py-3 bg-white border border-gray-200 text-gray-600 font-semibold rounded hover:border-[#0AA1FF] hover:text-[#0AA1FF] transition-all duration-300 inline-block text-center">
        Sejarah Perseroan
    </a>
</div>
            </div>
            
        </div>
    </div>
</section>

