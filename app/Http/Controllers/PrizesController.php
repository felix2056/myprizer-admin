<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrizesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $prizes = Prize::orderBy('created_at', 'desc')->paginate(15);

        return view('prizes.index', compact('prizes'));
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|string',
                'category_id' => 'required|integer',
                'ticket_price' => 'required|numeric|between:0,99.99',
                'ticket_max' => 'required|integer',
                'ticket_max_per_user' => 'required|integer',
                'description' => 'required|string',
                'image' => 'required|image',
            ]);

            $category = Category::findOrFail($request->category_id);
            if (!$category) {
                return redirect()->route('prizes.create')->with('error', 'Category not found');
            }
    
            $image = null;
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                
                // save to storage/app/public/prizes as the new $filename and return the path
                $image = $file->storeAs('prizes', $filename, 'public');
                $image = config('app.url') . Storage::url($image);
            }
            
            $prize = Prize::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'ticket_price' => $request->ticket_price,
                'ticket_max' => $request->ticket_max,
                'ticket_max_per_user' => $request->ticket_max_per_user,
                'description' => $request->description,
                'image' => $image,
            ]);
    
            return redirect()->route('prizes.index')->with('success', 'Prize created successfully'); 
        }

        return view('prizes.create');
    }

    public function edit(Request $request, $slug)
    {
        if($request->isMethod('put')) {
            $request->validate([
                'title' => 'required|string',
                'category_id' => 'required|integer',
                'ticket_price' => 'required|numeric|between:0,99.99',
                'ticket_max' => 'required|integer',
                'ticket_max_per_user' => 'required|integer',
                'description' => 'required|string',
                'image' => 'nullable|image',
            ]);

            $category = Category::findOrFail($request->category_id);
            if (!$category) {
                return redirect()->route('prizes.create')->with('error', 'Category not found');
            }

            $prize = Prize::where('slug', $slug)->firstOrFail();
            if (!$prize) {
                return redirect()->route('prizes.index')->with('error', 'Prize not found');
            }
    
            $image = $prize->image;
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();

                // delete old image
                Storage::disk('public')->delete(str_replace(config('app.url') . '/storage/', '', $image));
                
                // save to storage/app/public/prizes as the new $filename and return the path
                $image = $file->storeAs('prizes', $filename, 'public');
                $image = config('app.url') . Storage::url($image);
            }
    
            $prize->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'ticket_price' => $request->ticket_price,
                'ticket_max' => $request->ticket_max,
                'ticket_max_per_user' => $request->ticket_max_per_user,
                'description' => $request->description,
                'image' => $image,
            ]);
    
            return redirect()->route('prizes.index')->with('success', 'Prize updated successfully'); 
        }

        $prize = Prize::where('slug', $slug)->firstOrFail();
        return view('prizes.edit', compact('prize'));
    }

    public function destroy($slug)
    {
        $prize = Prize::where('slug', $slug)->firstOrFail();

        $prize->delete();

        return redirect()->route('prizes.index')->with('success', 'Prize deleted successfully');
    }
}
