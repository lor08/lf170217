<?php

namespace App\Admin\Sections;

use Carbon\Carbon;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumnEditable;
use AdminDisplayFilter;
use AdminColumnFilter;
use AdminFormElement;
use AdminSection;
use AdminDisplay;
use AdminColumn;
use AdminForm;

/**
 * Class Match
 *
 * @property \App\Models\Match $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Match extends Section
{
	/**
	 * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
	 *
	 * @var bool
	 */
	protected $checkAccess = false;

	/**
	 * @var string
	 */
	protected $title = "Матчи";

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		$display = AdminDisplay::datatablesAsync()->setHtmlAttribute('class', 'table-primary');
		$display->getApply()->push(function ($query) {
			$now = Carbon::now()->format("Y-m-d");
			$tomorrow = Carbon::tomorrow()->addDay()->format("Y-m-d");
			$query->whereBetween('datetime', [$now, $tomorrow])->orderBy('datetime');
		});
		$display->with(['league', 'teamHome', 'teamGuest']);
		$display->setColumnFilters([
			null,
			AdminColumnFilter::select(\App\Models\League::class, 'name')->setPlaceholder('League'),
			null,

			AdminColumnFilter::select(\App\Models\Club::class, 'name')->setPlaceholder('teamHome'),
			null,
			null,
			AdminColumnFilter::select(\App\Models\Club::class, 'name')->setPlaceholder('teamGuest'),
			AdminColumnFilter::range()
				->setFrom(
					AdminColumnFilter::date()->setPlaceholder('From Date')->setFormat('d.m.Y')
				)->setTo(
					AdminColumnFilter::date()->setPlaceholder('To Date')->setFormat('d.m.Y')
				),
			null
		]);
		$display->setColumns(
			AdminColumn::text('id', '#')->setWidth('30px'),
			AdminColumn::text('league.name', 'Лига')->setWidth('300px'),
			AdminColumn::text('stage', 'Этап\Тур')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),

			AdminColumn::link('teamHome.name', 'Хозяева')->setWidth('300px')->setHtmlAttribute('class', 'text-left'),
			AdminColumn::link('resHome', 'resHome')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),
			AdminColumn::link('resGuest', 'resGuest')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),
			AdminColumn::link('teamGuest.name', 'Гости')->setWidth('300px')->setHtmlAttribute('class', 'text-right'),

			AdminColumn::datetime('datetime', 'Время')->setFormat('d.m.Y H:i')->setWidth('150px'),
			AdminColumn::text('views', 'Просмотры')->setHtmlAttribute('class', 'text-center')->setWidth('30px')
		);
		return $display;
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id, $columns_head = false)
	{
		$tabs = AdminDisplay::tabbed();
		$tabs->setTabs(function () use ($id, $columns_head) {
			$tabs = [];
			$form = AdminForm::panel();
			if (!$columns_head) {
				$columns_head = AdminFormElement::columns([
					array(
						AdminFormElement::select('country_id', 'Country', \App\Models\Country::class)->setDisplay('name')->setReadonly(true)
					),
					array(
						AdminFormElement::select('league_id', 'League', \App\Models\League::class)->setDisplay('name')
					),
					array(
						AdminFormElement::select('year_id', 'Year', \App\Models\LeagueYear::class)->setDisplay('name')
					)
				]);
			}
			$form->addHeader($columns_head);
			$form->addBody([
				AdminFormElement::columns()
					->addColumn([
						AdminFormElement::text('stage', 'stage'),
						AdminFormElement::dependentselect('teamHome_id', 'teamHome')
							->setModelForOptions(\App\Models\Club::class, 'name')
							->setDataDepends(['league_id'])
							->setLoadOptionsQueryPreparer(function ($item, $query) {
								return $query->where('league_id', $item->getDependValue('league_id'));
							})
							->setDisplay('name'),
						AdminFormElement::dependentselect('teamGuest_id', 'teamGuest')
							->setModelForOptions(\App\Models\Club::class, 'name')
							->setDataDepends(['league_id'])
							->setLoadOptionsQueryPreparer(function ($item, $query) {
								return $query->where('league_id', $item->getDependValue('league_id'));
							})
							->setDisplay('name'),
						AdminFormElement::text('slug', 'Slug')->unique(),
						AdminFormElement::text('resHome', 'resHome'),
						AdminFormElement::text('resGuest', 'resGuest'),
					], 4)
					->addColumn([
						AdminFormElement::datetime('datetime', 'datetime'),
						AdminFormElement::textarea('announce', 'announce'),
					], 4)
			]);
			$tabs[] = AdminDisplay::tab($form, 'Матч')->setIcon('<i class="fa fa-credit-card"></i>');
			$tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::view("admin.test")
			]))->setLabel('Граббер');

			if (! is_null($id)) {
				$companies = AdminSection::getModel(\App\Models\Chanel::class)->fireDisplay();
				$companies->getScopes()->push(['withMatch', $id]);
				$companies->setParameter('match_id', $id);
				$tabs[] = AdminDisplay::tab($companies, 'Каналы')->setIcon('<i class="fa fa-tv"></i>')->setActive();
			}
			return $tabs;
		});

		return $tabs;
	}

	/**
	 * @return FormInterface
	 */
	public function onCreate()
	{
		$columns = AdminFormElement::columns([
			array(
				AdminFormElement::select('country_id', 'Country', \App\Models\Country::class)->setDisplay('name')
			),
			array(
				AdminFormElement::dependentselect('league_id', 'League')
					->setModelForOptions(\App\Models\League::class, 'name')
					->setDataDepends(['country_id'])
					->setLoadOptionsQueryPreparer(function ($item, $query) {
						return $query->where('country_id', $item->getDependValue('country_id'));
					})
					->setDisplay('name')
			),
			array(
				AdminFormElement::select('year_id', 'Year', \App\Models\LeagueYear::class)->setDisplay('name')
			)
		]);
		return $this->onEdit(null, $columns);
	}
}
