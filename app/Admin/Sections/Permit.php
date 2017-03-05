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
 * Class Permit
 *
 * @property \App\Models\Permit $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Permit extends Section
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
    protected $alias = "users/permits";

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
		return AdminForm::panel()->addBody([
			AdminFormElement::text('name', 'Название'),
			AdminFormElement::text('slug', 'Символьный код'),
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
