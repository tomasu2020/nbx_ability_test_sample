<?php

// 素数クラス
class PrimeNumber {
	static protected $prime_number_list=[]; // 素数リスト
	static protected $last_number; // 最後に素数チェックをした数値

	// コンストラクタ
	function __construct() {
		if (empty(self::$prime_number_list)) {
			self::$prime_number_list[] = 1;
			self::$last_number = 1;
		}
	}

	// 直前に探した素数より大きい整数から$limitまでの次の素数を探して返す
	public function getNext($limit = 100) {

		$start_number = self::$last_number;

		if ($start_number == 1) {
			self::$prime_number_list[] = 2;
			self::$last_number = 2;
			return 2;
		}

		for($i = $start_number + 1;$i< $limit;$i++) {
			if ($this->is_prime($i)) {
				self::$prime_number_list[] = $i;
				self::$last_number = $i;
				return $i;
			}
		}

		self::$last_number = $limit;
		return null;
	}

	// prime_number_listの要素で割り切れない数か検査する
	private function is_prime($num) {
		foreach(self::$prime_number_list as $devide) {
			if ($devide === 1) continue;
			if ($this->is_dividable($num, $devide) === true) return false;
		}
		return true;
	}

	// $targetは$numで割り切れるか検査する
	public function is_dividable($target,$num) {
		// echo "target:$target num:$num ";
		return (($target % $num) === 0);
	}

	// 最後の素数を返す（本来は不要だが初期化部分を外出ししたので）
	public function getLastNumber() {
		return self::$last_number;
	}

}