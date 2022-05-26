<?php

include(__DIR__."/loader.php");

// 素数の準備
// 本来はPrimeNumberクラスのコンストラクタでやるべきことだが、テスト用にクラス外であえて実行
$primes = new PrimeNumber;

// 1000以下の素数を設定
$counter = 0;
while(true) {
	$prime = $primes->getNext(1000);
	// echo "$prime\n";
	if ($primes->getLastNumber() >= 1000) break;
	if ($counter++ > 2000) {
		echo '1000までの素数の生成に成功していません。';
		exit(-1);
	}
}

echo "素数の生成に成功しました。\n";

// 素因数分解のテスト実行
$nums = [168, 2022, 400649];

$pf = new PrimeFactorization;

// 素因数分解の結果の配列を得る
// foreach($nums as $num) {
// 	$rez = $pf->getArray($num);
// 	var_dump($rez);
// }

// 素因数分解の結果を文字列で表示する
foreach($nums as $num) {
	$rez = $pf->getString($num);
	echo "$num = $rez\n";
}

echo "素因数分解が正しいか確認してください。\n";
