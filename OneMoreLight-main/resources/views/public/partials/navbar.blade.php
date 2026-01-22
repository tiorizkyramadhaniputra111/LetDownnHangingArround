@php
$menuItems = [
    [
        'label' => 'TENTANG KAMI',
        'href' => '/tentang-kami',
        'columns' => [
            [
                'items' => [
                    ['label' => 'Visi dan Misi', 'href' => '/tentang-kami/visi-misi'],
                    ['label' => 'Riwayat Singkat', 'href' => '/tentang-kami/riwayat'],
                    ['label' => 'Kantor Pusat & Fasilitas Produksi', 'href' => '/tentang-kami/lokasi'],
                ],
            ],
            [
                'items' => [
                    ['label' => 'Struktur Kepemilikan', 'href' => '/tentang-kami/struktur-kepemilikan'],
                    ['label' => 'Struktur Grup', 'href' => '/tentang-kami/struktur-grup'],
                    ['label' => 'Struktur Organisasi', 'href' => '/tentang-kami/struktur-organisasi'],
                ],
            ],
            [
                'items' => [
                    ['label' => 'Manajemen', 'href' => '/tentang-kami/manajemen'],
                    ['label' => 'Lembaga Penunjang', 'href' => '/tentang-kami/lembaga-penunjang'],
                    ['label' => 'Anggaran Dasar', 'href' => '/tentang-kami/anggaran-dasar'],
                ],
            ],
        ],
    ],
    [
        'label' => 'PRODUK KAMI',
        'href' => '/produk',
        'columns' => [
            [
                'items' => [
                    ['label' => 'Ayam Pedaging', 'href' => '/produk/broiler'],
                    ['label' => 'Pakan Ternak', 'href' => '/produk/pakan'],
                ],
            ],
            [
                'items' => [
                    ['label' => 'Makanan Olahan', 'href' => '/produk/makanan-olahan'],
                    ['label' => 'Day Old Chicks (DOC)', 'href' => '/produk/doc'],
                ],
            ],
        ],
    ],
    [
        'label' => 'HUBUNGAN INVESTOR',
        'href' => '/investor',
        'columns' => [
            [
                'items' => [
                    ['label' => 'Prospektus', 'href' => '/investor/prospektus'],
                    ['label' => 'Laporan Tahunan/Keuangan', 'href' => '/investor/laporan'],
                    ['label' => 'Ikhtisar Keuangan', 'href' => '/investor/ikhtisar'],
                ],
            ],
            [
                'items' => [
                    ['label' => 'RUPS', 'href' => '/investor/rups'],
                    ['label' => 'Pencatatan Saham', 'href' => '/investor/saham'],
                ],
            ],
            [
                'items' => [
                    ['label' => 'Dividen', 'href' => '/investor/dividen'],
                    ['label' => 'Keterbukaan Informasi', 'href' => '/investor/keterbukaan-informasi'],
                ],
            ],
        ],
    ],
    [
        'label' => 'TATA KELOLA',
        'href' => '/tata-kelola',
        'columns' => [
            [
                'items' => [
                    ['label' => 'Dewan Komisaris', 'href' => '/tata-kelola/komisaris'],
                    ['label' => 'Direksi', 'href' => '/tata-kelola/direksi'],
                    ['label' => 'Komite Audit', 'href' => '/tata-kelola/audit'],
                ],
            ],
            [
                'items' => [
                    ['label' => 'Komite Nominasi', 'href' => '/tata-kelola/nominasi'],
                    ['label' => 'Audit Internal', 'href' => '/tata-kelola/audit-internal'],
                    ['label' => 'Sekretaris Perusahaan', 'href' => '/tata-kelola/sekretaris'],
                ],
            ],
            [
                'items' => [
                    ['label' => 'Kode Etik', 'href' => '/tata-kelola/kode-etik'],
                    ['label' => 'Manajemen Risiko', 'href' => '/tata-kelola/manajemen-risiko'],
                ],
            ],
        ],
    ],
    [
        'label' => 'ESG',
        'href' => '/esg',
        'columns' => [
            [
                'items' => [
                    ['label' => 'Strategi LST', 'href' => '/esg/strategi'],
                    ['label' => 'Laporan Keberlanjutan', 'href' => '/esg/laporan'],
                ],
            ],
        ],
    ],
    [
        'label' => 'HUBUNGI KAMI',
        'href' => '/kontak',
        'columns' => [],
    ],
];
@endphp

<header
    x-data="{ 
        scrolled: false, 
        mobileMenuOpen: false, 
        activeMenu: null 
    }"
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'bg-[#0AA1FF] shadow-md py-2.5' : 'bg-transparent py-5'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-in-out"
>
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
          
            <!-- LOGO SECTION -->
<a href="/" class="flex items-center gap-3 z-50 group">
    <div 
        class="relative transition-all duration-500 ease-in-out"
        :class="scrolled ? 'scale-90' : 'scale-100'"
    >
        <div 
            class="rounded-md p-1 shrink-0 flex items-center justify-center transition-all duration-500 ease-in-out"
            :class="scrolled ? 'bg-transparent shadow-none' : 'bg-white shadow-sm'"
        >
            <img 
                src="{{ asset('images/Charoend.png') }}" 
                alt="Logo CPIN" 
                class="w-16 h-16 object-contain transition-all duration-500"
                :class="scrolled ? 'scale-110' : ''" 
            />
        </div>
    </div>
    
    <div 
        class="font-bold tracking-tight leading-tight transition-all duration-300"
        :class="mobileMenuOpen ? 'text-[#001EF2]' : 'text-white'"
    >
        <span 
            class="transition-all duration-300"
            :class="scrolled ? 'text-lg text-white' : 'text-xl text-white'"
        > 
            PT CHAROEN POKPHAND INDONESIA Tbk
        </span>
    </div>
