<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // عرض قائمة المدونات
    public function index()
    {
        $blogs = Blog::all();
        $settings = HomePageSetting::first();
        return view('admin.blog.index', compact('blogs', 'settings'));
    }

    // عرض نموذج إنشاء مدونة جديدة
    public function create()
    {
        $settings = HomePageSetting::first();
        return view('admin.blog.create', compact('settings'));
    }

    // تخزين مدونة جديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'short_content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'show_comments' => 'required|boolean',
            'category' => 'required|string',
            'seo_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'tags' => 'nullable|string',
            'slug' => 'required|string|unique:blogs,slug'
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->short_content = $request->input('short_content');
        $blog->show_comments = $request->input('show_comments');
        $blog->category = $request->input('category');
        $blog->seo_title = $request->input('seo_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->tags = $request->input('tags');
        $blog->slug = $request->input('slug');

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    // عرض نموذج تعديل مدونة
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $settings = HomePageSetting::first();
        return view('admin.blog.edit', compact('blog', 'settings'));
    }

    // تحديث مدونة موجودة في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'short_content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'show_comments' => 'required|boolean',
            'category' => 'required|string',
            'seo_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'tags' => 'nullable|string',
            'slug' => 'required|string|unique:blogs,slug,' . $id
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->short_content = $request->input('short_content');
        $blog->show_comments = $request->input('show_comments');
        $blog->category = $request->input('category');
        $blog->seo_title = $request->input('seo_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->tags = $request->input('tags');
        $blog->slug = $request->input('slug');

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($blog->image && file_exists(public_path('images/' . $blog->image))) {
                unlink(public_path('images/' . $blog->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    // حذف مدونة من قاعدة البيانات
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        // حذف الصورة المرتبطة إذا كانت موجودة
        if ($blog->image && file_exists(public_path('images/' . $blog->image))) {
            unlink(public_path('images/' . $blog->image));
        }
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

    // عرض المدونات على الواجهة الأمامية
    public function frontIndex()
    {
        $blogs = Blog::all();
        $settings = HomePageSetting::first();
        return view('front.blog', compact('blogs', 'settings'));
    }

    // عرض تفاصيل مدونة معينة على الواجهة الأمامية
    public function frontShow($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $settings = HomePageSetting::first();
        return view('front.blog.show', compact('blog', 'settings'));
    }
}
