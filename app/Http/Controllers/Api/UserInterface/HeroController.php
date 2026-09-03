<?php

namespace App\Http\Controllers\Api\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function downloadCV()
{
    try {
        $hero = Hero::first();

        // 1. Check CV from heroes table
        if ($hero && !empty($hero->cv)) {

            $cvPath = public_path('cv/' . $hero->cv);

            if (file_exists($cvPath)) {
                return response()->download(
                    $cvPath,
                    'Md-Arif-Billah-Shobuz-CV.pdf'
                );
            }
        }

        // 2. If Hero CV not found, use default CV
        $defaultCv = public_path('assets/pdf/default-cv.pdf');

        if (file_exists($defaultCv)) {
            return response()->download(
                $defaultCv,
                'Md-Arif-Billah-Shobuz-CV.pdf'
            );
        }

        return ApiResponse::error(
            error_data: 'CV file not found.'
        );

    } catch (Exception $e) {

        return ApiResponse::error(
            error_data: $e->getMessage()
        );
    }
}
}
