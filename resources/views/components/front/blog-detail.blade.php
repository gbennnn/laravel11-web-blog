<x-front.layout :showHeader="false">
    {{-- <x-slot name="title">{{ $data->title }}</x-slot>
    <x-slot name="description">{{ $data->description }}</x-slot>
    <x-slot name="pageBackground">{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . $data->thumbnail) }}</x-slot>
    <x-slot name="pageHeaderLink">{{ route('blog-detail', ['slug' => $data->slug]) }}</x-slot> --}}

    <x-slot name="pageTitle">{{ $data->title }}</x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                {{-- validasi gambar --}}
                @if ($data)
                    <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . $data->thumbnail) }}"
                        alt="{{ $data->title }}" class="img-fluid">
                @else
                    <p>Data tidak ditemukan atau belum di publish.</p>
                @endif

                {{-- validasi judul --}}
                @if ($data)
                    <h1 class="mt-4 mb-4">{{ $data->title }}</h1>
                    <p>
                        <span><i>Created By</i> <b>{{ $data->user->name }}</b> </span> <i>On</i>
                        {{ $data->created_at->isoFormat('dddd, D MMMM Y') }}
                    </p>
                @else
                    {{-- <p>Data tidak ditemukan.</p> --}}
                @endif

                <div class="mb-5">
                    {{-- validasi konten --}}
                    @if ($data)
                        {!! $data->content !!}
                    @else
                        {{-- <p>Data tidak ditemukan.</p> --}}
                    @endif
                </div>
            </div>
        </div>

        {{-- Paggination --}}
        <div class="d-flex justify-content-between mb-4 mt-4">
            <div>
                @if ($pagination['next'])
                    <a href="{{ route('blog-detail', ['slug' => $pagination['next']->slug]) }}">&larr;{{ $pagination['next']->title }}
                    </a>
                @else
                    <span></span>
                @endif
            </div>
            <div>
                @if ($pagination['prev'])
                    <a href="{{ route('blog-detail', ['slug' => $pagination['prev']->slug]) }}">{{ $pagination['prev']->title }}
                        &rarr;</a>
                @else
                    <span></span>
                @endif
            </div>
        </div>
    </div>


</x-front.layout>
