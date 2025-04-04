<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\ContactMessage;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function portfolio()
    {
        $portfolios = Portfolio::where('status', true)->latest()->get();
        return view('pages.portfolio', compact('portfolios'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        try {
            // Simpan pesan ke database
            $contactMessage = ContactMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'status' => 'unread'
            ]);

            // Kirim email notifikasi
            Mail::to('triteguhjaya@gmail.com')->send(new ContactMail([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ]));

            return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi.')
                ->withInput();
        }
    }
} 