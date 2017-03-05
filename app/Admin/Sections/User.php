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
 * Class User
 *
 * @property \App\Models\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class User extends Section
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
    protected $title = "Пользователи";

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
			->setColumns([
				AdminColumn::link('id', '#')->setWidth('30px'),
				AdminColumn::link('first_name')->setLabel('Имя'),
				AdminColumn::text('last_name')->setLabel('Фамилия'),
				AdminColumn::email('email')->setLabel('Email')->setWidth('150px'),
			])->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
		if ($id) {
			$form = AdminForm::panel()->addBody([
				AdminFormElement::text('first_name', 'Имя'),
				AdminFormElement::text('last_name', 'Фамилия'),
				AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
				AdminFormElement::multiselect('roles', 'Роли')
					->setModelForOptions('App\Models\Role')
					->setDisplay('name'),
			]);
		}else{
			$form = AdminForm::panel()->addBody([
				AdminFormElement::text('first_name', 'Имя'),
				AdminFormElement::text('last_name', 'Фамилия'),
				AdminFormElement::password('password', 'New Password')->required()->addValidationRule('min:6'),
				AdminFormElement::password('password_confirm', 'Confirm New Password')->required()->addValidationRule('min:6')->addValidationRule('same:password'),
				AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
				AdminFormElement::multiselect('roles', 'Роли')
					->setModelForOptions('App\Models\Role')
					->setDisplay('name'),
			]);
		}
		if ($id){
			$form->addFooter([
				'<a href="/'.config('sleeping_owl.url_prefix').'/users/change-password/'.$id.'/edit">Изменить пароль</a>'
			]);
		}
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
