<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengaturan Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap table-fixed">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4 w-[80px]">No</td>
                                <td class="border px-6 py-4">Judul</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell">Tanggal</td>
                                <td class="border px-6 py-4 lg:w-[100px] hidden lg:table-cell">Status</td>
                                <td class="border px-6 py-4 lg:w-[250px] w-[100px]">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-6 py-4 text-center">1</td>
                                <td class="border px-6 py-4">
                                    Selamat Datang di Tutorial Laravel
                                    <div class="block lg:hidden text-sm text-gray-500">
                                        draft | Kamis, 29 Agustus 2024
                                    </div>
                                </td>
                                <td class="border px-6 py-4 text-center text-gray-500 text-sm hidden lg:table-cell">
                                    Kamis, 29 Agustus 2024</td>
                                <td class="border px-6 py-4 text-center text-sm hidden lg:table-cell">draft</td>
                                <td class="border px-6 py-4 text-center">
                                    <a href='' class="text-blue-600 hover:text-blue-400 px-2">edit</a>
                                    <a href='' class="text-blue-600 hover:text-blue-400 px-2">lihat</a>
                                    <button type=' submit' class='text-red-600 hover:text-red-400 px-2'>
                                        hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
