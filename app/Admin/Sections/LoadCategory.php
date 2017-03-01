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
 * Class LoadCategory
 *
 * @property \App\Models\LoadCategory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class LoadCategory extends Section
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
    protected $title = "Категории Загрузок";

    /**
     * @var string
     */
    protected $alias = "categories/loads";

    /**
     * @return DisplayInterface
     */
	public function onDisplay()
	{
		return AdminDisplay::tree()
			->setValue('name')
			->setApply(function ($query) {
				$query->where('parent_id', 6);
			});
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
			AdminFormElement::select('parent_id', 'Parent_id', \App\Models\Category::class)
				->setLoadOptionsQueryPreparer(function ($element, $query) {
					return $query
						->where('id', '!=', $element->getModel()->id);
				})
				->setDisplay('name')
				->nullable(),
			AdminFormElement::text('slug', 'Slug')->unique(),

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
