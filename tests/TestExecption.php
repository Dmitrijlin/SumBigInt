<?php


use PHPUnit\Framework\TestCase;
require '../index.php';

class TestExecption extends TestCase {

	/**
	 * @dataProvider additionProviderForSumNotString
	 * @param $a
	 * @param $b
	 * @throws Exception
	 */
	public function testSumNotString($a, $b) {
		$this->expectException(Exception::class);
		$this->expectExceptionMessage('Введённые значения не строки!');
		$c = sumBigInt($a, $b);
	}

	public function additionProviderForSumNotString() {
		return [
			['1234', 5],
			[true, false],
			[1, 0.0],
			[new ArrayObject(), '1']
		];
	}

	/**
	 * @dataProvider additionProviderForOnlyNumbers
	 * @param $a
	 * @param $b
	 * @throws Exception
	 */
	public function testOnlyNumbers($a, $b) {
		$this->expectException(Exception::class);
		$this->expectExceptionMessage('В строке должны содержаться только числа!');
		$c = sumBigInt($a, $b);
	}

	public function additionProviderForOnlyNumbers() {
		return [
			['1234', '5v'],
			['v1234', '2'],
			['1v1', '2v2'],
			['34651354654164684651651656WWWWWWW___WWWWW854531351435134351351323458671654351', '1']
		];
	}
}
