<?php

namespace Tickets\Services;

interface TicketsSorterServiceInterface
{
    /**
     * Sorts tickets by arrival and departure.
     *
     * @param array $tickets
     */
    public function sortTickets(array $tickets, array $sortedTickets, array $unsortedTickets);
}
