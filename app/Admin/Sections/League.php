<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumnEditable;
use AdminDisplayFilter;
use AdminColumnFilter;
use AdminFormElement;
use AdminDisplay;
use AdminColumn;
use AdminForm;

/**
 * Class League
 *
 * @property \App\Models\League $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class League extends Section
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
	protected $title = "Соревнования";

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		$display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
		$display->with('country', 'year');
		$display->setFilters([
			AdminDisplayFilter::related('country_id')->setModel(\App\Models\Country::class)->setTitle('Country ID [:value]'),
			AdminDisplayFilter::related('year_id')->setModel(\App\Models\LeagueYear::class)->setTitle('Year ID [:value]')
		]);
		$display->setColumns(
			AdminColumn::text('id', '#')->setWidth('30px'),
			AdminColumn::image('logo', 'Logo')->setImageWidth('100px')->setWidth('100px'),
			AdminColumn::link('name', 'Name')->setWidth('300px'),
			AdminColumn::text('country.name', 'Country')->setWidth('300px')->append(AdminColumn::filter('country_id')),
			AdminColumn::text('year.name', 'Year')->setWidth('300px')->append(AdminColumn::filter('year_id')),
			AdminColumnEditable::checkbox('status', 'Status')->setWidth('30px')
		);
		$display->setColumnFilters([
			null,
			null,
			null,
			AdminColumnFilter::select(\App\Models\Country::class, 'name')->setPlaceholder('Country'),
			AdminColumnFilter::select(\App\Models\LeagueYear::class, 'name')->setPlaceholder('Year'),
			null,
		]);
//			->paginate(20);
		return $display;
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		$columns = AdminFormElement::columns([
			[
				AdminFormElement::checkbox('status', 'Status')->setDefaultValue(true),
				AdminFormElement::text('name', 'Name')->required(),
				AdminFormElement::text('slug', 'Slug')->unique(),
				AdminFormElement::select('country_id', 'Country', \App\Models\Country::class)->setDisplay('name'),
				AdminFormElement::select('year_id', 'Year', \App\Models\LeagueYear::class)->setDisplay('name'),
			],
			[
				AdminFormElement::date('date_start', 'Date Start'),
				AdminFormElement::date('date_end', 'Date End'),
				AdminFormElement::number('count_teams', 'Count Teams'),
			],
		]);
		return AdminForm::panel()
			->addBody($columns)
			->addFooter([
				AdminFormElement::image('logo', 'Logo')->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
					return 'league';
				})
			]);
	}

	/**
	 * @return FormInterface
	 */
	public function onCreate()
	{
		return $this->onEdit(null);
	}
}
