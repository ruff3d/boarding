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
					new FlightTicket('Stockholm', 'New York JFK', 'SK22','22','7B'),
					new FlightTicket('Gerona Airport', 'Stockholm', 'SK455', '45B', '3A', '344'),
					new BusTicket('Barcelona', 'Gerona Airport'),
					new TrainTicket('Madrid', 'Barcelona', '78A', '45B'),
				],
				[ // expected list
					new TrainTicket('Madrid', 'Barcelona', '78A', '45B'),
					new BusTicket('Barcelona', 'Gerona Airport'),
					new FlightTicket('Gerona Airport', 'Stockholm', 'SK455', '45B', '3A','344'),
					new FlightTicket('Stockholm', 'New York JFK', 'SK22','22','7B'),
				],
			],
		];
	}

	/**
	 * @dataProvider listProvider
	 *
	 * @param array $list
	 * @param array $expectedList
	 *
	 * @throws Exception
	 */
	public function testSortResult(array $list, array $expectedList): void
	{
		$boarding    = new Boarding(...$list);
		$orderedList = $boarding->getReorderedList();

		$this->assertEquals($expectedList, $orderedList);
	}

	/**
	 * @return array[]
	 */
	public function listToStringProvider()
	{
		return [[[ // unsorted list
	new FlightTicket('Stockholm', 'New York JFK', 'SK22','22','7B'),
	new FlightTicket('Gerona Airport', 'Stockholm', 'SK455', '45B', '3A', '344'),
	new BusTicket('Barcelona', 'Gerona Airport'),
	new TrainTicket('Madrid', 'Barcelona', '78A', '45B'),
				],
			// expected string
"1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.
4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.
5. You have arrived at your final destination.
"
			]];
	}

	/**
	 * @dataProvider listToStringProvider
	 *
	 * @param array $list
	 * @param string $expectedString
	 *
	 * @throws Exception
	 */
	public function testOutputList(array $list, string $expectedString): void
	{
		$boarding  = new Boarding(...$list);
		$this->assertSame($expectedString, $boarding->renderList());
	}

}