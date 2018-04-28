<?php


namespace App;


/**
 * Class
 * TrainTicket
 * @package App
 */
class TrainTicket extends Ticket {

	/**
	 * @var string
	 */
	private $number;
	/**
	 * @var string
	 */
	private $seat;

	/**
	 * TrainTicket
	 * constructor.
	 *
	 * @param string      $from
	 * @param string      $to
	 * @param string      $number
	 * @param string|null $seat
	 */
	public function __construct(
		string $from, string $to, string $number, string $seat = null
	) {
		parent::__construct( $from, $to );
		$this->number = $number;
		$this->seat   = $seat;
	}

	/**
	 * @return string
	 */
	public function render(): string {
		return "Take train {$this->number} from {$this->from} to {$this->to}. "
		       . ( $this->seat ? "Sit in seat {$this->seat}." : "No seat assignment." );
	}
}