@php
use Illuminate\Support\Facades\Storage;

$productsJson = Storage::get('cms/products.json');
$productsData = json_decode($productsJson, true) ?? [];

$products = array_map(function($product) {
    return [
        'id' => $product['id'] ?? 1,
        'title' => $product['title'],
        'subtitle' => $product['subtitle'],
        'description' => $product['description'],
        'image' => asset($product['image']),
        'link' => $product['link'],
        'tags' => $product['tags'] ?? []
    ];
}, $productsData);
@endphp


<section class="py-24 bg-[#F8FAFC] relative overflow-hidden">
    <!-- Background Gradient Pattern -->
    <div 
        class="absolute inset-0 opacity-[0.03] pointer-events-none" 
        style="background-image: radial-gradient(#001EF2 1px, transparent 1px); background-size: 30px 30px;"
    ></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mb-16 text-left">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-12 h-[3px] bg-[#0AA1FF] rounded-full"></span>
                <span class="text-[#0AA1FF] font-bold tracking-[0.2em] text-sm uppercase">Unit Bisnis Terintegrasi</span>
            </div>
            
            <h3 class="text-3xl md:text-5xl font-extrabold text-[#001EF2] leading-tight mb-6">
                Solusi Pangan <br />
                <span class="text-gray-800">Dari Hulu Hingga ke Hilir</span>
            </h3>
            <p class="text-gray-500 text-lg max-w-2xl">
                Kami memastikan kualitas di setiap tahap untuk menghasilkan produk protein hewani terbaik bagi masyarakat.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @foreach($products as $idx => $product)
                <div class="animate-fade-up" style="animation-delay: {{ $idx * 100 }}ms;">
                    <a href="{{ $product['link'] }}" class="group relative block h-[480px] md:h-[550px] w-full overflow-hidden rounded-3xl bg-gray-900 shadow-xl shadow-blue-900/5">
                        <img 
                            src="{{ $product['image'] }}" 
                            alt="{{ $product['title'] }}"
                            class="absolute inset-0 h-full w-full object-cover opacity-80 transition-transform duration-1000 group-hover:scale-110 group-hover:opacity-40"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent group-hover:via-black/60 transition-all duration-500"></div>

                        <div class="absolute inset-0 flex flex-col justify-end p-7 md:p-9 text-left">
                            <p class="text-[#FFD700] font-bold text-xs uppercase tracking-[0.2em] mb-3 transform transition-transform duration-500 group-hover:-translate-y-2">
                                {{ $product['subtitle'] }}
                            </p>
                            <h4 class="text-2xl md:text-3xl font-bold text-white mb-4 flex items-center justify-between transition-transform duration-500 group-hover:-translate-y-2 w-full">
                                {{ $product['title'] }}
                                <!-- ChevronRight -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="md:hidden text-[#FFD700]"><path d="m9 18 6-6-6-6"/></svg>
                            </h4>
                            <div class="md:max-h-0 overflow-hidden opacity-100 md:opacity-0 transition-all duration-500 group-hover:max-h-60 group-hover:opacity-100">
                                <p class="text-gray-200 text-sm md:text-base leading-relaxed mb-6 line-clamp-3 md:line-clamp-none">
                                    {{ $product['description'] }}
                                </p>
                                <div class="flex items-center text-[#0AA1FF] group-hover:text-[#FFD700] font-bold text-sm tracking-widest transition-colors">
                                    LIHAT DETAIL 
                                    <!-- ArrowRight -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 transform group-hover:translate-x-2 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                </div>
                            </div>
                            <div class="mt-6 flex flex-wrap gap-2 transition-opacity duration-300 md:group-hover:opacity-0">
                                @foreach($product['tags'] as $tag)
                                    <span class="text-[10px] px-3 py-1 bg-white/10 backdrop-blur-md rounded-full border border-white/20 text-white font-medium">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#0AA1FF]/50 rounded-3xl transition-colors duration-500 pointer-events-none"></div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-up {
        animation: fadeUp 0.8s ease-out forwards;
        opacity: 0; 
    }
</style>
