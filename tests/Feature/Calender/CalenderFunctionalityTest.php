<?php

namespace Tests\Feature\Calender;

use Tests\TestCase;

class CalenderFunctionalityTest extends TestCase
{
    public function test_holidays_can_obtain()
    {
        $response = $this->getJson(route('calender.retrieveRegionHolidays'));

        $response->assertStatus(200);
    }

    public function test_holidays_can_obtain_using_group_by_filter()
    {
<<<<<<< HEAD
        $params = '?' . http_build_query(['groupBy' => 'month']);

        $response = $this->getJson(route('calender.retrieveRegionHolidays').$params);
=======
        $params = '?' + http_build_query(['groupBy' => 'month']);

        $response = $this->getJson(route('calender.retrieveRegionHolidays'.$params));
>>>>>>> 79272ae4c325ed1715d0f62647c469cc9d5c501b

        $response->assertStatus(200);
    }

    public function test_holidays_can_obtain_by_sorted()
    {
<<<<<<< HEAD
        echo 'apikey'. env('GOOGLE_API_KEY');
        $params = '?' . http_build_query(['sort' => 'true']);

        $response = $this->getJson(route('calender.retrieveRegionHolidays').$params);
=======
        $params = '?' + http_build_query(['sort' => 'true']);

        $response = $this->getJson(route('calender.retrieveRegionHolidays'.$params));
>>>>>>> 79272ae4c325ed1715d0f62647c469cc9d5c501b

        $response->assertStatus(200);
    }

    public function test_holidays_can_obtain_by_year()
    {
<<<<<<< HEAD
        $params = '?' . http_build_query(['year' => now()->year]);

        $response = $this->getJson(route('calender.retrieveRegionHolidays').$params);
=======
        $params = '?' + http_build_query(['year' => now()->year]);

        $response = $this->getJson(route('calender.retrieveRegionHolidays'.$params));
>>>>>>> 79272ae4c325ed1715d0f62647c469cc9d5c501b

        $response->assertStatus(200);
    }
}
