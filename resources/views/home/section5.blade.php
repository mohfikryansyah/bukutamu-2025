<section class="bg-white pb-28 pt-12">
    <div class="container mx-auto px-6">
        <h3 class="text-emerald-700 text-3xl md:text-4xl text-center font-bold font-montserrat pb-4">
            {{ $survei->judul }}
        </h3>
        <p class="text-center text-gray-600 max-w-2xl mx-auto">
            {{ $survei->deskripsi }}
        </p>

        <div class="flex flex-col md:flex-row justify-center items-center gap-8 mt-12">
            <!-- Card 1 -->
            <div
                class="group relative bg-gradient-to-b from-emerald-50 to-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 w-full md:w-1/3 p-8 text-center border border-emerald-100">
                <div
                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-emerald-700 group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m2 0a2 2 0 002-2V8a2 2 0 00-2-2H7a2 2 0 00-2 2v2a2 2 0 002 2zm10 0v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8" />
                    </svg>
                </div>
                <h4 class="text-lg font-semibold text-emerald-800 mb-2">Isi Survei</h4>
                <p class="text-gray-600 mb-6">Klik tombol di bawah untuk menuju halaman survei kepuasan pengguna.</p>
                <a href="{{ $survei->link }}" target="_blank"
                    class="inline-block rounded-full bg-emerald-700 text-white px-6 py-2 font-semibold hover:bg-emerald-800 transition-colors duration-200">
                    Buka Survei
                </a>
            </div>
        </div>
    </div>
</section>
