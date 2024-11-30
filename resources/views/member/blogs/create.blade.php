<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Tulisan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Tambah Tulisan
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan penambahan data
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.blogs.create', ['post' => $data->id]) }}"
                            class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf

                            {{-- Kolom Tambah title --}}
                            <div>
                                <x-input-label for="title" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                    value="{{ old('title') }}" />

                            </div>

                            {{-- Kolom Tambah deskripsi --}}
                            <div>
                                <x-input-label for="description" value="Description" />
                                <x-text-input id="description" name="description" type="text"
                                    class="mt-1 block w-full" value="{{ old('description') }}" />

                            </div>

                            {{-- Kolom Tambah thumbnail --}}
                            <div>
                                <x-input-label for="file_input" value="Thumbnail" />

                                <input type="file" id="file_input" name="thumbnail"
                                    class="w-full border border-gray-300 rounded-md" />
                            </div>


                            {{-- Kolom Tambah konten dengan text Tambahor from trix --}}
                            <div>
                                <x-textarea-trix value="{!! old('content') !!}" id="x"
                                    name="content"></x-textarea-trix>
                            </div>

                            {{-- Kolom status --}}
                            <div>
                                <x-select name="status">
                                    <option value="draft"
                                        {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan sebagai
                                        draft
                                    </option>
                                    <option value="publish"
                                        {{ old('status') == 'publish' ? 'selected' : '' }}>Publish
                                    </option>
                                </x-select>
                            </div>

                            {{-- Button --}}
                            <div class="flex items-center gap-4">
                                <a href="{{ route('member.blogs.index') }}">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                                <x-primary-button>Simpan</x-primary-button>
                            </div>

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Box untuk Preview Thumbnail Image -->
    <div id="imageModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <img id="modalImage" src="" alt="Preview" class="w-full">
            </div>
        </div>
    </div>

    {{-- JS untuk menghandle modal box thumbnail --}}
    <script>
        document.getElementById('thumbnail').addEventListener('click', function() {
            var modal = document.getElementById('imageModal');
            var modalImage = document.getElementById('modalImage');
            modalImage.src = this.src;
            modal.classList.remove('hidden');
        });

        document.getElementById('imageModal').addEventListener('click', function() {
            this.classList.add('hidden');
        });
    </script>
</x-app-layout>
