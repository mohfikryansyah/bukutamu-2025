@extends('componen.app')
@section('isi')
    <div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 font-popins">
        <div
            class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
            <h1>Tambah Link Survei</h1>
        </div>
        <div class="mt-20 w-[90%] mx-auto">
            <div class="max-w-sm w-full rounded-lg shadow-md border p-3  mx-auto">
                <h1 class="py-2 text-center text-xl font-semibold text-emerald-400 border-b-2 mb-2">Form Tambah Link Survei
                </h1>
                <div class="px-3">
                    <form class="mt-8 space-y-5" method="POST" action="/survei">
                        @csrf
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="judul" id="judul"
                                class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " required value="{{ old('judul') }}" />
                            <label for="judul"
                                class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Judul</label>
                            @error('judul')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="deskripsi" id="deskripsi"
                                class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " required value="{{ old('deskripsi') }}" />
                            <label for="deskripsi"
                                class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deskripsi
                                Singkat</label>
                            @error('deskripsi')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="link" id="link"
                                class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " required value="{{ old('link') }}" />
                            <label for="link"
                                class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Link
                                Survei</label>
                            @error('link')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-green-400 p-2 text-white rounded-md hover:bg-emerald-600 hover:ring-2 hover:ring-emerald-700">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
