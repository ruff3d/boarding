<?php

namespace App;


/**
 * Class Ticket
 * @package App
 */
class Ticket {

	/**
	 * @var string
	 */
	private $number;

	/**
	 * @var string
	 */
	private $from;

	/**
	 * @var string
	 */
	private $to;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var string
	 */
	private $seat;

	/**
	 * @param string $number
	 * @param string $from
	 * @param string $to
	 * @param string $type
	 * @param string $seat
	 */

	public function __construct(string $number, string $from, string $to, string $type, string $seat)
	{
		$this->number = $number;
		$this->from   = $from;
		$this->to     = $to;
		$this->type   = $type;
		$this->seat   = $seat;
	}

	public function getNumber(): string
	{
		return $this->number;
	}

	/**
	 * @param string $number
	 *
	 * @return Ticket
	 */
	public function setNumber(string $number): Ticket
	{
		$this->number = $number;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 *
	 * @return Ticket
	 */
	public function setType(string $type): Ticket
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getSeat(): string
	{
		return $this->seat;
	}

	/**
	 * @param string $seat
	 *
	 * @return Ticket
	 */
	public function setSeat(string $seat): Ticket
	{
		$this->seat = $seat;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getFrom(): string
	{
		return $this->from;
	}

	/**
	 * @param string $from
	 *
	 * @return Ticket
	 */
	public function setFrom(string $from): Ticket
	{
		$this->from = $from;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTo(): string
	{
		return $this->to;
	}

	/**
	 * @param string $to
	 *
	 * @return Ticket
	 */
	public function setTo(string $to): Ticket
	{
		$this->to = $to;

		return $this;
	}


}