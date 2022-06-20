<?php

namespace App\Domains\Calender\Controllers;

use App\ExternalServices\ApiServices\Contracts\CalendarService;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    use ApiResponser;

    public function retrieveRegionHolidays(CalendarService $calenderService, Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $calenderService->getHolidays($request->query());

        if ($data->has('errors')) {
            return $this->showError($data['message'], $data['errors'], $data['code']);
        }

        return $this->showMany($data);
    }
}
