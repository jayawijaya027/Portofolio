<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $totalPortfolio = Portfolio::count();
        return view('admin.dashboard', compact('totalPortfolio'));
    }

    // Portfolio Management
    public function portfolio()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function createPortfolio()
    {
        return view('admin.portfolio.create');
    }

    public function storePortfolio(Request $request)
    {
        try {
            Log::info('Memulai proses upload portfolio');
            
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'programming_language' => 'required|string',
                'database' => 'required|string',
                'frontend' => 'required|string',
                'backend' => 'required|string',
                'additional_features' => 'nullable|string',
                'github_url' => 'nullable|url',
                'demo_url' => 'nullable|url',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            Log::info('Validasi berhasil');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                Log::info('File gambar diterima: ' . $image->getClientOriginalName());
                
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                Log::info('Nama file baru: ' . $imageName);
                
                // Cek apakah folder exists
                if (!Storage::exists('public/portfolio')) {
                    Storage::makeDirectory('public/portfolio');
                    Log::info('Folder portfolio dibuat');
                }
                
                // Upload file
                $path = $image->storeAs('public/portfolio', $imageName);
                Log::info('File disimpan di: ' . $path);
                
                if ($path) {
                    Portfolio::create([
                        'title' => $request->title,
                        'description' => $request->description,
                        'programming_language' => $request->programming_language,
                        'database' => $request->database,
                        'frontend' => $request->frontend,
                        'backend' => $request->backend,
                        'additional_features' => $request->additional_features,
                        'github_url' => $request->github_url,
                        'demo_url' => $request->demo_url,
                        'image' => $imageName,
                        'image_path' => $path
                    ]);
                    
                    Log::info('Portfolio berhasil disimpan ke database');
                    return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil ditambahkan');
                } else {
                    Log::error('Gagal menyimpan file');
                    return back()->with('error', 'Gagal mengupload gambar');
                }
            } else {
                Log::error('Tidak ada file gambar yang diupload');
                return back()->with('error', 'Tidak ada file gambar yang diupload');
            }
        } catch (\Exception $e) {
            Log::error('Error saat upload portfolio: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengupload portfolio: ' . $e->getMessage());
        }
    }

    public function editPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function updatePortfolio(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'programming_language' => 'required|string',
            'database' => 'required|string',
            'frontend' => 'required|string',
            'backend' => 'required|string',
            'additional_features' => 'nullable|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/portfolio/' . $portfolio->image);
            
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/portfolio', $imageName);
            
            $portfolio->image = $imageName;
        }

        $portfolio->update([
            'title' => $request->title,
            'description' => $request->description,
            'programming_language' => $request->programming_language,
            'database' => $request->database,
            'frontend' => $request->frontend,
            'backend' => $request->backend,
            'additional_features' => $request->additional_features,
            'github_url' => $request->github_url,
            'demo_url' => $request->demo_url
        ]);

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil diperbarui');
    }

    public function deletePortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        Storage::delete('public/portfolio/' . $portfolio->image);
        $portfolio->delete();
        
        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil dihapus');
    }

    // Image Management
    public function images()
    {
        $images = Storage::files('public/portfolio');
        return view('admin.images.index', compact('images'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/portfolio', $imageName);

        return redirect()->route('admin.images')->with('success', 'Gambar berhasil diupload');
    }

    public function deleteImage($filename)
    {
        Storage::delete('public/portfolio/' . $filename);
        return redirect()->route('admin.images')->with('success', 'Gambar berhasil dihapus');
    }

    // Message Management
    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function viewMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['status' => 'read']);
        return view('admin.messages.view', compact('message'));
    }

    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['status' => 'read']);
        return redirect()->back()->with('success', 'Pesan ditandai sebagai telah dibaca');
    }

    public function deleteMessage($id)
    {
        try {
            $message = ContactMessage::findOrFail($id);
            $message->delete();
            return redirect()->route('admin.dashboard')->with('success', 'Pesan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pesan');
        }
    }

    public function replyMessage(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Kirim email balasan
        // Mail::to($message->email)->send(new ContactReply($message));
        
        $message->update(['status' => 'replied']);
        return redirect()->route('admin.messages')->with('success', 'Balasan berhasil dikirim');
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
} 