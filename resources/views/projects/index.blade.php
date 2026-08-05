@extends('layouts.app')

@section('content')

<!-- ================= HEADER SECTION ================= -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-extrabold text-text-heading tracking-tight mb-1">Daftar Portofolio</h1>
        <p class="text-text-secondary">Kelola semua project yang pernah dibuat.</p>
    </div>

    <!-- Tombol Tambah Project -->
    <a href="{{ route('projects.create') }}" class="btn-animate inline-flex items-center gap-2.5 bg-primary hover:bg-primary-hover text-white font-semibold px-5 py-3 rounded-btn shadow-lg shadow-primary/20 transition-all">
        <i class="bi bi-plus-circle-fill text-lg"></i>
        <span>Tambah Project</span>
    </a>
</div>

<!-- ================= STATISTIK DASHBOARD ================= -->
<section class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10">

    <!-- Total Project -->
    <div class="bg-card border border-border p-5 rounded-card shadow-card flex items-center gap-4">
        <div class="w-12 h-12 rounded-btn bg-surface border border-border flex items-center justify-center text-primary text-xl">
            <i class="bi bi-folder-fill"></i>
        </div>
        <div>
            <span class="text-text-disabled text-xs font-bold uppercase tracking-wider block">Total</span>
            <span class="text-text-heading text-lg font-bold">{{ $projects->count() }} Project</span>
        </div>
    </div>

    <!-- Website -->
    <div class="bg-card border border-border p-5 rounded-card shadow-card flex items-center gap-4">
        <div class="w-12 h-12 rounded-btn bg-surface border border-border flex items-center justify-center text-status-info text-xl">
            <i class="bi bi-laptop"></i>
        </div>
        <div>
            <span class="text-text-disabled text-xs font-bold uppercase tracking-wider block">Website</span>
            <span class="text-text-heading text-lg font-bold">{{ $projects->count() }}</span>
        </div>
    </div>

    <!-- Mobile -->
    <div class="bg-card border border-border p-5 rounded-card shadow-card flex items-center gap-4">
        <div class="w-12 h-12 rounded-btn bg-surface border border-border flex items-center justify-center text-status-warning text-xl">
            <i class="bi bi-phone"></i>
        </div>
        <div>
            <span class="text-text-disabled text-xs font-bold uppercase tracking-wider block">Mobile</span>
            <span class="text-text-heading text-lg font-bold">0</span>
        </div>
    </div>

    <!-- Total Views (Dinamis dari penjumlahan seluruh views project) -->
    <div class="bg-card border border-border p-5 rounded-card shadow-card flex items-center gap-4">
        <div class="w-12 h-12 rounded-btn bg-surface border border-border flex items-center justify-center text-primary-light text-xl">
            <i class="bi bi-eye-fill"></i>
        </div>
        <div>
            <span class="text-text-disabled text-xs font-bold uppercase tracking-wider block">Views</span>
            <span class="text-text-heading text-lg font-bold">{{ $projects->sum('views') }}</span>
        </div>
    </div>

</section>

<hr class="border-border my-8">

