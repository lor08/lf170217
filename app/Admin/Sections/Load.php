<?php

namespace App\Admin\Sections;

use AdminSection;
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
class Load extends Section
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
		$display->with(['categories']);
		$display->setColumns(
			AdminColumn::text('id', '#')->setWidth('30px'),
			AdminColumn::link('name', 'Name'),
			AdminColumn::lists('categories.name', 'Category')->setWidth('300px'),
			AdminColumn::text('status', 'Status')->setWidth('100px'),
			AdminColumn::text('views', 'Views')->setWidth('50px'),
//			AdminColumn::text('downloads', 'Downloads')->setWidth('50px'),
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
		$cat_id = config('liga-fifa');
		$tabs = AdminDisplay::tabbed();
		$tabs->setTabs(function () use ($id, $cat_id) {
			$tabs = [];
			$form = AdminForm::panel()
				->addBody([
					AdminFormElement::columns()
						->addColumn([
							AdminFormElement::text('name', 'Name')->required(),
							AdminFormElement::text('slug', 'Slug')->unique(),
							AdminFormElement::text('status', 'Status')->setDefaultValue(0),
							AdminFormElement::multiselect('categories', 'Category', \App\Models\Category::class)
								->setDisplay('name')
								->setLoadOptionsQueryPreparer(function ($element, $query) use ($cat_id) {
									return $query
										->where('id', $cat_id['CategoryIdDownloads'])
										->orWhere('parent_id', $cat_id['CategoryIdDownloads']);
								}),
							AdminFormElement::multiselect('tags', 'Теги', \App\Models\Tag::class)->setDisplay('name')->taggable(),
//							AdminFormElement::select('category_id', 'Category', \App\Models\Country::class)->setDisplay('name'),
//							AdminFormElement::text('category_id', 'Category'),
						])
				]);
			$tabs[] = AdminDisplay::tab($form, 'Загрузка')->setIcon('<i class="fa fa-download"></i>');

			if (!is_null($id)) {
				$files = AdminSection::getModel(\App\Models\File::class)->fireDisplay();
				$files->getScopes()->push(['withLoads', $id]);
				$files->setParameter('load_id', $id);
				$tabs[] = AdminDisplay::tab($files, 'Файлы')->setIcon('<i class="fa fa-arrow-down"></i>')->setActive();
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
		return $this->onEdit(null);
	}
}
