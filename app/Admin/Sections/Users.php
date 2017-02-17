<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Form\Element\Html;
use SleepingOwl\Admin\Section;
use AdminFormElement;
use AdminDisplay;
use AdminColumn;
use AdminForm;

/**
 * Class Users
 *
 * @property \App\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section
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
	protected $title;

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @param \SleepingOwl\Admin\Admin $admin
	 */
//	public function boot(\SleepingOwl\Admin\Admin $admin)
//	{
//		parent::boot($admin);
//
//		$this->registerMediaPackages();
//	}

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		return AdminDisplay::table()
			->setHtmlAttribute('class', 'table-primary')
			->setColumns(
				AdminColumn::text('id', '#')->setWidth('30px'),
				AdminColumn::link('name', 'Name')->setWidth('100px'),
				AdminColumn::link('email', 'Email')->setWidth('100px')
			)->paginate(20);
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		$form = AdminForm::form()->setElements([
			AdminFormElement::text('name', 'Name')->required(),
			AdminFormElement::text('email', 'Email')->required(),
			AdminFormElement::text('password', 'Email')->setDefaultValue("ddd")
		]);
		$tabs = AdminDisplay::tabbed();
		$tabs->setTabs(function ($id) use ($form) {
			$tabs = [];

			$tabs[] = AdminDisplay::tab($form)->setLabel('Материал');

			$js = <<< JS
function getCodeData(input) {
	var inData = $('[name=url_' + input +']');
	var	outData = $('[name=code_' + input +']');
	outData.html( inData.val() );
	// console.info(inData.val(), outData);
}
JS;
			$html = <<< HTML
<button name="grabber_one" class="btn btn-primary" onclick="getCodeData('one')">Пиздить Раз</button>
<button name="grabber_one" class="btn btn-primary" onclick="getCodeData('two')">Пиздить Два</button>
<button name="grabber_one" class="btn btn-primary" onclick="getCodeData('free')">Пиздить Три</button>
HTML;

			$tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::html('<script  type="text/javascript">' . $js . '</script>'),
				AdminFormElement::text('url_one', 'Первая ссылка')->required(),
				AdminFormElement::textarea('code_one', 'Полученный результат'),
				AdminFormElement::html($html),
			]))->setLabel('gooool.org');
			$tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::text('url_two', 'Вторая ссылка')->required(),
				AdminFormElement::textarea('code_two', 'Полученный результат'),
				AdminFormElement::html($html),
			]))->setLabel('gooool.org 2');
			$tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::text('url_free', 'Вторая ссылка')->required(),
				AdminFormElement::textarea('code_free', 'Полученный результат'),
				AdminFormElement::html($html),
			]))->setLabel('Чампионат Новости');
			$tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::view("admin.test")
			]))->setLabel('Тестовая хуйня')->setActive();

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

//	private function registerMediaPackages()
//	{
//		PackageManager::add('front.controllers')
//			->js(null, resources_url('js/app.js'));
//	}
}
