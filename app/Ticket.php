<?php

namespace App;


/**
 * Class Ticket
 * @package App
 */
abstract class Ticket {


	/**
	 * @var string
	 */
	protected $from;

	/**
	 * @var string
	 */
	protected $to;

	/**
	 * @param string $from
	 * @param string $to
	 */

	public function __construct(string $from, string $to)
	{
		$this->from   = $from;
		$this->to     = $to;
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

	abstract public function render(): string;


}