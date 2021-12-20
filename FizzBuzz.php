<?php

/**
 * FizzBuzz class
 * require: php8.0+
 */
class FizzBuzz
{
	const FIZZ = 3;
	const BUZZ = 5;
	private $include = false;

	public function __construct(private int $max = 100)
	{
	}

	public function game(bool $include = false): string
	{
		$this->include = $include;
		$output = '';
		for ($i = 1; $i <= $this->max; $i++) {
			$output .= $this->output($i) . PHP_EOL;
		}
		return $output;
	}

	protected function output(int $index = 1): int | string
	{
		if ($this->isFizzBuzz($index)) {
			return sprintf("%03d %s", $index, 'FizzBuzz');
		}

		if ($this->isFizz($index)) {
			return sprintf("%03d %s", $index, 'Fizz');
		}

		if ($this->isBuzz($index)) {
			return sprintf("%03d %s", $index, 'Buzz');
		}
		return sprintf("%03d %s", $index, '');;
	}

	protected function isFizzBuzz(int $index): string
	{
		return $index % self::FIZZ === 0 && $index % self::BUZZ === 0;
	}

	protected function isBuzz(int $index): string
	{
		if ($this->include) {
			return $index % self::BUZZ === 0 || strpos($index, self::BUZZ) !== false;
		}
		return $index % self::BUZZ === 0;
	}

	protected function isFizz(int $index): string
	{
		if ($this->include) {
			return $index % self::FIZZ === 0 || strpos($index, self::FIZZ) !== false;
		}
		return $index % self::FIZZ === 0;
	}
}

$init = new FizzBuzz(100);
## step 1
echo $init->game();

## step 2
echo $init->game(true);
