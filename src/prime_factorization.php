<?php

require __DIR__."/prime_number.php";

class PrimeFactorization extends PrimeNumber{

	// 素因数分解本体
	private function factorization($num) {
		$factor = [];

		foreach(self::$prime_number_list as $devide) {
			if ($devide === 1) continue; // 1は全て割れてしまうので除外
			while($this->is_dividable($num, $devide)) {
				$num /= $devide;
				if (empty($factor[$devide])) {
					$factor[$devide] = 0;
				}
				$factor[$devide]++;
			}
			if ($num === 1) break;
		}

		if ($num !== 1) {
			echo "$num を素因数分解に必要な素数が足りませんでした。\n";
			exit(-1);
		}

		return $factor;
	}

	// 結果を配列で得る
	public function getArray($num) {
		return $this->factorization($num);
	}

	// 結果を文字列で得る
	public function getString($num) {
		$factors = $this->getArray($num);

		// 掛け算の文字列に変換する
		$str = "";
		foreach($factors as $prime_num => $count) {
			for($j = 0; $j < $count; $j++) {
				if ($str !== "") {
					$str .= "x";
				}
				$str .= "{$prime_num}";
			}
		}

		return $str;
	}


}