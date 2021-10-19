<?php
declare(strict_types=1);

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        return [];
    }
}
