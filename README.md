# boarding

# Installation
```bash
composer install
```
# Run tests
```bash
composer run-script test
```
# Using
```bash
composer require ruff3d/boarding
```

```php
<?php

use BoardingCards\{Boarding, TrainTicket, FlightTicket, BusTicket};

// Add unsorted Tickets to Boarding
$boarding = new Boarding(
	new FlightTicket('Stockholm', 'New York JFK', 'SK22','22','7B'),
	new FlightTicket('Gerona Airport', 'Stockholm', 'SK455', '45B', '3A', '344'),
	new BusTicket('Barcelona', 'Gerona Airport'),
	new TrainTicket('Madrid', 'Barcelona', '78A', '45B')
   );
// Get ordered Tickets list         
$orderedList = $boarding->getReorderedList();

// Render List Items
echo $boarding->renderList();
```
# Extending
If you want add new ticket type than just extend abstract class Ticket 
```php
<?php

namespace BoardingCards;

class WalkTicket extends Ticket {
/**
* @var bool
*/
 private $alone;

// extending default constructor
 public function __construct(string $from, string $to, bool $alone)
 {
    parent::__construct( $from, $to );
    $this->alone = $alone;
 }

/**
* @return string
*/
 public function render(): string
 {
    return "I walking " . ( $this->alone ? "alone" : "with my friends" );
 }
}
```

