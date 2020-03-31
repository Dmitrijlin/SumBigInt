<?php

use PHPUnit\Framework\TestCase;
require '../index.php';

class TestSum extends TestCase {


	public function testSumOnePlusOne() {
		$this->assertEquals('2', sumBigInt('1', '1'));
	}

	public function testSumTenPlusOne() {
		$this->assertEquals('11', sumBigInt('10', '1'));
	}

	public function testSumBigIntPlusBigInt() {
		$this->assertEquals(
			'8786416846123568135019303008789852146298169341989996482951024200297836592517809316',
			sumBigInt(
			'34651354654164684651651656854531351435134351351323458671654351',
			'8786416846123568134984651654135687461646517685135465131515889848946513133846154965'
			)
		);
	}
}
