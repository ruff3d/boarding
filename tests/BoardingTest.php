<?php

use PHPUnit\Framework\TestCase;
use App\{Boarding, TrainTicket, FlightTicket, BusTicket};

final class BoardingTest extends TestCase {

	/**
	 * @return array[]
	 */
	public function listProvider()
	{
		return [
			[
				[ // unsorted list
					new FlightTicket('Stockholm', 'New York'),
					new FlightTicket('Gerona Airport', 'Stockholm'),
					new BusTicket('Barcelona', 'Gerona Airport'),
					new TrainTicket('Madrid', 'Barcelona'),
				],
				[ // expected list
					new TrainTicket('Madrid', 'Barcelona'),
					new BusTicket('Barcelona', 'Gerona Airport'),
					new FlightTicket('Gerona Airport', 'Stockholm'),
					new FlightTicket('Stockholm', 'New York'),
				],
			],
		];
	}

	/**
	 * @dataProvider listProvider
	 *
	 * @param array $list
	 * @param array $expectedList
	 */
	public function testSortResult(array $list, array $expectedList): void
	{
		$boarding    = new Boarding(...$list);
		$orderedList = $boarding->reorder();

		$this->assertEquals($expectedList, $orderedList);
	}
}