<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\ContactMessage;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Hapus middleware auth
    }

    public function index()
    {
        // Data Portfolio
        $totalPortfolio = Portfolio::count();
        $recentPortfolio = Portfolio::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $latestPortfolios = Portfolio::latest()->take(5)->get();

        // Data Pesan
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('status', 'unread')->count();
        $latestMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPortfolio',
            'recentPortfolio',
            'latestPortfolios',
            'totalMessages',
            'unreadMessages',
            'latestMessages'
        ));
    }
} 