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
 * Class File
 *
 * @property \App\Models\File $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class File extends Section
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
	protected $title = "Загрузки";

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
		$display->setColumns(
			AdminColumn::text('id', '#')->setWidth('30px'),
			AdminColumn::link('name', 'Name'),
			AdminColumn::text('category_id', 'Category')->setWidth('300px'),
			AdminColumn::text('status', 'Status')->setWidth('100px'),
			AdminColumn::text('views', 'Views')->setWidth('50px'),
			AdminColumn::text('downloads', 'Downloads')->setWidth('50px'),
			AdminColumn::datetime('created_at', 'Created')->setFormat('d.m.Y')->setWidth('100px')
		);
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
				AdminFormElement::text('category_id', 'Category'),
				AdminFormElement::text('status', 'Status')->setDefaultValue(0),
//				AdminFormElement::select('category_id', 'Category', \App\Models\Country::class)->setDisplay('name'),
			]
		]);
		return AdminForm::panel()
			->addBody($columns)
			->addFooter([
				AdminFormElement::file('file', 'File')
					->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
						return 'uploads/files';
					})
					->setUploadFileName(function (\Illuminate\Http\UploadedFile $file) {
						return $file->getClientOriginalName() . "-" . time() . '.' . $file->getClientOriginalExtension();
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
