<?php
declare(strict_types=1);

namespace Deniskarpenko\TimeTracking\Tests;

use App\Models\User;
use Tests\TestCase;

class PunchTest extends TestCase
{
    public function testPunch(): void
    {
        $user = User::factory()->createOne();
        $this->assertTrue(true);
    }
}