</a>

            <!-- DESKTOP NAVIGATION -->
            <nav class="hidden lg:flex items-center gap-8">
                @foreach($menuItems as $item)
                    <div
                        class="relative group h-full flex items-center"
                        @mouseenter="activeMenu = '{{ $item['label'] }}'"
                        @mouseleave="activeMenu = null"
                    >
                        <a
                            href="{{ $item['href'] }}"
                            class="relative flex items-center gap-1 text-[13px] font-bold tracking-wider py-2 uppercase transition-colors duration-300"
                            :class="activeMenu === '{{ $item['label'] }}' ? 'text-[#FFD700]' : 'text-white'"
                        >
                            <span class="inline-block hover:scale-110 transition-transform duration-300 ease-out">
                                {{ $item['label'] }}
                            </span>
                            
                            @if(count($item['columns']) > 0)
                                <div 
                                    class="transition-transform duration-300"
                                    :class="activeMenu === '{{ $item['label'] }}' ? 'rotate-180' : 'rotate-0'"
                                >
                                    <!-- ChevronDown Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="m6 9 6 6 6-6"/></svg>
                                </div>
                            @endif
                            <span class="absolute -bottom-1 left-0 w-0 h-[3px] bg-[#001EF2] rounded-full transition-all duration-300 ease-out group-hover:w-full"></span>
                        </a>

                        @if(count($item['columns']) > 0)
                            <div
                                x-show="activeMenu === '{{ $item['label'] }}'"
                                x-transition:enter="transition ease-out duration-400"
                                x-transition:enter-start="opacity-0 translate-y-5"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-2"
                                class="absolute top-full left-1/2 -translate-x-1/2 mt-4 w-max min-w-[650px] bg-white rounded-b-xl shadow-2xl border-t-4 border-[#0AA1FF] p-8 grid grid-cols-3 gap-10"
                                style="display: none;"
                            >
                                <div class="absolute -top-[10px] left-1/2 -translate-x-1/2 w-0 h-0 border-l-[10px] border-l-transparent border-r-[10px] border-r-transparent border-b-[10px] border-b-[#0AA1FF]"></div>

                                @foreach($item['columns'] as $col)
                                    <div class="flex flex-col gap-3">
                                        @foreach($col['items'] as $subItem)
                                            <a
                                                href="{{ $subItem['href'] }}"
                                                class="group/item block relative"
                                            >
                                                <div class="flex items-center gap-2 text-[14px] text-gray-600 transition-colors duration-200 group-hover/item:text-[#001EF2] hover:translate-x-1.5 transition-transform">
                                                    <div class="relative w-4 h-4 flex items-center justify-center">
                                                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full absolute group-hover/item:opacity-0 transition-opacity duration-200"></span>
                                                        <!-- ChevronRight Icon -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-[#E1AD1B] absolute opacity-0 -translate-x-2 group-hover/item:opacity-100 group-hover/item:translate-x-0 transition-all duration-300"><path d="m9 18 6-6-6-6"/></svg>
                                                    </div>
                                                    <span class="font-medium">{{ $subItem['label'] }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </nav>

            <!-- MOBILE MENU BUTTON -->
            <button
                class="lg:hidden z-50 p-2 transition-transform active:scale-90"
                :class="mobileMenuOpen ? 'text-[#001EF2]' : 'text-white'"
                @click="mobileMenuOpen = !mobileMenuOpen"
            >
                <div x-show="!mobileMenuOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </div>
                <div x-show="mobileMenuOpen" style="display: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </div>
            </button>
        </div>
    </div>

    <!-- MOBILE MENU OVERLAY -->
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 height-0"
        x-transition:enter-end="opacity-100 height-[100vh]"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 height-[100vh]"
        x-transition:leave-end="opacity-0 height-0"
        class="fixed inset-0 bg-white z-40 pt-24 px-8 overflow-y-auto lg:hidden"
        style="display: none;"
    >
        <div class="flex flex-col gap-6 pb-10">
            @foreach($menuItems as $item)
                <div class="border-b border-gray-100 pb-4">
                    <div class="font-bold text-[#001EF2] mb-3">{{ $item['label'] }}</div>
                    <div class="grid grid-cols-1 gap-2 pl-4">
                        @php
                            $allItems = [];
                            foreach($item['columns'] as $col) {
                                $allItems = array_merge($allItems, $col['items']);
                            }
                        @endphp

                        @foreach($allItems as $subItem)
                            <a
                                href="{{ $subItem['href'] }}"
                                class="text-sm text-gray-600 active:text-[#001EF2] py-1 block"
                                @click="mobileMenuOpen = false"
                            >
                                {{ $subItem['label'] }}
                            </a>
                        @endforeach

                        @if(empty($allItems))
                             <a
                                href="{{ $item['href'] }}"
                                class="text-sm text-gray-600 active:text-[#001EF2] py-1 block -mt-2"
                                @click="mobileMenuOpen = false"
                            >
                                Buka Halaman
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</header>
