<?php

require_once __DIR__."/prime_number.php";

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

		$factor["status"] = ($num === 1) ? "success":"fail";

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
			if ($prime_num === "status") continue;
			for($j = 0; $j < $count; $j++) {
				if ($str !== "") {
					$str .= "x";
				}
				$str .= "{$prime_num}";
			}
		}

		// 素数が足りずに失敗した場合は最後にfailをつける
		if ($factors["status"] === "fail") {
			$str .= "--- fail";
		}

		return $str;
	}


}