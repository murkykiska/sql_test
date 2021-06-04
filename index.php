<?php
	session_start();
	require_once("db.php");

	$v_firm = $db->query("SELECT * FROM v_firm");
	$vidtc = $db->query("SELECT * FROM vidtc");
	$tiptr = $db->query("SELECT * FROM tiptr");
	$pts = $db->query("SELECT * FROM pts");
	$dmlavt = $db->query("SELECT * FROM dmlavt");
	$dmapr = $db->query("SELECT * FROM dmapr");
	
?>
<html>
		<head>
			<meta charset="UTF-8">
			<title>sql test</title>
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
		</head>
		<body>			
		
			<header>
				<div class="content">					
					<ul>
						<li><a href="index.php"><h3>База данных</h3></a></li>
						<li><a href="a.php"><h3>Запрос a.</h3></a></li>
						<li><a href="b.php"><h3>Запрос b.</h3></a></li>
						<li><a href="c.php"><h3>Запрос c.</h3></a></li>
					</ul>
				</div>
			</header>
			
			<main>
				<div class="content">
					<!-- Предприятия -->
					<div class="v_firm">
						<h2>Предприятия</h2>
						<table border="1">
							<tr>
								<td><b>ID</b></td>
								<td><b>Наименование</b></td>
								<td><b>Географ. положение</b></td>
								<td></td>
								<td></td>
							</tr>
							<?php
								while($data = mysqli_fetch_array($v_firm)) {
									$firmid = $data['FIRMID'];
									$tlgr = $data['TLGR'];
									$disloc = $data['DISLOC'];
									
									
									echo  "
										<tr>
											<td>$firmid</td>
											<td>$tlgr</td>
											<td>$disloc</td>
											<td><a href='./v_firm/edit_item.php/?firmid=$firmid'>edit</a></td>
											<td><a href='./v_firm/delite_item.php/?firmid=$firmid'>delite</a></td>
										</tr>
									";
								}
							?>							
						</table>
						<br>
						<button>
							<a href='./v_firm/add_item.php'>Добавить компанию</a>
						</button>
					</div>
					<!-- Классификатор видов ТС -->
					<div class="vidtc">
						<h2>Классификатор видов ТС</h2>
						<table border="1">
							<tr>
								<td><b>ID</b></td>
								<td><b>Краткое наименование</b></td>
								<td><b>Полное наименование</b></td>
								<td></td>
								<td></td>
							</tr>
							<?php
								while($data = mysqli_fetch_array($vidtc)) {
									$vidt = $data['VIDT'];
									$shname = $data['SHNAME'];
									$fullname = $data['FULLNAME'];
									
									
									echo  "
										<tr>
											<td>$vidt</td>
											<td>$shname</td>
											<td>$fullname</td>
											<td><a href='./vidtc/edit_item.php/?vidt=$vidt'>edit</a></td>
											<td><a href='./vidtc/delite_item.php/?vidt=$vidt'>delite</a></td>
										</tr>
									";
								}
							?>							
						</table>
						<br>
						<button>
							<a href='./vidtc/add_item.php'>Добавить вид ТС</a>
						</button>
					</div>
					<!-- Классификатор типов ТС -->
					<div class="tiptr">
						<h2>Классификатор типов ТС</h2>
						<table border="1">
							<tr>
								<td><b>ID</b></td>
								<td><b>Наименование типа</b></td>
								<td><b>ID вида ТС</b></td>
								<td><b>Признак грузового ТС</b></td>
								<td></td>
								<td></td>
							</tr>
							<?php
								while($data = mysqli_fetch_array($tiptr)) {
									$tid = $data['TID'];
									$tname = $data['TNAME'];
									$vidt = $data['VIDT'];
									$prizngr = $data['PRIZNGR'];									
									
									echo  "
										<tr>
											<td>$tid</td>
											<td>$tname</td>
											<td>$vidt</td>
											<td>$prizngr</td>
											<td><a href='./tiptr/edit_item.php/?tid=$tid'>edit</a></td>
											<td><a href='./tiptr/delite_item.php/?tid=$tid'>delite</a></td>
										</tr>
									";
								}
							?>							
						</table>
						<br>
						<button>
							<a href='./tiptr/add_item.php'>Добавить вид ТС</a>
						</button>
					</div>
					<!-- Паспорт ТС -->
					<div class="pts">
						<h2>Паспорт ТС</h2>
						<table border="1">
							<tr>
								<td><b>ID</b></td>
								<td><b>Учетный номер ТС</b></td>
								<td><b>ID типа ТС</b></td>
								<td><b>ID предприятия</b></td>
								<td><b>Грузоподъемность</b></td>
								<td><b>Норматив расхода топлива</b></td>
								<td><b>Дата списания ТС</b></td>
								<td></td>
								<td></td>
							</tr>
							<?php
								while($data = mysqli_fetch_array($pts)) {
									
									$uin = $data['UIN'];
									$unts = $data['UNTS'];
									$tid = $data['TID'];
									$firmid = $data['FIRMID'];
									$grp = $data['GRP'];
									$normt = $data['NORMT'];
									$datasp = $data['DATASP'];									
									
									echo  "
										<tr>
											<td>$uin</td>
											<td>$unts</td>
											<td>$tid</td>
											<td>$firmid</td>
											<td>$grp</td>
											<td>$normt</td>
											<td>$datasp</td>
											<td><a href='./pts/edit_item.php/?uin=$uin'>edit</a></td>
											<td><a href='./pts/delite_item.php/?uin=$uin'>delite</a></td>
										</tr>
									";
								}
							?>							
						</table>
						<br>
						<button>
							<a href='./pts/add_item.php'>Добавить вид ТС</a>
						</button>
					</div>
					<!-- Список путевых листов -->
					<div class="dmlavt">
						<h2>Список путевых листов</h2>
						<table border="1">
							<tr>
								<td><b>ID</b></td>
								<td><b>Ссылка на номер ТС</b></td>
								<td><b>Номер, серия путевого листа</b></td>
								<td><b>Дата выдачи путевого листа</b></td>
								<td><b>Дата сдачи путевого листа</b></td>
								<td><b>Время выезда</b></td>
								<td><b>Время заезда	</b></td>
								<td><b>Общее время работы</b></td>
								<td><b>Общее время простоя</b></td>
								<td><b>Простой по тех. причинам</b></td>
								<td><b>Простой под погрузкой/разгрузкой</b></td>
								<td><b>Показание спидометра при выезде</b></td>
								<td><b>Показание спидометра при возвращении</b></td>
								<td><b>Вид топлива</b></td>
								<td><b>Наличие топлива - остаток при выезде</b></td>
								<td><b>Наличие топлива - выдано</b></td>
								<td><b>Наличие топлива - сдано</b></td>
								<td><b>Наличие топлива - остаток при возвращении</b></td>
								<td><b>Объем перевезеноого груза</b></td>
								<td><b>Перевезено грузов, в тоннокилометрах	</b></td>
								<td></td>
								<td></td>
							</tr>
							<?php
								while($dbdata = mysqli_fetch_array($dmlavt)) {
									
									$id = $dbdata['ID'];
									$uin = $dbdata['UIN'];
									$serpl = $dbdata['SERPL'];								
									$data = $dbdata['DATA'];								
									$dataret = $dbdata['DATARET'];								
									$timebeg = $dbdata['TIMEBEG'];								
									$timeend = $dbdata['TIMEEND'];								
									$worktime = $dbdata['WORKTIME'];								
									$prostoy = $dbdata['PROSTOY'];								
									$prostoytpr = $dbdata['PROSTOYTPR'];								
									$prostoygr = $dbdata['PROSTOYGR'];								
									$speedb = $dbdata['SPEEDB'];								
									$speede = $dbdata['SPEEDE'];								
									$topid = $dbdata['TOPID'];								
									$tostv = $dbdata['TOSTV'];								
									$tv = $dbdata['TV'];								
									$ts = $dbdata['TS'];								
									$tovz = $dbdata['TOVZ'];								
									$pergr = $dbdata['PERGR'];								
									$pergrtkm = $dbdata['PERGRTKM'];						
									
									echo  "
										<tr>											
											<td>$id</td>
											<td>$uin</td>
											<td>$serpl</td>
											<td>$data</td>
											<td>$dataret</td>
											<td>$timebeg</td>
											<td>$timeend</td>
											<td>$worktime</td>
											<td>$prostoy</td>
											<td>$prostoytpr</td>
											<td>$prostoygr</td>
											<td>$speedb</td>
											<td>$speede</td>
											<td>$topid</td>
											<td>$tostv</td>
											<td>$tv</td>
											<td>$ts</td>
											<td>$tovz</td>
											<td>$pergr</td>
											<td>$pergrtkm</td>
											
											<td><a href='./dmlavt/edit_item.php/?id=$id'>edit</a></td>
											<td><a href='./dmlavt/delite_item.php/?id=$id'>delite</a></td>
										</tr>
									";
								}
							?>							
						</table>
						<br>
						<button>
							<a href='./dmlavt/add_item.php'>Добавить вид ТС</a>
						</button>
					</div>
					<!-- Список использования прицепов -->
					<div class="dmapr">
						<h2>Список использования прицепов</h2>
						<table border="1">
							<tr>
								<td><b>ID</b></td>
								<td><b>ID прицепа</b></td>
								<td><b>Объем перевезенного груза</b></td>
								<td><b>ID путевого листа</b></td>
								
								<td></td>
								<td></td>
							</tr>
							<?php
								while($data = mysqli_fetch_array($dmapr)) {
									
									$id = $data['ID'];
									$uin_pts = $data['UIN_PTS'];
									$pergr = $data['PERGR'];
									$dml_id = $data['DML_ID'];																	
									
									echo  "
										<tr>
											<td>$id</td>
											<td>$uin_pts</td>
											<td>$pergr</td>
											<td>$dml_id</td>											
											<td><a href='./dmapr/edit_item.php/?id=$id'>edit</a></td>
											<td><a href='./dmapr/delite_item.php/?id=$id'>delite</a></td>
										</tr>
									";
								}
							?>							
						</table>
						<br>
						<button>
							<a href='./dmapr/add_item.php'>Добавить вид ТС</a>
						</button>
					</div>
				</div>
			</main>
		</body>
	</html>