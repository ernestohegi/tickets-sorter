<?php

namespace Tickets\Services;

class TicketsSorterService implements TicketsSorterServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function sortTickets(array $tickets, array $sortedTickets, array $unsortedTickets)
    {
        foreach ($tickets as $ticket) {
            if (count($sortedTickets) === 0) {
                array_push($sortedTickets, $ticket);
            } else {
                $inserted = false;

                foreach($sortedTickets as $key => $sortedTicket) {
                    if (strcmp($sortedTicket['arrival'], $ticket['departure']) === 0) {
                        array_push($sortedTickets, $ticket);
                        $inserted = true;
                    }
                }

                if ($inserted === false) {
                    array_push($unsortedTickets, $ticket);
                }
            }
        }

        if (count($unsortedTickets) > 0) {
            return $this->sortTickets($unsortedTickets, $sortedTickets, []);
        }

        return $sortedTickets;
    }
}
