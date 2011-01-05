<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel = "stylesheet" type = "text/css" href = "http://<?=base_url()?>/css/main.css">
	<script src="http://<?=base_url()?>/js/jquery-1.4.4.min.js" type="text/javascript"></script>
	<script src="http://<?=base_url()?>/js/highcharts.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://<?=base_url()?>/js/modules/exporting.js"></script>
	<script type="text/javascript">
		var chart1; // globally available
		$(document).ready(function() {
			incomes = new Highcharts.Chart({
				chart: {
					renderTo: 'incomes-container'
				},
				title: {
					text: 'Доходы по категориям'
				},
				plotArea: {
					shadow: null,
					borderWidth: null,
					backgroundColor: null
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: '#000000',
							formatter: function() {
								return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
							}
						}
					}
				},
			    series: [{
					type: 'pie',
					name: 'Доходы',
					data: <?=$incomes?>
				}]					
			});
			incomes = new Highcharts.Chart({
				chart: {
					renderTo: 'outcomes-container'
				},
				title: {
					text: 'Расходы по категориям'
				},
				plotArea: {
					shadow: null,
					borderWidth: null,
					backgroundColor: null
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: '#000000',
							formatter: function() {
								return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
							}
						}
					}
				},
			    series: [{
					type: 'pie',
					name: 'Расходы',
					data: <?=$outcomes?>
				}]					
			});
		      comparement = new Highcharts.Chart({
								chart: {
									renderTo: 'comparement-container', 
									defaultSeriesType: 'area'
								},
								title: {
									text: 'Динамика периодических доходов и расходов'
								},
								subtitle: {
									text: 'Отображает сумму получения/выплат в определенный момент времени'
								},
								xAxis: {
									labels: {
										formatter: function() {
											return this.value; // clean, unformatted number for year
										}
									}							
								},
								yAxis: {
									title: {
										text: 'Сумма в рублях'
									},
									labels: {
										formatter: function() {
											return this.value;
										}
									}
								},
								tooltip: {
									formatter: function() {
										if (this.series.name == 'Доход')
										{
											return this.series.name +' составил <b>'+
												Highcharts.numberFormat(this.y, 0) +'</b><br/>рублей ';
										}
										else
										{
											return this.series.name +' составил <b>'+
												Highcharts.numberFormat(this.y, 0) +'</b><br/>рублей ';
										}
									}
								},
								plotOptions: {
									area: {
										pointStart: 1,
										marker: {
											enabled: false,
											symbol: 'circle',
											radius: 2,
											states: {
												hover: {
													enabled: true
												}
											}
										}
									}
								},
								series: [{
									name: 'Доход',
									data: <?=$incomeTiming?>
								}, {
									name: 'Расход',
									data: <?=$outcomeTiming?>
								}]
							});
		
		
		});
	</script>
    <title> Личная бухгалтерия </title>
</head>
<body>
    <div id="div_main">
    <table id="table_main" align="center">
    <tr><td colspan="2">
    <?php
    echo "<label id='label_greeting'> Добро пожаловать, </label><label id='label_login'>$login</label>   ";
    if (!$authorized)
    {
        echo
        '[<a id="a_registration" href = "http://localhost/cm-accounting/registrator"> регистрация </a>]<br><br>';
        echo
        '
            <div id ="div_authorization">
                <form id="form_authorization" method="post" action="http://localhost/cm-accounting/registrator/enter">
                    <label>логин</label>
                    <input type="text" name="login">
                    <label>пароль</label>
                    <input type="password" name="password">
                    <input type="submit" value="вход">
                </form>
            </div>
        ';
    } else echo
           '[<a id = "a_escape" id="a_registration" href = "http://localhost/cm-accounting/registrator/escape"> выход </a>]<br><br>';
    ?>
    </td></tr>
    <tr>
    <td width="150" height="1"></td>
    <td width="650" rowspan="7" valign="top">
	<!-- Graphic reports start -->
		<div id="incomes-container" style="width: 100%; height: 400px"></div>
		<div id="outcomes-container" style="width: 100%; height: 400px"></div>
		<br />
		<div id="comparement-container" style="width: 100%; height: 400px"></div>				
	<!-- Graphic reports end -->
    </td></tr>
    <tr><td height="20"><a  id="a_incomes" href="http://localhost/cm-accounting/pages/incomes"> Доходы </a></td></tr>
    <tr><td height="20"><a  id="a_outcomes" href="http://localhost/cm-accounting/pages/outcomes"> Расходы </a></td></tr>
    <tr><td height="20"><a  id="a_periodic_incomes" href="http://localhost/cm-accounting/pages/periodic_incomes"> Периодические доходы </a></td></tr>
    <tr><td height="20"><a  id="a_periodic_outcomes" href="http://localhost/cm-accounting/pages/periodic_outcomes"> Периодические расходы </a></td></tr>
    <tr><td height="20"><a  id="a_reports" href="http://localhost/cm-accounting/pages/reports"> Отчеты </a></td></tr>
    <tr><td></td>
    </table>
    </div>
</body>