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
 * Class Role
 *
 * @property \App\Models\Role $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Role extends Section
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
    protected $title = "Права";

    /**
     * @var string
     */
    protected $alias = "users/roles";

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
		return AdminDisplay::table()
			->setColumns([
				AdminColumn::link('id')->setLabel('ID'),
				AdminColumn::link('name')->setLabel('Название'),
				AdminColumn::text('slug')->setLabel('Символьный код'),
				AdminColumn::datetime('updated_at')->setFormat('d.m.Y')->setLabel('Обновлен'),
			])->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
		return AdminForm::panel()->addBody(array(
			AdminFormElement::text('name', 'Название'),
			AdminFormElement::text('slug', 'Символьный код')->setReadOnly(function ($model) {
				return in_array($model->id, array(1, 2, 3, 4));
			}),
			AdminFormElement::multiselect('permits', 'Права')
				->setModelForOptions('App\Models\Permit')
				->setDisplay('name'),
		));
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
