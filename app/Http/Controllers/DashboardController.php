<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        $user = auth()->user();
        $candidate = $user->candidate()->with('position.region')->first();

        $summary = Candidate::query()
            ->selectRaw('hr_status, COUNT(*) as total')
            ->groupBy('hr_status')
            ->pluck('total', 'hr_status');

        $latestCandidates = Candidate::query()
            ->with(['user:id,name,email', 'position:id,name'])
            ->latest()
            ->limit(5)
            ->get(['id', 'user_id', 'position_id', 'full_name', 'hr_status', 'created_at']);

        return Inertia::render('Dashboard', [
            'hasApplication' => (bool) $candidate,
            'application' => $candidate,
            'summary' => [
                'pending' => (int) ($summary['pending'] ?? 0),
                'review' => (int) ($summary['review'] ?? 0),
                'interview' => (int) ($summary['interview'] ?? 0),
                'hired' => (int) ($summary['hired'] ?? 0),
                'rejected' => (int) ($summary['rejected'] ?? 0),
                'total' => (int) $summary->sum(),
            ],
            'latestCandidates' => $latestCandidates,
        ]);
    }
}
