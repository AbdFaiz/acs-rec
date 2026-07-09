<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Inertia\Inertia;
use Inertia\Response;

class RecruitmentController extends Controller
{
    public function index(): Response
    {
        $positions = Position::query()
            ->with('region:id,name')
            ->where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->get(['id', 'region_id', 'name', 'description', 'has_psychotest']);

        return Inertia::render('Recruitment/Index', [
            'positions' => $positions,
        ]);
    }
}
