<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\MetaSettings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::with('category')->get();

        return view('admin.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::get();

        $blog = Blog::get();

        return view('admin.blog.create', compact('data', 'blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:blogs',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'page' => 'required',
            'date' => 'required',
            // 'relatedBogs' => 'required',
            'content' => 'required',
            'isActive' => 'required',
        ]);
        $blog = new Blog;
        $blog->name = $data['name'];
        $blog->image = $data['image'];
        $blog->content = $data['content'];
        $blog->category_id = implode(",", $data['category_id']??[]);
        $blog->page = $data['page'];
        $blog->date = $data['date'];
        $blog->relatedBogs = implode(",", $data['relatedBogs']?? []);
        $blog->isActive = $data['isActive'];

        if ($request->hasFile('image')) {
            $path = public_path('upload/images/blog');
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $blog->image = $imageName;
        }
        
        $blog->save();

        $metaDetails = json_encode([
            'meta_title' => $request->meta_title ?? null,
            'meta_keywords' => $request->meta_keywords ?? null,
            'meta_description' => $request->meta_description ?? null,
        ]);

        MetaSettings::updateOrCreate(
            [
                'refferance_id' => $blog->id,
                'page' => $data['page']
            ],
            [
                'meta_details' => $metaDetails
            ]
        );


        session()->flash('success', 'Data Create successfully.');

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $data = $blog;
        $category = Category::get();
        $blog = Blog::whereNotIn('id', [$blog->id])->get();
        $metaData = MetaSettings::where('refferance_id', $data->id)->where('page', $data->page)->first();

        return view('admin.blog.edit', compact('data','category', 'blog', 'metaData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'name' => ['required','string',Rule::unique('blogs')->ignore($blog->id),],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'page' => 'required',
            'date' => 'required',
            'content' => 'required',
            // 'relatedBogs' => 'required',
            'isActive' => 'required',
        ]);

        $blog = Blog::findOrFail($blog->id);
        $blog->name = $data['name'];
        $blog->content = $data['content'];
        $blog->category_id = implode(",", $data['category_id']??[]);
        $blog->page = $data['page'];
        $blog->date = $data['date'];
        $blog->relatedBogs = implode(",", $data['relatedBogs']?? []);
        $blog->isActive = $data['isActive'];

        if ($request->hasFile('image')) {
            $path = public_path('upload/images/blog');
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $blog->image = $imageName;
        }

        $blog->save();

        $metaDetails = json_encode([
            'meta_title' => $request->meta_title ?? null,
            'meta_keywords' => $request->meta_keywords ?? null,
            'meta_description' => $request->meta_description ?? null,
        ]);

        MetaSettings::updateOrCreate(
            [
                'refferance_id' => $blog->id,
                'page' => $data['page']
            ],
            [
                'meta_details' => $metaDetails
            ]
        );
    

        session()->flash('success', 'Data Create successfully.');

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        session()->flash('success', 'Date deleted successfully.');

        return redirect()->route('blog.index');
    }

    public function ckUploadimage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $request->file('upload')->move(public_path('blog'), $fileName);
      
            $url = asset('blog/' . $fileName);
  
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
}
