<?php

use PHPUnit\Framework\TestCase;
use App\Boarding;
use App\Ticket;

final class BoardingTest extends TestCase
{

	public function listProvider()
	{
		return [
			new Ticket('344', ' Gerona', 'Stockholm', 'flight', 'Gate 45B, seat 3A')
		];
	}

	/**
	 * @dataProvider listProvider
	 *
	 * @param arrayAccess $list
	 */
	public function testSortResult(array $list): void
	{
		$boarding = new Boarding();
		$this->assertEquals($list[0],1);
	}
}