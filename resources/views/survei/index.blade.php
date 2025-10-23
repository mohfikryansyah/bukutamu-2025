@extends('componen.app')
@section('titel')
    Data Survei
@endsection
@section('isi')
    <div class="sm:ml-64 py-5 pt-24 ">
        <div
            class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
            <h1>Data Survei</h1>
            <div class="grid grid-cols-2 gap-2 md:me-64">
                <a href="/survei/create"
                    class="bg-red-500 py-1 px-2 col-span-2 xl:text-sm text-[10px]  text-white rounded-md text-center">Buat
                    Data</a>
            </div>
        </div>
        <div class=" sm:rounded-lg mx-5 pt-14">

            <div class="w-full rounded-sm shadow-sm border">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-x-auto mx-auto">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Survei
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Link Survei
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survei as $key => $item)
                            <tr class="bg-white border-b hover:bg-gray-50 font-popins text-gray-900 capitalize">
                                <td scope="row" class="px-6 py-4 whitespace-nowrap">
                                    {{ $survei->firstItem() + $key }}
                                </td>
                                <td scope="row" class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->judul }}
                                </td>
                                <td scope="row" class="px-6 py-4 whitespace-nowrap" title="{{ $item->deskripsi }}">
                                    {{ Str::limit($item->deskripsi, 20, '...') }}
                                </td>
                                <td scope="row" class="px-6 py-4   whitespace-nowrap">
                                    <a href="{{ $item->link }}">{{ $item->link }}</a>
                                </td>
                                <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </td>
                                <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                    <form action="{{ route('survei.destroy', ['survey' => $item]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-white bg-red-400 px-4 py-2 rounded-md"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus Data Survei ini ?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="p-5">{{ $survei->links() }}</div>
    </div>
@endsection
