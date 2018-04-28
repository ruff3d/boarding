<?php


namespace App;


/**
 * Class BusTicket
 * @package App
 */
/**
 * Class BusTicket
 * @package App
 */
class BusTicket extends Ticket {

	/**
	 * @var string
	 */
	private $number;
	/**
	 * @var string
	 */
	private $seat;

	/**
	 * BusTicket constructor.
	 *
	 * @param string $from
	 * @param string $to
	 * @param string $number
	 * @param string $seat
	 */
	public function __construct(
		string $from,
		string $to,
		string $number = null,
		string $seat = null
	) {
		parent::__construct( $from, $to );
		$this->number = $number;
		$this->seat = $seat;
	}

	/**
	 * @return string
	 */
	public function render(): string {
		return "Take the airport bus "
		       . ($this->number ? " {$this->number}":'')
		       . "from {$this->from} to {$this->to}. "
		       . ($this->seat
			? "Sit in seat {$this->seat}."
			: "No seat assignment.");
	}
}