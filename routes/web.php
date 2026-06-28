<?php

use App\Http\Controllers\Auth\EcosystemAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/auth/ecosystem', [EcosystemAuthController::class, 'handle'])->name('ecosystem.auth');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $userId = auth()->id();

        $totalProjects  = \App\Models\DesignProject::where('user_id', $userId)->count();
        $recentProjects = \App\Models\DesignProject::where('user_id', $userId)
            ->where('created_at', '>=', now()->subDays(30))->count();
        $totalCanvases  = \App\Models\DesignCanvas::whereHas(
            'project', fn ($q) => $q->where('user_id', $userId)
        )->count();
        $totalAssets    = \App\Models\DesignAsset::where('user_id', $userId)->count();
        $aiGenerations  = \App\Models\AiGenerationLog::where('user_id', $userId)->count();

        $projects = \App\Models\DesignProject::where('user_id', $userId)
            ->withCount(['canvases'])
            ->latest()
            ->get();

        $recentAssets = \App\Models\DesignAsset::where('user_id', $userId)
            ->latest()
            ->limit(8)
            ->get();

        $generationsByProvider = \App\Models\AiGenerationLog::where('user_id', $userId)
            ->selectRaw('provider, count(*) as total')
            ->groupBy('provider')
            ->pluck('total', 'provider');

        return view('dashboard', compact(
            'totalProjects', 'recentProjects', 'totalCanvases',
            'totalAssets', 'aiGenerations', 'projects', 'recentAssets',
            'generationsByProvider'
        ));
    })->name('dashboard');
});
