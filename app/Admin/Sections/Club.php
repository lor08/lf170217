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
 * Class Club
 *
 * @property \App\Models\Club $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Club extends Section
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
    protected $title = "Команды";

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
		$display->with('league');
//		$display->setFilters([
//			AdminDisplayFilter::related('country_id')->setModel(\App\Models\Country::class)->setTitle('Country ID [:value]'),
//			AdminDisplayFilter::related('year_id')->setModel(\App\Models\LeagueYear::class)->setTitle('Year ID [:value]')
//		]);
		$display->setColumns(
			AdminColumn::text('id', '#')->setWidth('30px'),
			AdminColumn::image('logo', 'Logo')->setImageWidth('100px')->setWidth('100px'),
			AdminColumn::link('name', 'Name')->setWidth('300px'),
			AdminColumn::text('league.country.name', 'Country')->setWidth('300px'),
			AdminColumn::text('city', 'City')->setWidth('300px'),
			AdminColumn::text('league.name', 'League')->setWidth('300px'),
			AdminColumn::datetime('founded', 'Founded')->setFormat('d.m.Y')->setWidth('300px')
		);
//		$display->setColumnFilters([
//			null,
//			null,
//			null,
//			AdminColumnFilter::select(\App\Models\Country::class, 'name')->setPlaceholder('Country'),
//			AdminColumnFilter::select(\App\Models\LeagueYear::class, 'name')->setPlaceholder('Year'),
//			null,
//		]);
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
				AdminFormElement::text('name', 'Name')->required(),
				AdminFormElement::text('slug', 'Slug')->unique(),

				AdminFormElement::select('country_id', 'Country', \App\Models\Country::class)->setDisplay('name'),
				AdminFormElement::dependentselect('league_id', 'League')
					->setModelForOptions(\App\Models\League::class, 'name')
					->setDataDepends(['country_id'])
					->setLoadOptionsQueryPreparer(function($item, $query) {
						return $query->where('country_id', $item->getDependValue('country_id'));
					})
					->setDisplay('name'),
				AdminFormElement::multiselect('leagues', 'League', \App\Models\League::class)->setDisplay('name'),
			],
			[
				AdminFormElement::text('city', 'City'),
				AdminFormElement::text('coach', 'Coach'),
				AdminFormElement::text('stadium', 'Stadium'),
				AdminFormElement::text('owner', 'Owner'),
				AdminFormElement::text('captain', 'Captain'),
				AdminFormElement::text('site', 'Site'),
				AdminFormElement::date('founded', 'Founded'),
			],
		]);
		return AdminForm::panel()
			->addBody($columns)
			->addFooter([
				AdminFormElement::image('logo', 'Logo')
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
