<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Video
 *
 * @property \App\Models\Video $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Video extends Section
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
    protected $title = "Видео";

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
		$display = AdminDisplay::datatablesAsync()->setHtmlAttribute('class', 'table-info table-hover table-primary');
		$display->with(['categories']);
		$display->setColumns(
			AdminColumn::link('id', '#')->setWidth('30px'),
			AdminColumn::link('name', 'Name'),

			AdminColumn::lists('categories.name', 'Category')->setWidth('300px'),
			AdminColumn::custom('Status', function ($instance) {
				return $instance->status ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
			})->setHtmlAttribute('class', 'text-center')->setWidth('50px'),
			AdminColumn::text('status', 'Status')->setWidth('30px'),
			AdminColumn::text('views', 'Views')->setWidth('30px'),

			AdminColumn::datetime('created_at', 'created_at')->setFormat('d.m.Y H:i')->setWidth('150px'),
			AdminColumn::datetime('updated_at', 'updated_at')->setFormat('d.m.Y H:i')->setWidth('150px')
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
		$form = AdminForm::panel();
		$tabs = AdminDisplay::tabbed([
			'Видео' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::checkbox('status', 'Активность')->setDefaultValue(true),
				AdminFormElement::text('name', 'Название')->required(),
				AdminFormElement::multiselect('categories', 'Category', \App\Models\Category::class)
					->setDisplay('name')
					->setLoadOptionsQueryPreparer(function ($element, $query) use ($cat_id) {
						return $query
							->where('id', $cat_id['CategoryIdVideo'])
							->orWhere('parent_id', $cat_id['CategoryIdVideo']);
					}),
				AdminFormElement::text('slug', 'Символьный код (Заполняется автоматически)')->unique(),
				AdminFormElement::multiselect('tags', 'Теги', \App\Models\Tag::class)->setDisplay('name')->taggable(),
				AdminFormElement::hidden('match_id'),
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