<!-- ================= GRID PORTOFOLIO ================= -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($projects as $project)
        <article class="hover-card bg-card border border-border rounded-card shadow-card overflow-hidden flex flex-col justify-between">

            <div>
                <!-- Thumbnail Placeholder -->
                <div class="h-44 bg-surface border-b border-border flex items-center justify-center text-text-disabled relative">
                    <i class="bi bi-globe2 text-4xl opacity-50"></i>
                    <span class="absolute top-3 right-3 bg-bg/80 backdrop-blur border border-border text-text-secondary text-xs px-2.5 py-1 rounded-full flex items-center gap-1">
                        <i class="bi bi-lightning-fill text-status-warning"></i> Featured
                    </span>
                </div>

                <div class="p-6">
                    <!-- Badges Kategori -->
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-primary/10 text-primary border border-primary/20 text-xs px-2.5 py-0.5 rounded-full font-medium">
                            Laravel
                        </span>
                        <span class="bg-status-info/10 text-status-info border border-status-info/20 text-xs px-2.5 py-0.5 rounded-full font-medium">
                            Fullstack
                        </span>
                    </div>

                    <!-- Judul Proyek -->
                    <h2 class="text-text-heading text-lg font-bold mb-2 line-clamp-1">
                        {{ $project->title }}
                    </h2>

                    <!-- Deskripsi -->
                    <p class="text-text-secondary text-sm line-clamp-2 mb-4 leading-relaxed">
                        {{ $project->description }}
                    </p>

                    <!-- Tech Stack Icons -->
                    <div class="flex items-center gap-3.5 text-text-secondary text-lg mb-5">
                        <i class="fa-brands fa-laravel hover:text-red-500 transition-colors" title="Laravel"></i>
                        <i class="fa-brands fa-php hover:text-indigo-400 transition-colors" title="PHP"></i>
                        <i class="fa-brands fa-js hover:text-yellow-400 transition-colors" title="JavaScript"></i>
                        <i class="fa-database fa-solid hover:text-blue-400 transition-colors text-base" title="MySQL"></i>
                    </div>

                    <!-- Metadata: Jumlah Views per Proyek -->
                    <div class="flex items-center justify-between text-text-disabled text-xs border-t border-border pt-4">
                        <span class="flex items-center gap-1.5">
                            <i class="bi bi-eye-fill text-primary"></i> {{ $project->views }} Views
                        </span>
                        <span class="flex items-center gap-1.5">
                            <i class="bi bi-calendar-event"></i> {{ $project->created_at->format('Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="p-6 pt-0 flex gap-2">
                @if($project->link)
                    <!-- Tombol Lihat mengarah ke Route Visit -->
                    <a href="{{ route('projects.visit', $project->id) }}" target="_blank" class="btn-animate flex-1 text-center bg-transparent border border-primary text-primary hover:bg-primary hover:text-white font-semibold py-2.5 rounded-btn text-sm transition-all">
                        <i class="bi bi-eye-fill me-1"></i> Lihat
                    </a>
                @else
                    <button class="flex-1 text-center bg-surface border border-border text-text-disabled py-2.5 rounded-btn text-sm cursor-not-allowed" disabled>
                        <i class="bi bi-eye-slash me-1"></i> Lihat
                    </button>
                @endif

                <a href="{{ route('projects.edit', $project->id) }}" class="btn-animate flex-1 text-center bg-surface border border-border text-status-warning hover:bg-status-warning hover:text-black font-semibold py-2.5 rounded-btn text-sm transition-all">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>

                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus project ini?')" class="flex-none">
                    @csrf
                    @method('DELETE')
                    <button type="submit" aria-label="Hapus Project" class="btn-animate bg-surface border border-border text-status-danger hover:bg-status-danger hover:text-white px-3.5 py-2.5 rounded-btn text-sm transition-all">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </div>

        </article>
    @empty
        <!-- ================= EMPTY STATE ================= -->
        <div class="col-span-full bg-card border border-border rounded-card p-12 text-center my-6">
            <div class="w-20 h-20 bg-surface border border-border rounded-full flex items-center justify-center mx-auto mb-4 text-primary text-4xl">
                <i class="bi bi-folder2-open"></i>
            </div>
            <h3 class="text-text-heading text-xl font-bold mb-2">Belum ada project</h3>
            <p class="text-text-secondary text-sm max-w-md mx-auto mb-6 leading-relaxed">
                Yuk tambahkan project pertamamu agar portofoliomu mulai terlihat profesional.
            </p>
            <a href="{{ route('projects.create') }}" class="btn-animate inline-flex items-center gap-2 bg-primary hover:bg-primary-hover text-white font-semibold px-6 py-3 rounded-btn shadow-lg shadow-primary/20 transition-all">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Tambah Project</span>
            </a>
        </div>
    @endforelse
</div>

@endsection
