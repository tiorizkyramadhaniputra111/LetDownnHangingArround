@php
use Illuminate\Support\Facades\Storage;

$slidesJson = Storage::get('cms/slides.json');
$slidesData = json_decode($slidesJson, true) ?? [];

$slides = array_map(function($slide) {
    return [
        'id' => $slide['id'],
        'title' => $slide['title'],
        'description' => $slide['description'],
        'image' => asset($slide['image'])
    ];
}, $slidesData);
@endphp


<section 
    x-data="{ 
        currentSlide: 0, 
        slides: {{ json_encode($slides) }},
        init() {
            setInterval(() => {
                this.nextSlide();
            }, 5000);
        },
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        },
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        }
    }"
    class="relative h-[600px] lg:h-[800px] overflow-hidden bg-gray-900 text-white"
>
    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="slide.id">
        <div 
            x-show="currentSlide === index"
            x-transition:enter="transition ease-in-out duration-1000"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-1000"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            :style="`background-image: url('${slide.image}')`"
        >
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40 bg-gradient-to-r from-black/70 to-transparent"></div>
            
            <div class="container mx-auto px-4 h-full flex items-center relative z-10">
                <div class="max-w-3xl">
                    <h1 
                        class="text-4xl md:text-6xl font-bold mb-6 leading-tight animate-fade-up"
                        x-text="slide.title"
                    ></h1>

                    <p 
                        class="text-lg md:text-xl text-gray-100 mb-8 max-w-2xl animate-fade-up animation-delay-200"
                        x-text="slide.description"
                    ></p>

                    <div class="animate-fade-up animation-delay-400">
                        <button class="bg-[#E6C200] hover:bg-[#FFD700] text-[#001EF2] font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Pelajari Lebih Lanjut
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Controls -->
    <div class="absolute bottom-10 right-10 flex gap-4 z-20">
        <button
            @click="prevSlide()"
            class="p-3 rounded-full border border-white/30 text-white hover:bg-[#FFD700] hover:text-[#001EF2] hover:border-[#FFD700] transition-all duration-300"
        >
            <!-- ChevronLeft -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <button
            @click="nextSlide()"
            class="p-3 rounded-full border border-white/30 text-white hover:bg-[#FFD700] hover:text-[#001EF2] hover:border-[#FFD700] transition-all duration-300"
        >
            <!-- ChevronRight -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>
    </div>

    <!-- Slide Indicators -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button
                @click="currentSlide = index"
                class="h-2 rounded-full transition-all duration-300"
                :class="currentSlide === index ? 'bg-[#FFD700] w-8' : 'bg-white/50 w-2 hover:bg-white'"
            ></button>
        </template>
    </div>

    <!-- Custom Fade Up Animation Styles (Tailwind Arbitrary Variants could work but simple classes are easier) -->
    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            animation: fadeUp 1.2s ease-out forwards;
            opacity: 0; /* Start hidden */
        }
        .animation-delay-200 { animation-delay: 0.2s; }
        .animation-delay-400 { animation-delay: 0.4s; }
    </style>
</section>
