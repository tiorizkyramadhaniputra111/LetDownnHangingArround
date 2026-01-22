<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagementController extends Controller
{
    protected $jsonPath = 'cms/management.json';

    protected function getManagement()
    {
        $content = Storage::get($this->jsonPath);
        return json_decode($content, true) ?? [];
    }

    protected function saveManagement($data)
    {
        Storage::put($this->jsonPath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function index(Request $request)
    {
        $management = $this->getManagement();
        $category = $request->get('category', 'direksi');
        $categories = array_keys($management);
        
        $currentCategory = $management[$category] ?? reset($management);
        $members = $currentCategory['members'] ?? [];
        $categoryLabel = $currentCategory['label'] ?? ucfirst($category);
        
        return view('admin.pages.management.index', compact('management', 'members', 'category', 'categories', 'categoryLabel'));
    }

    public function create(Request $request)
    {
        $category = $request->get('category', 'direksi');
        return view('admin.pages.management.form', [
            'member' => null,
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $management = $this->getManagement();
        $category = $request->category;
        
        // Generate new ID
        $maxId = 0;
        foreach ($management as $cat) {
            foreach ($cat['members'] as $member) {
                if ($member['id'] > $maxId) {
                    $maxId = $member['id'];
                }
            }
        }
        
        $newMember = [
            'id' => $maxId + 1,
            'name' => $request->name,
            'role' => strtoupper($request->role),
            'bio' => $request->bio,
            'image' => 'images/UserIcon.jpg',
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'member_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/management'), $filename);
            $newMember['image'] = 'uploads/management/' . $filename;
        }

        $management[$category]['members'][] = $newMember;
        $this->saveManagement($management);

        return redirect()->route('admin.management.index', ['category' => $category])
            ->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id, Request $request)
    {
        $management = $this->getManagement();
        $category = $request->get('category', 'direksi');
        
        $member = null;
        foreach ($management as $cat => $data) {
            foreach ($data['members'] as $m) {
                if ($m['id'] == (int)$id) {
                    $member = $m;
                    $category = $cat;
                    break 2;
                }
            }
        }
        
        if (!$member) {
            return redirect()->route('admin.management.index')->with('error', 'Anggota tidak ditemukan!');
        }

        return view('admin.pages.management.form', compact('member', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $management = $this->getManagement();
        $category = $request->category;
        
        foreach ($management as $catKey => &$catData) {
            foreach ($catData['members'] as $key => &$member) {
                if ($member['id'] == (int)$id) {
                    $member['name'] = $request->name;
                    $member['role'] = strtoupper($request->role);
                    $member['bio'] = $request->bio;

                    // Handle image upload
                    if ($request->hasFile('image')) {
                        if (isset($member['image']) && str_starts_with($member['image'], 'uploads/')) {
                            $oldPath = public_path($member['image']);
                            if (file_exists($oldPath)) {
                                unlink($oldPath);
                            }
                        }
                        
                        $file = $request->file('image');
                        $filename = 'member_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/management'), $filename);
                        $member['image'] = 'uploads/management/' . $filename;
                    }

                    // Move to different category if changed
                    if ($catKey !== $category) {
                        unset($catData['members'][$key]);
                        $catData['members'] = array_values($catData['members']);
                        $management[$category]['members'][] = $member;
                    }
                    break 2;
                }
            }
        }

        $this->saveManagement($management);

        return redirect()->route('admin.management.index', ['category' => $category])
            ->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy($id, Request $request)
    {
        $management = $this->getManagement();
        $category = $request->get('category', 'direksi');
        
        foreach ($management as $catKey => &$catData) {
            foreach ($catData['members'] as $key => $member) {
                if ($member['id'] == (int)$id) {
                    if (isset($member['image']) && str_starts_with($member['image'], 'uploads/')) {
                        $path = public_path($member['image']);
                        if (file_exists($path)) {
                            unlink($path);
                        }
                    }
                    unset($catData['members'][$key]);
                    $catData['members'] = array_values($catData['members']);
                    $category = $catKey;
                    break 2;
                }
            }
        }

        $this->saveManagement($management);

        return redirect()->route('admin.management.index', ['category' => $category])
            ->with('success', 'Anggota berhasil dihapus!');
    }
}
