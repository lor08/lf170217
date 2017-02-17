<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminFormElement;
use AdminDisplay;
use AdminColumn;
use AdminForm;

/**
 * Class Country
 *
 * @property \App\Models\Country $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Country extends Section
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
	protected $title = "Страны";

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		return AdminDisplay::table()
			->setHtmlAttribute('class', 'table-primary')
			->setColumns(
				AdminColumn::text('id', '#')->setWidth('30px'),
				AdminColumn::image('logo', 'Logo')->setImageWidth('100px')->setWidth('100px'),
				AdminColumn::link('name', 'Name')->setWidth('100px')
			)->paginate(20);
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		return AdminForm::panel()->addBody([
			AdminFormElement::text('name', 'Name')->required(),
			AdminFormElement::text('slug', 'Slug')->unique(),
			AdminFormElement::image('logo', 'Logo')->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
				return 'country';
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
