<?php


namespace App;


/**
 * Class Boarding
 * @package App
 */
class Boarding {


	/**
	 * @var Ticket[]
	 */
	private $list;


	/**
	 * Boarding constructor.
	 *
	 * @param Ticket ...$list
	 */
	public function __construct(Ticket ...$list)
	{
		$this->list = $list;
	}

	/**
	 * @return array
	 */
	private function getFromToList()
	{
		return array_reduce($this->list, function($fromToList, Ticket $item) {
			$fromToList['from'][$item->getFrom()] = $item;
			$fromToList['to'][$item->getTo()] = $item;
			return $fromToList;
		});
	}

	private static function startItem($fromToList): ?string {
		foreach ($fromToList['from'] as $key => $value){
			if (!array_key_exists($key, $fromToList['to'])){
				return $key;
			}
		}
	}

	/**
	 * @return array
	 * @throws \Exception
	 */
	public function reorder(): array
	{
		$fromToList = $this->getFromToList();

		$start = $this->startItem($fromToList);

		if (!$start) throw new \Exception("We don't know where you should start from");

		return static::getNext($fromToList['from'][$start],$fromToList['from']);
	}

	/**
	 * @param Ticket $ticket
	 * @param        $fromList
	 *
	 * @return array
	 */
	public static function getNext(Ticket $ticket, &$fromList)
	{
		static $list;
		$list[] = $ticket;
		if (array_key_exists($ticket->getTo(),$fromList)){
			$ticketNext = $fromList[$ticket->getTo()];
			unset($fromList[$ticket->getTo()]);
			static::getNext($ticketNext,$fromList);
		}
		return $list;
	}

}