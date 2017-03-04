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
	protected $title = "Файлы";

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
			AdminColumn::link('id', '#')->setWidth('10px'),
			AdminColumn::text('type', 'Type'),
			AdminColumn::text('downloads', 'Downloads')->setWidth('10px')
		);
		$display->paginate(20);
		$display->setColumnFilters([
			null,
			AdminColumnFilter::select()
				->setPlaceholder('Тип')
				->setOptions(['url' => 'Ссылка', 'file' => 'Файл']),
			null,
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
		return AdminForm::panel()
			->addBody([
				AdminFormElement::radio(
					'type',
					'Тип',
					['url' => 'Ссылка', 'file' => 'Файл']
				),
				AdminFormElement::text('url', 'Url')->unique(),
				AdminFormElement::hidden('load_id'),
			])
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
