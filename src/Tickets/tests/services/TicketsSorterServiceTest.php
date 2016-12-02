<?php

require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Tickets\Services\TicketsSorterService;

class TicketsSorterServiceTest extends TestCase
{
    private $ticketsSorterService;

    public function setUp()
    {
        $this->ticketsSorterService = new TicketsSorterService();
    }

    public function testSortTickets()
    {
        $seed = [
            [
                'departure' => 'Barcelona',
                'arrival' => 'Madrid'
            ],
            [
                'departure' => 'Oslo',
                'arrival' => 'Dubai'
            ],
            [
                'departure' => 'New York',
                'arrival' => 'Milan'
            ],
            [
                'departure' => 'Dubai',
                'arrival' => 'New York'
            ],
            [
                'departure' => 'Madrid',
                'arrival' => 'Oslo'
            ]
        ];

        $actual = $this->ticketsSorterService->sortTickets($seed, [], []);
        $expected = [
            [
                'departure' => 'Barcelona',
                'arrival' => 'Madrid'
            ],
            [
                'departure' => 'Madrid',
                'arrival' => 'Oslo'
            ],
            [
                'departure' => 'Oslo',
                'arrival' => 'Dubai'
            ],
            [
                'departure' => 'Dubai',
                'arrival' => 'New York'
            ],
            [
                'departure' => 'New York',
                'arrival' => 'Milan'
            ]
        ];

        $this->assertEquals($expected, $actual);
    }
}
