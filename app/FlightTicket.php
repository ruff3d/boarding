<?php


namespace App;


/**
 * Class FlightTicket
 * @package App
 */
class FlightTicket extends Ticket {

	/**
	 * @var string
	 */
	private $number;
	/**
	 * @var string
	 */
	private $gate;
	/**
	 * @var string
	 */
	private $seat;
	/**
	 * @var string
	 */
	private $baggage;

	/**
	 * FlightTicket constructor.
	 *
	 * @param string $from
	 * @param string $to
	 * @param string $number
	 * @param string $gate
	 * @param string $seat
	 * @param string|null $baggage
	 */
	public function __construct(
		string $from,
		string $to,
		string $number,
		string $gate,
		string $seat,
		string $baggage = null
) {
		parent::__construct( $from, $to );
		$this->number = $number;
		$this->gate = $gate;
		$this->seat = $seat;
		$this->baggage = $baggage;
	}

	/**
	 * @return string
	 */
	public function render(): string {
		return "From {$this->from}, take flight {$this->number} to {$this->to}. Gate {$this->gate}, seat {$this->seat}. "
			. ($this->baggage
			? "Baggage drop at ticket counter {$this->baggage}."
			: "Baggage will we automatically transferred from your last leg.");
	}
}