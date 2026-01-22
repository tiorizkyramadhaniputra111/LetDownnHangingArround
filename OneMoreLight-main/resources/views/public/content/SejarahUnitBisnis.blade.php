@extends('layouts.app')

@section('content')
    {{-- Memanggil Navbar dari partials --}}
    @include('public.partials.navbar')

<main class="min-h-screen bg-white">
    <div class="relative bg-[#0099ff] pt-24 pb-16 md:pt-32 md:pb-24 px-4 md:px-6 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 L100 0 L100 100 Z" fill="white"></path>
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto text-center md:text-left">
            <span class="text-blue-100 font-semibold tracking-widest uppercase text-xs md:text-sm block mb-2">— TENTANG KAMI</span>
            <h1 class="text-3xl md:text-6xl font-extrabold text-white tracking-tight leading-tight">Sejarah Perseroan</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-10 md:py-16 px-6 md:px-6">
        {{-- Kita pakai flex-col-reverse di mobile agar Sidebar naik ke atas --}}
        <div class="flex flex-col-reverse lg:grid lg:grid-cols-3 gap-10 lg:gap-16">
            
            <div class="lg:col-span-2 space-y-12">
                <section>
                    <div class="flex items-center space-x-4 mb-6 md:mb-8 text-[#0099ff]">
                        <div class="h-1.5 w-12 md:w-16 bg-[#0099ff] rounded-full"></div>
                        <h2 class="text-2xl md:text-3xl font-bold text-[#003366] uppercase tracking-tight">Awal Pendirian</h2>
                    </div>
                    <div class="text-gray-700 leading-relaxed space-y-6 text-base md:text-lg">
                        <p class="text-justify">
                            PT Charoen Pokphand Indonesia Tbk (”Perseroan”) didirikan di Indonesia dengan nama 
                            <strong class="font-bold text-[#001EF2]">PT Charoen Pokphand Indonesia Animal Feedmill Co. Limited</strong>, 
                            berdasarkan Akta Notaris Drs. Gde Ngurah Rai, S.H., No. 6 tanggal 7 Januari 1972.
                        </p>
                        <p class="text-justify font-light border-l-4 border-blue-100 pl-4 md:pl-6 py-2 bg-blue-50/50 italic">
                            Akta tersebut disahkan oleh Menteri Kehakiman Republik Indonesia dengan Surat Keputusan No. YA-5/197/21 tanggal 8 Juni 1973. Seiring pertumbuhan industri, Anggaran Dasar Perseroan mengalami pembaruan terakhir pada 22 Mei 2023.
                        </p>
                    </div>
                </section>

                <section class="bg-blue-50 p-6 md:p-10 rounded-2xl md:rounded-[2rem] border-t-8 border-[#0099ff] shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-5 text-[#0099ff] hidden md:block">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                    </div>
                    
                    <h2 class="text-xl md:text-2xl font-bold text-[#003366] mb-8 flex items-center uppercase tracking-wide ">
                        Ruang Lingkup Kegiatan Usaha
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8 text-[13px] md:text-sm text-[#003366]">
                        <div>
                            <h3 class="font-bold uppercase text-[#0099ff] mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 bg-[#0099ff] rounded-full"></span> Perunggasan & Peternakan
                            </h3>
                            <ul class="space-y-2 ml-4 list-disc marker:text-[#0099ff]">
                                <li>Pembibitan Ayam Ras</li>
                                <li>Budidaya Ayam Ras Pedaging</li>
                                <li>Perdagangan Besar Binatang Hidup</li>
                                <li>Industri Ransum Makanan Hewan</li>
                                <li>Industri & Bahan Farmasi untuk Hewan</li>
                                <li>Industri Mesin Pertanian dan Kehutanan</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-bold uppercase text-[#0099ff] mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 bg-[#0099ff] rounded-full"></span> Pengolahan & Makanan
                            </h3>
                            <ul class="space-y-2 ml-4 list-disc marker:text-[#0099ff]">
                                <li>Rumah Potong & Pengepakan Daging</li>
                                <li>Industri Pengolahan Produk Daging</li>
                                <li>Industri Makanan & Masakan Olahan</li>
                                <li>Industri Tepung, Makaroni & Mie</li>
                                <li>Industri Kedelai & Kacang-kacangan</li>
                                <li>Industri Produk Makanan Lainnya</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-bold uppercase text-[#0099ff] mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 bg-[#0099ff] rounded-full"></span> Logistik & Perdagangan
                            </h3>
                            <ul class="space-y-2 ml-4 list-disc marker:text-[#0099ff]">
                                <li>Pergudangan & Cold Storage</li>
                                <li>Perdagangan Besar Daging Sapi & Ayam</li>
                                <li>Perdagangan Besar Telur & Hasil Olahan</li>
                                <li>Perdagangan Besar Makanan & Minuman</li>
                                <li>Industri Barang Plastik Pengemasan</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-bold uppercase text-[#0099ff] mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 bg-[#0099ff] rounded-full"></span> Minuman & Jasa Penunjang
                            </h3>
                            <ul class="space-y-2 ml-4 list-disc marker:text-[#0099ff]">
                                <li>Industri Minuman Ringan & Air Kemasan</li>
                                <li>Industri Pembekuan Buah/Sayuran</li>
                                <li>Industri Perlengkapan Rumah Tangga</li>
                                <li>Jasa Pengujian Laboratorium</li>
                                <li>Aktivitas Kantor Pusat</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>

            <div class="lg:col-span-1">
                <div class="lg:sticky lg:top-24 space-y-6 md:space-y-8 flex flex-col">
                    
                    <div class="group relative bg-[#001EF2] h-[280px] md:h-[350px] rounded-2xl md:rounded-[2rem] shadow-2xl overflow-hidden flex items-center justify-center p-8 md:p-10 cursor-pointer order-first lg:order-none">
                        <div class="absolute inset-0 flex items-center justify-center p-12 transition-all duration-500 ease-in-out group-hover:opacity-0 group-hover:scale-75">
                            <img src="{{ asset('images/Charoend.png') }}" alt="Logo CPIN" class="w-full h-full object-contain filter brightness-0 invert">
                        </div>
                        <div class="relative z-10 text-center opacity-0 transform translate-y-4 transition-all duration-500 ease-in-out group-hover:opacity-100 group-hover:translate-y-0">
                            <h3 class="text-xs font-bold uppercase tracking-widest text-blue-300 mb-4 md:mb-6">Visi Perseroan</h3>
                            <p class="text-xl md:text-2xl font-light italic leading-relaxed text-white">
                                "Menyediakan pangan bagi dunia yang berkembang."
                            </p>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                    </div>

                    <div class="bg-white border border-gray-100 p-8 md:p-10 rounded-2xl md:rounded-[2rem] shadow-xl shadow-blue-900/5">
                        <h3 class="font-bold text-[#003366] mb-6 md:mb-8 text-lg md:text-xl">Legalitas Terkini</h3>
                        <div class="space-y-4 md:space-y-6 text-sm">
                            <div class="flex justify-between items-end border-b border-gray-50 pb-3 md:pb-4">
                                <span class="text-gray-400 uppercase tracking-wider text-[10px] md:text-xs text-left">Tahun Berdiri</span>
                                <span class="text-[#003366] font-bold">1972</span>
                            </div>
                            <div class="flex justify-between items-end border-b border-gray-50 pb-3 md:pb-4">
                                <span class="text-gray-400 uppercase tracking-wider text-[10px] md:text-xs text-left">Akta Terakhir</span>
                                <span class="text-[#003366] font-bold">Mei 2023</span>
                            </div>
                        </div>
                        <button class="w-full mt-6 md:mt-8 py-3 md:py-4 bg-blue-50 hover:bg-blue-100 text-[#003366] font-bold rounded-xl transition-all duration-300 text-sm">
                            Download Anggaran Dasar
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>
@endsection