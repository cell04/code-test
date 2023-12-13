<?php

namespace Tests\Feature\Helpers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class TeHelperTest extends TestCase
{
    /**
     * A basic functional to test the will expired at helper function.
     */
    public function test_will_expire_at(): void
    {
        $dueTime = Carbon::now()->subHours(45);
        $createdAt = Carbon::now();

    	$expireAt = TeHelper::willExpireAt($dueTime, $dueTime);

        $this->assertEquals($dueTime->format('Y-m-d H:i:s'), $expireAt);
    }
}
