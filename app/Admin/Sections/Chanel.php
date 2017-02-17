<?php

namespace App\Admin\Sections;

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
 * Class Chanel
 *
 * @property \App\Models\Chanel $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Chanel extends Section
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
	protected $title = "Каналы";

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		$display = AdminDisplay::datatables();
		$display->setHtmlAttribute('class', 'table-primary');
		$display->setColumns(
			AdminColumn::text('id', '#')->setWidth('30px'),
			AdminColumn::link('type', 'type')->setWidth('100px')
		);
		$display->paginate(20);
		$display->setColumnFilters([
			null,
			AdminColumnFilter::select()
				->setPlaceholder('Тип')
				->setOptions(['sopcast' => 'сопка', 'acetream' => 'торент', 'code' => 'код', 'other' => 'другое'])
		]);
		return $display;
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		return AdminForm::panel()->addBody([
//			AdminFormElement::view('admin.grabber'),
			AdminFormElement::radio(
				'type',
				'Тип',
				['sopcast' => 'сопка', 'acetream' => 'торент', 'code' => 'код', 'other' => 'другое']
			),
			AdminFormElement::textarea('content', 'Контент')->required(),
			AdminFormElement::hidden('match_id'),
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
