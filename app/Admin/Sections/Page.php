<?php

namespace App\Admin\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Page
 *
 * @property \App\Models\Page $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Page extends Section
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
    protected $title = "Страницы";

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
		return AdminDisplay::tree()->setValue('name');
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
		return AdminForm::panel()->addBody([
			AdminFormElement::checkbox('status', 'Активность')->setDefaultValue(true),
			AdminFormElement::text('name', 'Название')->required(),
			AdminFormElement::text('slug', 'Символьный код (Заполняется автоматически)')->unique(),
			AdminFormElement::wysiwyg('content', 'Контент'),
			AdminFormElement::select('parent_id', 'Родитель', \App\Models\Page::class)
				->setLoadOptionsQueryPreparer(function ($element, $query) {
					return $query
						->where('id', '!=', $element->getModel()->id);
				})
				->setDisplay('name')
				->nullable(),
			AdminFormElement::number('order', 'Сортировка')->setDefaultValue(100),
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
