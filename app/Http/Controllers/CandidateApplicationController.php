<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateApplicationRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class CandidateApplicationController extends Controller
{
    public function create(): Response|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->candidate()->exists()) {
            Inertia::flash('toast', [
                'type' => 'warning',
                'message' => __('Anda sudah pernah mengirim lamaran.'),
            ]);

            return to_route('dashboard');
        }

        $positions = Position::query()
            ->with('region:id,name')
            ->where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->get(['id', 'region_id', 'name']);

        return Inertia::render('Recruitment/Apply', [
            'positions' => $positions,
        ]);
    }

    public function store(StoreCandidateApplicationRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->candidate()->exists()) {
            Inertia::flash('toast', [
                'type' => 'warning',
                'message' => __('Lamaran Anda sudah terdaftar sebelumnya.'),
            ]);

            return to_route('dashboard');
        }

        DB::transaction(function () use ($request, $user): void {
            $user->candidate()->create($request->validated());
        });

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Lamaran berhasil dikirim. Tim HR akan menghubungi Anda.'),
        ]);

        return to_route('dashboard');
    }
}
