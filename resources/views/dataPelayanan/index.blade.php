@extends('componen.app')
@section('titel')
    Data Pelayanan
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#toggle").click(function() {
                $("#formExport").toggle();
            });
        });
    </script>
@endsection
@section('isi')
    <div class="h-full sm:ml-64 bg-white pt-24 ">
        <div
            class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
            <h1>Data Pelayanan</h1>
            <div class="grid grid-cols-2 gap-2 md:me-64">
                <a href="/downloadPelayanan"
                    class="bg-red-500 py-1 px-2 xl:text-sm text-[10px]  text-white rounded-md text-center">Export Pdf</a>
                <button id="toggle" class="bg-green-500  py-1 px-2 xl:text-sm text-white rounded-md text-[10px]">Export
                    Excel</button>
            </div>
        </div>
        <div class=" sm:rounded-lg mx-5 pt-14">
            <form id="formExport" action="{{ route('exportDataPelayanan') }}" method="POST" class="my-5 text-emerald-700/90"
                style="display: none">
                @csrf
                <div class="flex items-center space-x-4 justify-end">
                    <div class="relative">
                        <input name="start" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <input name="end" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date end">
                    </div>
                    <div>
                        <button
                            class="bg-emerald-500 text-white py-1 px-3 rounded-md hover:bg-emerald-500/50">Export</button>
                    </div>
                </div>
            </form>
            <div class="w-full rounded-sm shadow-sm border">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-x-auto">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                Divisi
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                Status Layanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    @if (auth()->user()->id_divisi)
                        <tbody>
                            @foreach ($tujuan as $key => $item)
                                <tr class="bg-white border-b hover:bg-gray-50 font-popins capitalize text-gray-900">
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap">
                                        {{ $tujuan->firstItem() + $key }}
                                    </td>
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                                        {{ $item->pengunjung->nama }}
                                    </td>
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                                        {{ $item->divisi->divisi_type }}
                                    </td>
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                                        @if ($item->status == 0)
                                            <span
                                                class="truncate px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Belum
                                                dilihat</span>
                                        @endif

                                        @if ($item->status == 1)
                                            <span
                                                class="truncate px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Dilihat</span>
                                        @endif
                                    </td>
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap">
                                        {{ $item->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>

                                    <td scope="row" class="px-6 py-4   whitespace-nowrap">
                                        <div class="flex ">
                                            <a href="/dataPelayanan/{{ $item->id }}"
                                                class="text-white bg-blue-400 px-4 py-2 rounded-md mr-3">Lihat</a>
                                            <form action="{{ route('dataPelayanan.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-white bg-red-400 px-4 py-2 rounded-md"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus Data Pelayanan ini ?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                    @if (auth()->user()->id_divisi == null)
                        <tbody>
                            @foreach ($tujuan as $key => $item)
                                <tr class="bg-white border-b hover:bg-gray-50 font-popins capitalize text-gray-900">
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap">
                                        {{ $tujuan->firstItem() + $key }}
                                    </td>
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                                        {{ $item->pengunjung->nama }}
                                    </td>
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                                        {{ $item->divisi->divisi_type }}
                                    </td>
                                    <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                                        @if ($item->status == 0)
                                            <span
                                                class="truncate px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Belum
                                                dilihat</span>
                                        @endif
                                        @if ($item->status == 1)
                                            <span
                                                class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Dilihat</span>
                                        @endif
                                    </td>
                                    <td scope="row" class="px-6 py-4 whitespace-nowrap">
                                        {{ Str::ucfirst($item->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY')) }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex ">
                                            <a href="/dataPelayanan/{{ $item->id }}"
                                                class="text-white bg-blue-400 px-4 py-2 rounded-md mr-3">Lihat</a>
                                            <form action="{{ route('dataPelayanan.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-white bg-red-400 px-4 py-2 rounded-md"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus Data Pelayanan ini ?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
        <div class="p-5">{{ $tujuan->links() }}</div>
    </div>




@endsection
