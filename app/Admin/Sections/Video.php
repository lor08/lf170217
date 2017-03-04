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
		return AdminForm::panel()->addBody([
			AdminFormElement::text('name', 'Name')->required(),
			AdminFormElement::text('slug', 'slug')->unique(),
			AdminFormElement::multiselect('categories', 'Category', \App\Models\Category::class)
				->setDisplay('name')
				->setLoadOptionsQueryPreparer(function ($element, $query) use ($cat_id) {
					return $query
						->where('id', $cat_id['CategoryIdVideo'])
						->orWhere('parent_id', $cat_id['CategoryIdVideo']);
				}),
			AdminFormElement::select(
				'status',
				'Status',
				[1 => 'on', 0 => 'off',]
			)->setDefaultValue('on'),
			AdminFormElement::textarea('announce', 'announce'),
			AdminFormElement::textarea('detail', 'detail'),
			AdminFormElement::hidden('match_id'),
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
