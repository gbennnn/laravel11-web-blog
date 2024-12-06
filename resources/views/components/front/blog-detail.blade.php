<x-front.layout :showHeader="false">
    {{-- <x-slot name="title">{{ $data->title }}</x-slot>
    <x-slot name="description">{{ $data->description }}</x-slot>
    <x-slot name="pageBackground">{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . $data->thumbnail) }}</x-slot>
    <x-slot name="pageHeaderLink">{{ route('blog-detail', ['slug' => $data->slug]) }}</x-slot> --}}

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . $data->thumbnail) }}" alt="{{ $data->title }}"
                    class="img-fluid mt-5">
                <h1 class="mt-4 mb-4">{{ $data->title }}</h1>
                <div class="mb-5">
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    </div>
</x-front.layout>
