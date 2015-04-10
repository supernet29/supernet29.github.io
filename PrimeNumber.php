<!DOCTYPE html>

<html>

	<head>
		<meta charset ="utf-8">
		<?php
			//소수 구하는 상한선
			$UPPER_LIMIT = 200;
			//분할 개수
			$SPLIT_NUMBER = 10;
			echo "<title> $UPPER_LIMIT 까지의 소수 구하기</title>";
		?>
	</head>
	
	<body>
		
		<?php
			/*
			작성날짜
			-2015년3월30일
			작성자
			-컴퓨터 공학과 2014108181 김우찬
			작성목적
			-소수를 구하는 프로그램을 작성하시오
			대략적 설계
			-배열을 이용하여 합성수를 소거한다.
			-true 의 경우를 소수로 본다.
			-
			*/
				
			//상한선
			
			//배열 초기화
			for($i = 0; $i < $UPPER_LIMIT; $i++)
				$primeNumber[$i] = true;
			//1 제거
			$primeNumber[0] = false;
			
			//배수를 걸러내는 방식으로 동작
			for($i = 1; $i <= $UPPER_LIMIT; $i++)
			{
				//합성수의 경우는 아래의 알고리즘을 사용하면 안되기 때문에 걸러냄
				if(!$primeNumber[$i-1])
					continue;
				
				//합성수 제외 알고리즘
				//소수의 배수들은 모두 합성수이므로
				//배열에 False를 저장하는 것으로 걸러냄
				for($j = 2; ($temp = $i*$j) <= $UPPER_LIMIT; $j++)
					$primeNumber[$temp-1] = false;
			}
			

			//출력 부분(표로 출력)
			$count = 0;
			$i=0;
			$row =true;
			//표를 시작하는 테그 출력
			echo "<center>";
			echo "<table border=1>";
			echo "<caption>1에서 $UPPER_LIMIT 까지의 소수 구하기</caption>";

			//일정한 수마다 행을 나누는 루프
			while($i < $UPPER_LIMIT)
			{
				//행 시작
				echo "<tr>";
				//일정한 수가 되거나 상한선 까지 도달하였을 경우 까지 반복
				for($j=0; $j<$SPLIT_NUMBER && $i<$UPPER_LIMIT; $i++)
				{
					//만약 소수라면 출력
					if($primeNumber[$i])
					{
						echo "<td>";
						//0부터 배열이 시작하기 때문에 200까지 하기 위해서는 +1필요
						echo $i+1;
						echo "</td>";
						$j++;
						$count++;
					}
				}
				//행의 끝
				echo "</tr>";
			}			
			
				
			echo "</table>";

			echo "소수의 총 개수 : $count ";
			echo "</center>";
		?>
	</body>
</html>

