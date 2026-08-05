<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * READ: Menampilkan semua portofolio
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * CREATE (Form): Menampilkan halaman tambah data
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * CREATE (Store): Menyimpan data baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'link'        => 'nullable|url',
        ]);

        // Simpan data
        Project::create($request->all());

        return redirect()->route('projects.index')
                         ->with('success', 'Portofolio berhasil ditambahkan!');
    }

    /**
     * UPDATE (Form): Menampilkan halaman edit data
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * UPDATE (Store): Memperbarui data di database
     */
    public function update(Request $request, Project $project)
    {
        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'link'        => 'nullable|url',
        ]);

        // Update data
        $project->update($request->all());

        return redirect()->route('projects.index')
                         ->with('success', 'Portofolio berhasil diperbarui!');
    }

    /**
     * DELETE: Menghapus data portofolio
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Portofolio berhasil dihapus!');
    }

    /**
     * VISIT: Menambah hitungan views (+1) dan mengarahkan ke link project
     */
    public function visit($id)
    {
        $project = Project::findOrFail($id);

        // Otomatis menambah nilai views +1 di database
        $project->increment('views');

        // Jika project punya link, redirect ke link tersebut
        if ($project->link) {
            return redirect()->away($project->link);
        }

        // Jika tidak ada link, kembali ke halaman portofolio
        return redirect()->back();
    }
}
