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

	private $reorderedList;


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
	private function reorder(): array
	{
		$fromToList = $this->getFromToList();

		$start = $this->startItem($fromToList);

		if (!$start) throw new \Exception("We don't know where you should start from");

		return static::getNext($fromToList['from'][$start],$fromToList['from']);
	}

	/**
	 * @param Ticket $ticket
	 * @param array  $fromList
	 *
	 * @param array  $list
	 *
	 * @return array
	 */
	private static function getNext(Ticket $ticket, array &$fromList, &$list = [])
	{
		$list[] = $ticket;
		if (array_key_exists($ticket->getTo(),$fromList)){
			$ticketNext = $fromList[$ticket->getTo()];
			unset($fromList[$ticket->getTo()]);
			static::getNext($ticketNext,$fromList,$list);
		}
		return $list;
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function renderList(): string
	{
		return join(PHP_EOL, $this->getReorderedList()).PHP_EOL
		       ."You have arrived at your final destination.";
	}

	/**
	 * @return array
	 * @throws \Exception
	 */
	public function getReorderedList() {
		return $this->reorderedList ?? $this->reorder();
	}

}