<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 03.03.17
 * Time: 17:45
 */
?>
@extends('front.master.layout')
@section('head')
	<title>{{$title or ""}}</title>
	<meta name="description" content="{{$description or ""}}">
	<meta property="og:url" content="{{url("/")}}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="title">
	<meta property="og:description" content="description">
	<meta property="og:image" content="http://themes.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
	<meta name="twitter:card" content="summary">
@endsection
@section('content')
	<div class="row gutter-xs" id="content1">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><h4 class="card-title">Можно будет заголовок сделать</h4></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-middle nowrap">
							<thead>
							<tr>
								<th colspan="4"></th>
								<th><strong>Игры</strong></th>
								<th>Победы</th>
								<th>Ничьи</th>
								<th title="Поражения">Пораж.</th>
								<th>Мячи</th>
								<th><strong>Очки</strong></th>
								<th>% очков</th>
								<th>Форма</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td >1</td>
								<td ></td>
								<td ><img src="https://img.championat.com/team/icon/14691965781678975171.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45688/result.html">Спартак</a></td>
								<td ><strong>17</strong></td>
								<td >13</td>
								<td >1</td>
								<td >3</td>
								<td ><span>26</span><span>-</span><span>13</span></td>
								<td ><strong>40</strong></td>
								<td >78,4</td>
								<td ></td>
							</tr>
							<tr>
								<td >2</td>
								<td ></td>
								<td ><img src="https://img.championat.com/team/icon/1465838584597764923.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45674/result.html">Зенит</a></td>
								<td ><strong>17</strong></td>
								<td >10</td>
								<td >5</td>
								<td >2</td>
								<td ><span>33</span><span>-</span><span>13</span></td>
								<td ><strong>35</strong></td>
								<td >68,6</td>
								<td ></td>
							</tr>
							<tr>
								<td >3</td>
								<td class="_color _color_up2"></td>
								<td ><img src="https://img.championat.com/team/icon/1465837941508832009.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45698/result.html">ЦСКА</a></td>
								<td ><strong>17</strong></td>
								<td >9</td>
								<td >5</td>
								<td >3</td>
								<td ><span>21</span><span>-</span><span>11</span></td>
								<td ><strong>32</strong></td>
								<td >62,7</td>
								<td ></td>
							</tr>
							<tr>
								<td >4</td>
								<td class="_color _color_up2"></td>
								<td ><img src="https://img.championat.com/team/icon/14658383001392067329.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45690/result.html">Терек</a></td>
								<td ><strong>17</strong></td>
								<td >8</td>
								<td >4</td>
								<td >5</td>
								<td ><span>21</span><span>-</span><span>21</span></td>
								<td ><strong>28</strong></td>
								<td >54,9</td>
								<td ></td>
							</tr>
							<tr>
								<td >5</td>
								<td class="_color _color_1"></td>
								<td ><img src="https://img.championat.com/team/icon/14676324111580185.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45676/result.html">Краснодар</a></td>
								<td ><strong>17</strong></td>
								<td >7</td>
								<td >7</td>
								<td >3</td>
								<td ><span>24</span><span>-</span><span>14</span></td>
								<td ><strong>28</strong></td>
								<td >54,9</td>
								<td ></td>
							</tr>
							<tr>
								<td >6</td>
								<td class="_color _color_0"></td>
								<td ><img src="https://img.championat.com/team/icon/14658386631014821040.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45668/result.html">Амкар</a></td>
								<td ><strong>17</strong></td>
								<td >7</td>
								<td >6</td>
								<td >4</td>
								<td ><span>16</span><span>-</span><span>12</span></td>
								<td ><strong>27</strong></td>
								<td >52,9</td>
								<td ></td>
							</tr>
							<tr>
								<td >7</td>
								<td class="_color _color_1"></td>
								<td ><img src="https://img.championat.com/team/icon/1465838435243584776.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45684/result.html">Ростов</a></td>
								<td ><strong>17</strong></td>
								<td >7</td>
								<td >4</td>
								<td >6</td>
								<td ><span>19</span><span>-</span><span>12</span></td>
								<td ><strong>25</strong></td>
								<td >49,0</td>
								<td ></td>
							</tr>
							<tr>
								<td >8</td>
								<td class="_color _color_0"></td>
								<td ><img src="https://img.championat.com/team/icon/1465837987654046394.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45696/result.html">Уфа</a></td>
								<td ><strong>17</strong></td>
								<td >7</td>
								<td >4</td>
								<td >6</td>
								<td ><span>12</span><span>-</span><span>13</span></td>
								<td ><strong>25</strong></td>
								<td >49,0</td>
								<td ></td>
							</tr>
							<tr>
								<td >9</td>
								<td class="_color _color_1"></td>
								<td ><img src="https://img.championat.com/team/icon/1469643619258855211.png"></td>
								<td ><a href="/football/_russiapl/1768/team/45686/result.html">Рубин</a></td>
								<td ><strong>17</strong></td>
								<td >6</td>
								<td >5</td>
								<td >6</td>
								<td ><span>20</span><span>-</span><span>19</span></td>
								<td ><strong>23</strong></td>
								<td >45,1</td>
								<td ></td>
							</tr>
							<tr>
								<td >10</td>
								<td class="_color _color_0"></td>
								<td ><img src="https://img.championat.com/team/icon/1465838477551159360.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45680/result.html">Локомотив</a></td>
								<td ><strong>17</strong></td>
								<td >5</td>
								<td >8</td>
								<td >4</td>
								<td ><span>21</span><span>-</span><span>13</span></td>
								<td ><strong>23</strong></td>
								<td >45,1</td>
								<td ></td>
							</tr>
							<tr>
								<td >11</td>
								<td class="_color _color_1"></td>
								<td ><img src="https://img.championat.com/team/icon/1465838624130963797.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45670/result.html">Анжи</a></td>
								<td ><strong>17</strong></td>
								<td >5</td>
								<td >5</td>
								<td >7</td>
								<td ><span>13</span><span>-</span><span>18</span></td>
								<td ><strong>20</strong></td>
								<td >39,2</td>
								<td ></td>
							</tr>
							<tr>
								<td >12</td>
								<td class="_color _color_0"></td>
								<td ><img src="https://img.championat.com/team/icon/1465838512137582755.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45678/result.html">Крылья Советов</a></td>
								<td ><strong>17</strong></td>
								<td >3</td>
								<td >6</td>
								<td >8</td>
								<td ><span>17</span><span>-</span><span>20</span></td>
								<td ><strong>15</strong></td>
								<td >29,4</td>
								<td ></td>
							</tr>
							<tr>
								<td >13</td>
								<td class="_color _color_overdown"></td>
								<td ><img src="https://img.championat.com/team/icon/1465838011197034234.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45694/result.html">Урал</a></td>
								<td ><strong>17</strong></td>
								<td >3</td>
								<td >5</td>
								<td >9</td>
								<td ><span>11</span><span>-</span><span>25</span></td>
								<td ><strong>14</strong></td>
								<td >27,5</td>
								<td ></td>
							</tr>
							<tr>
								<td >14</td>
								<td class="_color _color_overdown"></td>
								<td ><img src="https://img.championat.com/team/icon/1468673791946765993.png"></td>
								<td ><a href="/football/_russiapl/1768/team/45682/result.html">Оренбург</a></td>
								<td ><strong>17</strong></td>
								<td >2</td>
								<td >6</td>
								<td >9</td>
								<td ><span>11</span><span>-</span><span>21</span></td>
								<td ><strong>12</strong></td>
								<td >23,5</td>
								<td ></td>
							</tr>
							<tr>
								<td >15</td>
								<td class="_color _color_down"></td>
								<td ><img src="https://img.championat.com/team/icon/146919681075905068.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45672/result.html">Арсенал</a></td>
								<td ><strong>17</strong></td>
								<td >2</td>
								<td >6</td>
								<td >9</td>
								<td ><span>6</span><span>-</span><span>23</span></td>
								<td ><strong>12</strong></td>
								<td >23,5</td>
								<td ></td>
							</tr>
							<tr>
								<td >16</td>
								<td class="_color _color_down"></td>
								<td ><img src="https://img.championat.com/team/icon/14691967521948921478.jpg"></td>
								<td ><a href="/football/_russiapl/1768/team/45692/result.html">Томь</a></td>
								<td ><strong>17</strong></td>
								<td >2</td>
								<td >3</td>
								<td >12</td>
								<td ><span>8</span><span>-</span><span>31</span></td>
								<td ><strong>9</strong></td>
								<td >17,6</td>
								<td ></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header"><h4 class="card-title">Расписание матчей \ Календарь</h4></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-middle nowrap">
							<thead>
							<tr>
								<th>Тур</th>
								<th>Дата</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<tr><td>1</td><td>30.07.2016, 17:30</td><td>Зенит</td><td>0</td><td>0</td><td>Локомотив</td></tr>
							<tr><td>1</td><td>30.07.2016, 20:00</td><td>Анжи</td><td>0</td><td>0</td><td>ЦСКА</td></tr>
							<tr><td>1</td><td>30.07.2016, 21:30</td><td>Ростов</td><td>1</td><td>0</td><td>Оренбург</td></tr>
							<tr><td>1</td><td>31.07.2016, 15:30</td><td>Урал</td><td>2</td><td>0</td><td>Уфа</td></tr>
							<tr><td>1</td><td>31.07.2016, 18:00</td><td>Спартак</td><td>4</td><td>0</td><td>Арсенал</td></tr>
							<tr><td>1</td><td>31.07.2016, 20:30</td><td>Терек</td><td>1</td><td>0</td><td>Крылья Советов</td></tr>
							<tr><td>1</td><td>01.08.2016, 19:30</td><td>Рубин</td><td>0</td><td>0</td><td>Амкар</td></tr>
							<tr><td>1</td><td>01.08.2016, 19:30</td><td>Краснодар</td><td>3</td><td>0</td><td>Томь</td></tr>
							<tr><td>2</td><td>06.08.2016, 17:00</td><td>Уфа</td><td>0</td><td>0</td><td>Зенит</td></tr>
							<tr><td>2</td><td>06.08.2016, 19:30</td><td>Арсенал</td><td>1</td><td>0</td><td>Рубин</td></tr>
							<tr><td>2</td><td>07.08.2016, 16:00</td><td>Оренбург</td><td>0</td><td>1</td><td>ЦСКА</td></tr>
							<tr><td>2</td><td>07.08.2016, 16:30</td><td>Амкар</td><td>2</td><td>0</td><td>Анжи</td></tr>
							<tr><td>2</td><td>07.08.2016, 19:00</td><td>Локомотив</td><td>2</td><td>2</td><td>Томь</td></tr>
							<tr><td>2</td><td>07.08.2016, 21:30</td><td>Ростов</td><td>0</td><td>0</td><td>Урал</td></tr>
							<tr><td>2</td><td>08.08.2016, 19:30</td><td>Спартак</td><td>1</td><td>0</td><td>Крылья Советов</td></tr>
							<tr><td>2</td><td>08.08.2016, 19:30</td><td>Краснодар</td><td>4</td><td>0</td><td>Терек</td></tr>
							<tr><td>3</td><td>12.08.2016, 19:30</td><td>Зенит</td><td>3</td><td>2</td><td>Ростов</td></tr>
							<tr><td>3</td><td>13.08.2016, 15:30</td><td>Урал</td><td>0</td><td>1</td><td>ЦСКА</td></tr>
							<tr><td>3</td><td>13.08.2016, 18:00</td><td>Крылья Советов</td><td>1</td><td>1</td><td>Краснодар</td></tr>
							<tr><td>3</td><td>13.08.2016, 20:30</td><td>Рубин</td><td>1</td><td>1</td><td>Спартак</td></tr>
							<tr><td>3</td><td>14.08.2016, 15:30</td><td>Томь</td><td>1</td><td>0</td><td>Уфа</td></tr>
							<tr><td>3</td><td>14.08.2016, 20:00</td><td>Анжи</td><td>1</td><td>0</td><td>Арсенал</td></tr>
							<tr><td>3</td><td>14.08.2016, 20:30</td><td>Терек</td><td>1</td><td>1</td><td>Локомотив</td></tr>
							<tr><td>3</td><td>15.08.2016, 17:30</td><td>Оренбург</td><td>0</td><td>0</td><td>Амкар</td></tr>
							<tr><td>4</td><td>19.08.2016, 19:30</td><td>Рубин</td><td>1</td><td>2</td><td>Анжи</td></tr>
							<tr><td>4</td><td>20.08.2016, 14:30</td><td>Уфа</td><td>1</td><td>3</td><td>Терек</td></tr>
							<tr><td>4</td><td>20.08.2016, 17:00</td><td>Зенит</td><td>1</td><td>1</td><td>ЦСКА</td></tr>
							<tr><td>4</td><td>20.08.2016, 21:30</td><td>Ростов</td><td>3</td><td>0</td><td>Томь</td></tr>
							<tr><td>4</td><td>21.08.2016, 15:30</td><td>Амкар</td><td>1</td><td>0</td><td>Урал</td></tr>
							<tr><td>4</td><td>21.08.2016, 18:00</td><td>Спартак</td><td>2</td><td>0</td><td>Краснодар</td></tr>
							<tr><td>4</td><td>21.08.2016, 20:30</td><td>Локомотив</td><td>0</td><td>0</td><td>Крылья Советов</td></tr>
							<tr><td>4</td><td>22.08.2016, 19:30</td><td>Арсенал</td><td>0</td><td>0</td><td>Оренбург</td></tr>
							<tr><td>5</td><td>26.08.2016, 18:30</td><td>Крылья Советов</td><td>0</td><td>1</td><td>Уфа</td></tr>
							<tr><td>5</td><td>27.08.2016, 13:00</td><td>Оренбург</td><td>1</td><td>1</td><td>Рубин</td></tr>
							<tr><td>5</td><td>27.08.2016, 15:30</td><td>Томь</td><td>0</td><td>1</td><td>ЦСКА</td></tr>
							<tr><td>5</td><td>27.08.2016, 18:00</td><td>Зенит</td><td>3</td><td>0</td><td>Амкар</td></tr>
							<tr><td>5</td><td>28.08.2016, 17:00</td><td>Урал</td><td>1</td><td>1</td><td>Арсенал</td></tr>
							<tr><td>5</td><td>28.08.2016, 19:15</td><td>Терек</td><td>2</td><td>1</td><td>Ростов</td></tr>
							<tr><td>5</td><td>28.08.2016, 19:15</td><td>Краснодар</td><td>1</td><td>2</td><td>Локомотив</td></tr>
							<tr><td>5</td><td>28.08.2016, 21:30</td><td>Анжи</td><td>0</td><td>2</td><td>Спартак</td></tr>
							<tr><td>6</td><td>09.09.2016, 20:00</td><td>Ростов</td><td>2</td><td>1</td><td>Крылья Советов</td></tr>
							<tr><td>6</td><td>10.09.2016, 15:30</td><td>Амкар</td><td>1</td><td>0</td><td>Томь</td></tr>
							<tr><td>6</td><td>10.09.2016, 18:00</td><td>Оренбург</td><td>0</td><td>0</td><td>Анжи</td></tr>
							<tr><td>6</td><td>10.09.2016, 20:30</td><td>ЦСКА</td><td>3</td><td>0</td><td>Терек</td></tr>
							<tr><td>6</td><td>11.09.2016, 14:00</td><td>Уфа</td><td>0</td><td>0</td><td>Краснодар</td></tr>
							<tr><td>6</td><td>11.09.2016, 16:30</td><td>Спартак</td><td>1</td><td>0</td><td>Локомотив</td></tr>
							<tr><td>6</td><td>11.09.2016, 19:00</td><td>Арсенал</td><td>0</td><td>5</td><td>Зенит</td></tr>
							<tr><td>6</td><td>12.09.2016, 19:30</td><td>Рубин</td><td>3</td><td>1</td><td>Урал</td></tr>
							<tr><td>7</td><td>16.09.2016, 17:00</td><td>Оренбург</td><td>1</td><td>3</td><td>Спартак</td></tr>
							<tr><td>7</td><td>17.09.2016, 14:00</td><td>Томь</td><td>1</td><td>0</td><td>Арсенал</td></tr>
							<tr><td>7</td><td>17.09.2016, 16:30</td><td>Урал</td><td>0</td><td>1</td><td>Анжи</td></tr>
							<tr><td>7</td><td>17.09.2016, 19:00</td><td>Терек</td><td>1</td><td>3</td><td>Амкар</td></tr>
							<tr><td>7</td><td>17.09.2016, 19:00</td><td>Локомотив</td><td>0</td><td>1</td><td>Уфа</td></tr>
							<tr><td>7</td><td>18.09.2016, 17:15</td><td>Крылья Советов</td><td>1</td><td>2</td><td>ЦСКА</td></tr>
							<tr><td>7</td><td>18.09.2016, 20:00</td><td>Краснодар</td><td>2</td><td>1</td><td>Ростов</td></tr>
							<tr><td>7</td><td>19.09.2016, 19:30</td><td>Зенит</td><td>4</td><td>1</td><td>Рубин</td></tr>
							<tr><td>8</td><td>24.09.2016, 17:00</td><td>ЦСКА</td><td>1</td><td>1</td><td>Краснодар</td></tr>
							<tr><td>8</td><td>24.09.2016, 21:30</td><td>Ростов</td><td>1</td><td>0</td><td>Локомотив</td></tr>
							<tr><td>8</td><td>25.09.2016, 12:00</td><td>Оренбург</td><td>0</td><td>1</td><td>Урал</td></tr>
							<tr><td>8</td><td>25.09.2016, 14:30</td><td>Арсенал</td><td>0</td><td>0</td><td>Терек</td></tr>
							<tr><td>8</td><td>25.09.2016, 17:00</td><td>Спартак</td><td>0</td><td>1</td><td>Уфа</td></tr>
							<tr><td>8</td><td>25.09.2016, 19:30</td><td>Анжи</td><td>2</td><td>2</td><td>Зенит</td></tr>
							<tr><td>8</td><td>26.09.2016, 17:00</td><td>Амкар</td><td>0</td><td>0</td><td>Крылья Советов</td></tr>
							<tr><td>8</td><td>26.09.2016, 19:30</td><td>Рубин</td><td>2</td><td>1</td><td>Томь</td></tr>
							<tr><td>9</td><td>01.10.2016, 12:00</td><td>Томь</td><td>1</td><td>1</td><td>Урал</td></tr>
							<tr><td>9</td><td>01.10.2016, 14:30</td><td>Крылья Советов</td><td>2</td><td>1</td><td>Анжи</td></tr>
							<tr><td>9</td><td>01.10.2016, 17:00</td><td>Локомотив</td><td>1</td><td>1</td><td>Арсенал</td></tr>
							<tr><td>9</td><td>01.10.2016, 19:30</td><td>Терек</td><td>2</td><td>1</td><td>Оренбург</td></tr>
							<tr><td>9</td><td>02.10.2016, 14:00</td><td>Уфа</td><td>1</td><td>1</td><td>Амкар</td></tr>
							<tr><td>9</td><td>02.10.2016, 16:30</td><td>Зенит</td><td>4</td><td>2</td><td>Спартак</td></tr>
							<tr><td>9</td><td>02.10.2016, 19:00</td><td>Краснодар</td><td>1</td><td>0</td><td>Рубин</td></tr>
							<tr><td>9</td><td>02.10.2016, 19:00</td><td>Ростов</td><td>2</td><td>0</td><td>ЦСКА</td></tr>
							<tr><td>10</td><td>14.10.2016, 19:30</td><td>ЦСКА</td><td>1</td><td>0</td><td>Уфа</td></tr>
							<tr><td>10</td><td>15.10.2016, 14:30</td><td>Амкар</td><td>0</td><td>0</td><td>Локомотив</td></tr>
							<tr><td>10</td><td>15.10.2016, 17:00</td><td>Рубин</td><td>3</td><td>0</td><td>Крылья Советов</td></tr>
							<tr><td>10</td><td>15.10.2016, 19:30</td><td>Спартак</td><td>1</td><td>0</td><td>Ростов</td></tr>
							<tr><td>10</td><td>16.10.2016, 14:00</td><td>Урал</td><td>0</td><td>2</td><td>Зенит</td></tr>
							<tr><td>10</td><td>16.10.2016, 16:30</td><td>Оренбург</td><td>3</td><td>1</td><td>Томь</td></tr>
							<tr><td>10</td><td>16.10.2016, 19:00</td><td>Арсенал</td><td>0</td><td>0</td><td>Краснодар</td></tr>
							<tr><td>10</td><td>17.10.2016, 19:30</td><td>Анжи</td><td>0</td><td>0</td><td>Терек</td></tr>
							<tr><td>11</td><td>21.10.2016, 18:00</td><td>Крылья Советов</td><td>1</td><td>1</td><td>Арсенал</td></tr>
							<tr><td>11</td><td>22.10.2016, 12:00</td><td>Томь</td><td>0</td><td>3</td><td>Анжи</td></tr>
							<tr><td>11</td><td>22.10.2016, 14:30</td><td>Уфа</td><td>0</td><td>0</td><td>Ростов</td></tr>
							<tr><td>11</td><td>22.10.2016, 17:00</td><td>Урал</td><td>0</td><td>1</td><td>Спартак</td></tr>
							<tr><td>11</td><td>22.10.2016, 19:30</td><td>Терек</td><td>3</td><td>1</td><td>Рубин</td></tr>
							<tr><td>11</td><td>23.10.2016, 16:30</td><td>Локомотив</td><td>1</td><td>0</td><td>ЦСКА</td></tr>
							<tr><td>11</td><td>23.10.2016, 19:00</td><td>Краснодар</td><td>1</td><td>0</td><td>Амкар</td></tr>
							<tr><td>11</td><td>24.10.2016, 19:30</td><td>Зенит</td><td>1</td><td>0</td><td>Оренбург</td></tr>
							<tr><td>12</td><td>29.10.2016, 15:30</td><td>Амкар</td><td>1</td><td>0</td><td>Ростов</td></tr>
							<tr><td>12</td><td>29.10.2016, 18:00</td><td>Спартак</td><td>3</td><td>1</td><td>ЦСКА</td></tr>
							<tr><td>12</td><td>30.10.2016, 12:00</td><td>Урал</td><td>1</td><td>4</td><td>Терек</td></tr>
							<tr><td>12</td><td>30.10.2016, 14:30</td><td>Арсенал</td><td>0</td><td>2</td><td>Уфа</td></tr>
							<tr><td>12</td><td>30.10.2016, 17:00</td><td>Зенит</td><td>1</td><td>0</td><td>Томь</td></tr>
							<tr><td>12</td><td>30.10.2016, 19:30</td><td>Анжи</td><td>0</td><td>0</td><td>Краснодар</td></tr>
							<tr><td>12</td><td>31.10.2016, 17:00</td><td>Оренбург</td><td>1</td><td>0</td><td>Крылья Советов</td></tr>
							<tr><td>12</td><td>31.10.2016, 19:30</td><td>Рубин</td><td>2</td><td>0</td><td>Локомотив</td></tr>
							<tr><td>13</td><td>05.11.2016, 11:00</td><td>Томь</td><td>0</td><td>1</td><td>Спартак</td></tr>
							<tr><td>13</td><td>05.11.2016, 13:30</td><td>Уфа</td><td>2</td><td>3</td><td>Рубин</td></tr>
							<tr><td>13</td><td>05.11.2016, 16:00</td><td>Крылья Советов</td><td>2</td><td>2</td><td>Урал</td></tr>
							<tr><td>13</td><td>05.11.2016, 18:30</td><td>Локомотив</td><td>4</td><td>0</td><td>Анжи</td></tr>
							<tr><td>13</td><td>06.11.2016, 17:00</td><td>Терек</td><td>2</td><td>1</td><td>Зенит</td></tr>
							<tr><td>13</td><td>06.11.2016, 17:00</td><td>Ростов</td><td>4</td><td>1</td><td>Арсенал</td></tr>
							<tr><td>13</td><td>06.11.2016, 19:00</td><td>ЦСКА</td><td>2</td><td>2</td><td>Амкар</td></tr>
							<tr><td>13</td><td>06.11.2016, 19:30</td><td>Краснодар</td><td>3</td><td>3</td><td>Оренбург</td></tr>
							<tr><td>14</td><td>18.11.2016, 19:00</td><td>Арсенал</td><td>0</td><td>1</td><td>ЦСКА</td></tr>
							<tr><td>14</td><td>18.11.2016, 19:30</td><td>Рубин</td><td>0</td><td>0</td><td>Ростов</td></tr>
							<tr><td>14</td><td>19.11.2016, 14:30</td><td>Оренбург</td><td>1</td><td>1</td><td>Локомотив</td></tr>
							<tr><td>14</td><td>19.11.2016, 17:00</td><td>Анжи</td><td>0</td><td>1</td><td>Уфа</td></tr>
							<tr><td>14</td><td>20.11.2016, 14:30</td><td>Краснодар</td><td>3</td><td>0</td><td>Урал</td></tr>
							<tr><td>14</td><td>20.11.2016, 17:00</td><td>Спартак</td><td>1</td><td>0</td><td>Амкар</td></tr>
							<tr><td>14</td><td>20.11.2016, 19:30</td><td>Зенит</td><td>3</td><td>1</td><td>Крылья Советов</td></tr>
							<tr><td>14</td><td>21.11.2016, 19:00</td><td>Терек</td><td>0</td><td>0</td><td>Томь</td></tr>
							<tr><td>15</td><td>25.11.2016, 17:00</td><td>Уфа</td><td>1</td><td>0</td><td>Оренбург</td></tr>
							<tr><td>15</td><td>26.11.2016, 11:30</td><td>Амкар</td><td>1</td><td>0</td><td>Арсенал</td></tr>
							<tr><td>15</td><td>26.11.2016, 14:00</td><td>ЦСКА</td><td>0</td><td>0</td><td>Рубин</td></tr>
							<tr><td>15</td><td>26.11.2016, 17:00</td><td>Локомотив</td><td>1</td><td>1</td><td>Урал</td></tr>
							<tr><td>15</td><td>26.11.2016, 18:00</td><td>Терек</td><td>0</td><td>1</td><td>Спартак</td></tr>
							<tr><td>15</td><td>27.11.2016, 14:00</td><td>Крылья Советов</td><td>3</td><td>0</td><td>Томь</td></tr>
							<tr><td>15</td><td>27.11.2016, 16:30</td><td>Ростов</td><td>2</td><td>0</td><td>Анжи</td></tr>
							<tr><td>15</td><td>27.11.2016, 19:00</td><td>Краснодар</td><td>2</td><td>1</td><td>Зенит</td></tr>
							<tr><td>16</td><td>30.11.2016, 17:00</td><td>Урал</td><td>1</td><td>0</td><td>Ростов</td></tr>
							<tr><td>16</td><td>30.11.2016, 19:00</td><td>Рубин</td><td>1</td><td>0</td><td>Арсенал</td></tr>
							<tr><td>16</td><td>30.11.2016, 19:30</td><td>ЦСКА</td><td>2</td><td>0</td><td>Оренбург</td></tr>
							<tr><td>16</td><td>30.11.2016, 19:30</td><td>Зенит</td><td>2</td><td>0</td><td>Уфа</td></tr>
							<tr><td>16</td><td>01.12.2016, 18:00</td><td>Крылья Советов</td><td>4</td><td>0</td><td>Спартак</td></tr>
							<tr><td>16</td><td>01.12.2016, 18:00</td><td>Терек</td><td>2</td><td>1</td><td>Краснодар</td></tr>
							<tr><td>16</td><td>01.12.2016, 19:30</td><td>Томь</td><td>1</td><td>6</td><td>Локомотив</td></tr>
							<tr><td>16</td><td>01.12.2016, 20:30</td><td>Анжи</td><td>3</td><td>1</td><td>Амкар</td></tr>
							<tr><td>17</td><td>03.12.2016, 14:00</td><td>ЦСКА</td><td>4</td><td>0</td><td>Урал</td></tr>
							<tr><td>17</td><td>03.12.2016, 19:00</td><td>Ростов</td><td>0</td><td>0</td><td>Зенит</td></tr>
							<tr><td>17</td><td>04.12.2016, 16:00</td><td>Локомотив</td><td>2</td><td>0</td><td>Терек</td></tr>
							<tr><td>17</td><td>05.12.2016, 13:00</td><td>Уфа</td><td>1</td><td>0</td><td>Томь</td></tr>
							<tr><td>17</td><td>05.12.2016, 14:00</td><td>Амкар</td><td>3</td><td>0</td><td>Оренбург</td></tr>
							<tr><td>17</td><td>05.12.2016, 19:00</td><td>Краснодар</td><td>1</td><td>1</td><td>Крылья Советов</td></tr>
							<tr><td>17</td><td>05.12.2016, 19:30</td><td>Спартак</td><td>2</td><td>1</td><td>Рубин</td></tr>
							<tr><td>17</td><td>05.12.2016, 19:30</td><td>Арсенал</td><td>1</td><td>0</td><td>Анжи</td></tr>
							<tr><td>18</td><td>03.03.2017</td><td>Томь</td><td>-</td><td>-</td><td>Ростов</td></tr>
							<tr><td>18</td><td>04.03.2017</td><td>Оренбург</td><td>-</td><td>-</td><td>Арсенал</td></tr>
							<tr><td>18</td><td>04.03.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Зенит</td></tr>
							<tr><td>18</td><td>05.03.2017</td><td>Краснодар</td><td>-</td><td>-</td><td>Спартак</td></tr>
							<tr><td>18</td><td>05.03.2017</td><td>Урал</td><td>-</td><td>-</td><td>Амкар</td></tr>
							<tr><td>18</td><td>05.03.2017</td><td>Терек</td><td>-</td><td>-</td><td>Уфа</td></tr>
							<tr><td>18</td><td>05.03.2017</td><td>Крылья Советов</td><td>-</td><td>-</td><td>Локомотив</td></tr>
							<tr><td>18</td><td>06.03.2017</td><td>Анжи</td><td>-</td><td>-</td><td>Рубин</td></tr>
							<tr><td>19</td><td>10.03.2017</td><td>Арсенал</td><td>-</td><td>-</td><td>Урал</td></tr>
							<tr><td>19</td><td>11.03.2017</td><td>Рубин</td><td>-</td><td>-</td><td>Оренбург</td></tr>
							<tr><td>19</td><td>11.03.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Томь</td></tr>
							<tr><td>19</td><td>11.03.2017</td><td>Уфа</td><td>-</td><td>-</td><td>Крылья Советов</td></tr>
							<tr><td>19</td><td>12.03.2017</td><td>Спартак</td><td>-</td><td>-</td><td>Анжи</td></tr>
							<tr><td>19</td><td>12.03.2017</td><td>Амкар</td><td>-</td><td>-</td><td>Зенит</td></tr>
							<tr><td>19</td><td>12.03.2017</td><td>Ростов</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>19</td><td>12.03.2017</td><td>Локомотив</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>20</td><td>17.03.2017</td><td>Анжи</td><td>-</td><td>-</td><td>Оренбург</td></tr>
							<tr><td>20</td><td>18.03.2017</td><td>Локомотив</td><td>-</td><td>-</td><td>Спартак</td></tr>
							<tr><td>20</td><td>18.03.2017</td><td>Урал</td><td>-</td><td>-</td><td>Рубин</td></tr>
							<tr><td>20</td><td>18.03.2017</td><td>Томь</td><td>-</td><td>-</td><td>Амкар</td></tr>
							<tr><td>20</td><td>19.03.2017</td><td>Зенит</td><td>-</td><td>-</td><td>Арсенал</td></tr>
							<tr><td>20</td><td>19.03.2017</td><td>Терек</td><td>-</td><td>-</td><td>ЦСКА</td></tr>
							<tr><td>20</td><td>19.03.2017</td><td>Крылья Советов</td><td>-</td><td>-</td><td>Ростов</td></tr>
							<tr><td>20</td><td>19.03.2017</td><td>Краснодар</td><td>-</td><td>-</td><td>Уфа</td></tr>
							<tr><td>21</td><td>31.03.2017</td><td>Рубин</td><td>-</td><td>-</td><td>Зенит</td></tr>
							<tr><td>21</td><td>31.03.2017</td><td>Анжи</td><td>-</td><td>-</td><td>Урал</td></tr>
							<tr><td>21</td><td>01.04.2017</td><td>Спартак</td><td>-</td><td>-</td><td>Оренбург</td></tr>
							<tr><td>21</td><td>01.04.2017</td><td>Арсенал</td><td>-</td><td>-</td><td>Томь</td></tr>
							<tr><td>21</td><td>01.04.2017</td><td>Амкар</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>21</td><td>01.04.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Крылья Советов</td></tr>
							<tr><td>21</td><td>01.04.2017</td><td>Ростов</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>21</td><td>01.04.2017</td><td>Уфа</td><td>-</td><td>-</td><td>Локомотив</td></tr>
							<tr><td>22</td><td>07.04.2017</td><td>Зенит</td><td>-</td><td>-</td><td>Анжи</td></tr>
							<tr><td>22</td><td>07.04.2017</td><td>Урал</td><td>-</td><td>-</td><td>Оренбург</td></tr>
							<tr><td>22</td><td>08.04.2017</td><td>Уфа</td><td>-</td><td>-</td><td>Спартак</td></tr>
							<tr><td>22</td><td>08.04.2017</td><td>Томь</td><td>-</td><td>-</td><td>Рубин</td></tr>
							<tr><td>22</td><td>08.04.2017</td><td>Терек</td><td>-</td><td>-</td><td>Арсенал</td></tr>
							<tr><td>22</td><td>08.04.2017</td><td>Крылья Советов</td><td>-</td><td>-</td><td>Амкар</td></tr>
							<tr><td>22</td><td>08.04.2017</td><td>Краснодар</td><td>-</td><td>-</td><td>ЦСКА</td></tr>
							<tr><td>22</td><td>08.04.2017</td><td>Локомотив</td><td>-</td><td>-</td><td>Ростов</td></tr>
							<tr><td>23</td><td>14.04.2017</td><td>Рубин</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>23</td><td>14.04.2017</td><td>Анжи</td><td>-</td><td>-</td><td>Крылья Советов</td></tr>
							<tr><td>23</td><td>14.04.2017</td><td>Оренбург</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>23</td><td>14.04.2017</td><td>Арсенал</td><td>-</td><td>-</td><td>Локомотив</td></tr>
							<tr><td>23</td><td>14.04.2017</td><td>Урал</td><td>-</td><td>-</td><td>Томь</td></tr>
							<tr><td>23</td><td>14.04.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Ростов</td></tr>
							<tr><td>23</td><td>14.04.2017</td><td>Амкар</td><td>-</td><td>-</td><td>Уфа</td></tr>
							<tr><td>23</td><td>15.04.2017</td><td>Спартак</td><td>-</td><td>-</td><td>Зенит</td></tr>
							<tr><td>24</td><td>21.04.2017</td><td>Зенит</td><td>-</td><td>-</td><td>Урал</td></tr>
							<tr><td>24</td><td>22.04.2017</td><td>Ростов</td><td>-</td><td>-</td><td>Спартак</td></tr>
							<tr><td>24</td><td>22.04.2017</td><td>Крылья Советов</td><td>-</td><td>-</td><td>Рубин</td></tr>
							<tr><td>24</td><td>22.04.2017</td><td>Терек</td><td>-</td><td>-</td><td>Анжи</td></tr>
							<tr><td>24</td><td>22.04.2017</td><td>Томь</td><td>-</td><td>-</td><td>Оренбург</td></tr>
							<tr><td>24</td><td>22.04.2017</td><td>Краснодар</td><td>-</td><td>-</td><td>Арсенал</td></tr>
							<tr><td>24</td><td>22.04.2017</td><td>Локомотив</td><td>-</td><td>-</td><td>Амкар</td></tr>
							<tr><td>24</td><td>22.04.2017</td><td>Уфа</td><td>-</td><td>-</td><td>ЦСКА</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>Спартак</td><td>-</td><td>-</td><td>Урал</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>Рубин</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>Анжи</td><td>-</td><td>-</td><td>Томь</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>Оренбург</td><td>-</td><td>-</td><td>Зенит</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>Ростов</td><td>-</td><td>-</td><td>Уфа</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>Арсенал</td><td>-</td><td>-</td><td>Крылья Советов</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>Амкар</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>25</td><td>26.04.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Локомотив</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Спартак</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>Локомотив</td><td>-</td><td>-</td><td>Рубин</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>Краснодар</td><td>-</td><td>-</td><td>Анжи</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>Крылья Советов</td><td>-</td><td>-</td><td>Оренбург</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>Терек</td><td>-</td><td>-</td><td>Урал</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>Томь</td><td>-</td><td>-</td><td>Зенит</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>Уфа</td><td>-</td><td>-</td><td>Арсенал</td></tr>
							<tr><td>26</td><td>29.04.2017</td><td>Ростов</td><td>-</td><td>-</td><td>Амкар</td></tr>
							<tr><td>27</td><td>05.05.2017</td><td>Урал</td><td>-</td><td>-</td><td>Крылья Советов</td></tr>
							<tr><td>27</td><td>05.05.2017</td><td>Зенит</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>27</td><td>06.05.2017</td><td>Спартак</td><td>-</td><td>-</td><td>Томь</td></tr>
							<tr><td>27</td><td>06.05.2017</td><td>Рубин</td><td>-</td><td>-</td><td>Уфа</td></tr>
							<tr><td>27</td><td>06.05.2017</td><td>Анжи</td><td>-</td><td>-</td><td>Локомотив</td></tr>
							<tr><td>27</td><td>06.05.2017</td><td>Оренбург</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>27</td><td>06.05.2017</td><td>Арсенал</td><td>-</td><td>-</td><td>Ростов</td></tr>
							<tr><td>27</td><td>06.05.2017</td><td>Амкар</td><td>-</td><td>-</td><td>ЦСКА</td></tr>
							<tr><td>28</td><td>12.05.2017</td><td>Урал</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>28</td><td>12.05.2017</td><td>Томь</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>28</td><td>12.05.2017</td><td>Крылья Советов</td><td>-</td><td>-</td><td>Зенит</td></tr>
							<tr><td>28</td><td>13.05.2017</td><td>Амкар</td><td>-</td><td>-</td><td>Спартак</td></tr>
							<tr><td>28</td><td>13.05.2017</td><td>Ростов</td><td>-</td><td>-</td><td>Рубин</td></tr>
							<tr><td>28</td><td>13.05.2017</td><td>Уфа</td><td>-</td><td>-</td><td>Анжи</td></tr>
							<tr><td>28</td><td>13.05.2017</td><td>Локомотив</td><td>-</td><td>-</td><td>Оренбург</td></tr>
							<tr><td>28</td><td>13.05.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Арсенал</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Спартак</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Рубин</td><td>-</td><td>-</td><td>ЦСКА</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Анжи</td><td>-</td><td>-</td><td>Ростов</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Оренбург</td><td>-</td><td>-</td><td>Уфа</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Урал</td><td>-</td><td>-</td><td>Локомотив</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Зенит</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Томь</td><td>-</td><td>-</td><td>Крылья Советов</td></tr>
							<tr><td>29</td><td>17.05.2017</td><td>Арсенал</td><td>-</td><td>-</td><td>Амкар</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>Арсенал</td><td>-</td><td>-</td><td>Спартак</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>Амкар</td><td>-</td><td>-</td><td>Рубин</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>ЦСКА</td><td>-</td><td>-</td><td>Анжи</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>Оренбург</td><td>-</td><td>-</td><td>Ростов</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>Уфа</td><td>-</td><td>-</td><td>Урал</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>Томь</td><td>-</td><td>-</td><td>Краснодар</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>Крылья Советов</td><td>-</td><td>-</td><td>Терек</td></tr>
							<tr><td>30</td><td>21.05.2017</td><td>Локомотив</td><td>-</td><td>-</td><td>Зенит</td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row gutter-xs" id="content2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title fw-l">
						Смотреть онлайн АДО Ден Хааг - Витесс прямая видео трансляция on-line
					</h2>
				</div>
				<div class="card-body">
					<div class="row gutter-xs">
						<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
							<div class="row gutter-xs text-center">
								<div class="col-xs-4 col-sm-4 col-md-4">
									<img class="img-responsive" src="http://liga-fifa.ru/sys/img/logo/ado_den_haag.gif" alt="img">
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4">
									<span class="badge badge-outline-info">Vs</span>
									<br>
									<span class="badge badge-danger">OFFLINE</span>
									<br>
									<span class="badge badge-success">ONLINE</span>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4">
									<img class="img-responsive" src="http://liga-fifa.ru/sys/img/logo/vitess.gif" alt="img">
								</div>
							</div>
						</div>
					</div>
					<div class="row gutter-xs">
						<div class="col-md-12 text-center">
							<p>Начало 2017-02-03 в 22:00 | Чемпионат Голандии. АДО Ден Хааг - Витесс онлайн</p>
							<p>Матч АДО Ден Хааг - Витесс в HD, посмотрело 11 человек(а)</p>
							<p>Смотреть онлайн АДО Ден Хааг - Витесс | Прямая видео трансляция матча АДО Ден Хааг - Витесс</p>
						</div>
						<div class="col-md-12">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#chanel1">Канал 1</a></li>
								<li><a data-toggle="tab" href="#chanel2">Канал 2</a></li>
								<li><a data-toggle="tab" href="#chanel3">Канал 3</a></li>
								<li><a data-toggle="tab" href="#chanel4">Канал 4</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										Торрент
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu">
										<li><a data-toggle="tab" href="#torrent1">Торрент 1</a></li>
										<li><a data-toggle="tab" href="#torrent2">Торрент 2</a></li>
									</ul>
								</li>
							</ul>
							<div class="tab-content text-center">
								<div role="tabpanel" id="chanel1" class="tab-pane fade in active">канал 1</div>
								<div role="tabpanel" id="chanel2" class="tab-pane fade"><iframe width="100%" height="480" src="https://www.youtube.com/embed/2CrQgLQg5hE" frameborder="0" allowfullscreen></iframe></div>
								<div role="tabpanel" id="chanel3" class="tab-pane fade"><iframe width="100%" height="480" src="https://www.youtube.com/embed/0T3Uf6s85Vw" frameborder="0" allowfullscreen></iframe></div>
								<div role="tabpanel" id="chanel4" class="tab-pane fade"><iframe width="100%" height="480" src="https://www.youtube.com/embed/k3yRfEw1pYk" frameborder="0" allowfullscreen></iframe></div>
								<div role="tabpanel" id="torrent1" class="tab-pane fade">Торрент 1</div>
								<div role="tabpanel" id="torrent2" class="tab-pane fade">Торрент 2</div>
							</div>
						</div>
						<div class="col-md-12 tags">
							<i><span class="icon icon-tags"></span> <a href="#">pariatur</a>,<a href="#">vero</a>,<a href="#">distinctio</a>,<a href="#">quos</a></i>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="pull-left">
						<small>
							<span class="icon icon-folder"></span> Видео Обзоры
							<span class="icon icon-calendar"></span> 22 Янв
							<span class="icon icon-eye"></span> 325
							<span class="icon icon-comment"></span> 22
						</small>
					</div>
					<div class="pull-right">
						<div class="pluso" data-background="transparent" data-options="small,round,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="card related">
				<div class="card-header text-center">
					<strong class="card-title">Похожие материалы</strong>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row gutter-xs" id="content3">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title fw-l">
						10 things not to miss in San Francisco
					</h2>
				</div>
				<div class="card-body">
					<div class="row gutter-xs">
						<div class="col-md-12">
							<div class="row gutter-xs">
								<div class="col-sm-4 col-md-4">
									<img class="img-responsive" src="img/7943544458.jpg" alt="Golden Gate Bridge, San Francisco">
								</div>
								<div class="col-sm-8 col-md-8">
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
										pariatur vero sequi distinctio non eum qui soluta saepe.Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
										pariatur vero sequi distinctio non eum qui soluta saepe.Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
										pariatur vero sequi distinctio non eum qui soluta saepe.Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
										pariatur vero sequi distinctio non eum qui soluta saepe.…
									</small>
								</div>
							</div>
						</div>
						<div class="col-md-12 tags">
							<i><span class="icon icon-tags"></span> <a href="#">pariatur</a>,<a href="#">vero</a>,<a href="#">distinctio</a>,<a href="#">quos</a></i>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<small>
						<span class="icon icon-folder"></span> Видео Обзоры
						<span class="icon icon-calendar"></span> 22 Янв
						<span class="icon icon-eye"></span> 325
						<span class="icon icon-comment"></span> 22
					</small>
				</div>
			</div>
			<div class="card related">
				<div class="card-header text-center">
					<strong class="card-title">Похожие материалы</strong>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title fw-l">
										<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
									</h4>
									<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur vero sequi distinctio non eum qui soluta saepe…</small>
								</div>
								<div class="card-footer">
									<small>
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-calendar"></span> 22 Янв
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection