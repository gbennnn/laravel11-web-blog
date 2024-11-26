<?php
$title = 'Saya-Judul dari variable';
?>

<x-halaman-layout :title="$title">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam temporibus harum quam similique repellendus esse
        eius modi. Repellat, iste nostrum.</p>
    <x-slot name="tanggal">17 Agustus 2045</x-slot>
    <x-slot name="penulis">Jhon Doe</x-slot>
</x-halaman-layout>
{{-- <x-halaman-baru-layout></x-halaman-baru-layout> --}}
