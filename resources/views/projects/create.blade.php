@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-card border border-border rounded-card p-6 sm:p-10 shadow-card">

        <div class="mb-8 border-b border-border pb-5">
            <h1 class="text-2xl font-bold text-text-heading flex items-center gap-3">
                <i class="bi bi-plus-circle-fill text-primary"></i> Tambah Project Baru
            </h1>
            <p class="text-text-secondary text-sm mt-1">Isi detail project portofolio yang ingin kamu tampilkan.</p>
        </div>

        <form action="{{ route('projects.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Input Judul -->
            <div>
                <label class="block text-text-heading text-sm font-medium mb-2">Judul Project</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Aplikasi POS Kasir Toko"
                    class="custom-input w-full rounded-input px-4 py-3 text-sm placeholder-text-disabled">
                @error('title') <span class="text-status-danger text-xs mt-1.5 block">{{ $message }}</span> @enderror
            </div>

            <!-- Input Deskripsi -->
            <div>
                <label class="block text-text-heading text-sm font-medium mb-2">Deskripsi Project</label>
                <textarea name="description" rows="4" placeholder="Jelaskan fitur utama dan arsitektur teknis..."
                    class="custom-input w-full rounded-input px-4 py-3 text-sm placeholder-text-disabled leading-relaxed">{{ old('description') }}</textarea>
                @error('description') <span class="text-status-danger text-xs mt-1.5 block">{{ $message }}</span> @enderror
            </div>

            <!-- Input Link -->
            <div>
                <label class="block text-text-heading text-sm font-medium mb-2">Link Live Demo / Github (Opsional)</label>
                <input type="url" name="link" value="{{ old('link') }}" placeholder="https://github.com/username/project"
                    class="custom-input w-full rounded-input px-4 py-3 text-sm placeholder-text-disabled">
                @error('link') <span class="text-status-danger text-xs mt-1.5 block">{{ $message }}</span> @enderror
            </div>

            <!-- Action Controls -->
            <div class="flex justify-between items-center pt-4 border-t border-border">
                <a href="{{ route('projects.index') }}" class="text-text-secondary hover:text-text-heading text-sm font-medium transition-colors">
                    Batal
                </a>
                <button type="submit" class="btn-animate bg-primary hover:bg-primary-hover text-white font-semibold px-6 py-3 rounded-btn shadow-lg shadow-primary/20 transition-all">
                    Simpan Project
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
