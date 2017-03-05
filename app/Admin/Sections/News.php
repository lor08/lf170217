<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class News
 *
 * @property \App\Models\News $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class News extends Section
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
	protected $title = "Новости";

	/**
	 * @var string
	 */
	protected $alias = "news";

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		return AdminDisplay::table()
			->setApply(function ($query) {
				$query->orderBy('id', 'DESC');
			})
			->setColumns([
				AdminColumn::text('id', 'ID'),
				AdminColumn::link('name', 'Название'),
				AdminColumn::datetime('updated_at', 'Обновлен')->setFormat('d.m.Y H:i')->setWidth('150px'),
				AdminColumn::text('views', 'Просмотров'),
				AdminColumnEditable::checkbox('status', 'Активирован'),
			])->paginate(20);
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		$cat_id = config('liga-fifa');
		$form = AdminForm::panel();
		$tabs = AdminDisplay::tabbed([
			'Новость' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::checkbox('status', 'Активность')->setDefaultValue(true),
				AdminFormElement::text('name', 'Название')->required(),
				AdminFormElement::multiselect('categories', 'Category', \App\Models\Category::class)
					->setDisplay('name')
					->setLoadOptionsQueryPreparer(function ($element, $query) use ($cat_id) {
						return $query
							->where('id', $cat_id['CategoryIdNews'])
							->orWhere('parent_id', $cat_id['CategoryIdNews']);
					}),
//				AdminFormElement::multiselect('categories', 'Категория')->setModelForOptions('App\Models\NewsCategory')->setDisplay('name'),
				AdminFormElement::text('slug', 'Символьный код (Заполняется автоматически)')->unique(),
				AdminFormElement::number('sort', 'Сортировка')->setDefaultValue(100),
				AdminFormElement::multiselect('tags', 'Теги', \App\Models\Tag::class)->setDisplay('name')->taggable()
			]),
			'Аннонс' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::wysiwyg('preview_text', 'Описание для анонса'),
				AdminFormElement::image('preview_img', 'Картинка для анонса'),
			]),
			'Подробно' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::wysiwyg('detail_text', 'Детальное описание'),
				AdminFormElement::image('detail_img', 'Детальная картинка'),
			]),
		]);
		$form->addElement($tabs);
		return $form;
	}

	/**
	 * @return FormInterface
	 */
	public function onCreate()
	{
		return $this->onEdit(null);
	}
}
