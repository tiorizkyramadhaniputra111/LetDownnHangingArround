<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    protected $jsonPath = 'cms/slides.json';

    protected function getSlides()
    {
        $content = Storage::get($this->jsonPath);
        return json_decode($content, true) ?? [];
    }

    protected function saveSlides($slides)
    {
        Storage::put($this->jsonPath, json_encode($slides, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function index()
    {
        $slides = $this->getSlides();
        return view('admin.pages.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.pages.slides.form', ['slide' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slides = $this->getSlides();
        
        // Generate new ID
        $maxId = 0;
        foreach ($slides as $slide) {
            if ($slide['id'] > $maxId) {
                $maxId = $slide['id'];
            }
        }
        
        $newSlide = [
            'id' => $maxId + 1,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->old_image ?? 'images/placeholder.jpg',
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'slide_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slides'), $filename);
            $newSlide['image'] = 'uploads/slides/' . $filename;
        }

        $slides[] = $newSlide;
        $this->saveSlides($slides);

        return redirect()->route('admin.slides.index')->with('success', 'Slide berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $slides = $this->getSlides();
        $slide = collect($slides)->firstWhere('id', (int)$id);
        
        if (!$slide) {
            return redirect()->route('admin.slides.index')->with('error', 'Slide tidak ditemukan!');
        }

        return view('admin.pages.slides.form', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slides = $this->getSlides();
        
        foreach ($slides as $key => $slide) {
            if ($slide['id'] == (int)$id) {
                $slides[$key]['title'] = $request->title;
                $slides[$key]['description'] = $request->description;

                // Handle image upload
                if ($request->hasFile('image')) {
                    // Delete old image if exists and is in uploads folder
                    if (isset($slide['image']) && str_starts_with($slide['image'], 'uploads/')) {
                        $oldPath = public_path($slide['image']);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    
                    $file = $request->file('image');
                    $filename = 'slide_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/slides'), $filename);
                    $slides[$key]['image'] = 'uploads/slides/' . $filename;
                }
                break;
            }
        }

        $this->saveSlides($slides);

        return redirect()->route('admin.slides.index')->with('success', 'Slide berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $slides = $this->getSlides();
        
        foreach ($slides as $key => $slide) {
            if ($slide['id'] == (int)$id) {
                // Delete image if in uploads folder
                if (isset($slide['image']) && str_starts_with($slide['image'], 'uploads/')) {
                    $path = public_path($slide['image']);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                unset($slides[$key]);
                break;
            }
        }

        $slides = array_values($slides); // Re-index array
        $this->saveSlides($slides);

        return redirect()->route('admin.slides.index')->with('success', 'Slide berhasil dihapus!');
    }
}
