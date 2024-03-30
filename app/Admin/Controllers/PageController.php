<?php

namespace App\Admin\Controllers;

use App\Models\Deceased;
use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Page';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());

        $grid->column('id', __('Id'));
        $grid->column('page', __('Page'));
        $grid->column('data', __('Data'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Page::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('page', __('page'));
        $show->field('data', __('data'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $infoCount = Deceased::get()->count();

        $page = Page::query()->first() ?? Page::create(['page' => '']);
        $arr = $page->data;
        $arr['countPages_banner_1'] = $infoCount;
        $page->data = $arr;
        $page->save();

        $form = new Form($page);

        $form->tab('Basic info', function ($form) {

            $form->embeds('data', function ($form) {
                $form->text('title')->rules('required|string|min:3');
                //$form->email('email_1')->rules('required|email');
                //$form->mobile('phone_1')->rules('required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10');
            });

        })->tab('Banner_1', function ($form) use ($infoCount) {

            $form->image('bg_image_banner_1')->uniqueName()->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('qr_code_image_banner_1')->uniqueName()->rules('image|mimes:png,jpg,gif|max:2048');

            $form->embeds('data', function ($form) use ($infoCount) {
                $form->text('title_banner_1')->rules('required|string|min:3');
                $form->text('text_banner_1')->rules('required|string|min:3');
                $form->text('countPagesText_banner_1')->rules('required|string|min:1');
                $form->text('button_banner_1')->rules('required|string|min:1');
            });

        })->tab('video_review', function ($form) {

            $form->file('video_review_2')->rules('mimes:mp4|max:1000000');

            $form->embeds('data', function ($form) {
                $form->text('title_video_review_2')->rules('required|string|min:3');
            });

        })->tab('description', function ($form) {

            $form->image('image_description_3')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('image_description_4')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('image_description_5')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('image_description_6')->rules('image|mimes:png,jpg,gif|max:2048');

            $form->embeds('data', function ($form) {
                $form->text('title_description_2')->rules('required|string|min:3');
                $form->text('text_description_2')->rules('required|string|min:3');

                $form->text('title_description_3')->rules('required|string|min:3');
                $form->text('description_3')->rules('required|string|min:3');

                $form->text('title_description_4')->rules('required|string|min:3');
                $form->text('description_4')->rules('required|string|min:3');

                $form->text('title_description_5')->rules('required|string|min:3');
                $form->text('description_5')->rules('required|string|min:3');

                $form->text('title_description_6')->rules('required|string|min:3');
                $form->text('description_6')->rules('required|string|min:3');
            });

        })->tab('Banner_2', function ($form) {

            $form->image('image_banner_2_1')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('qr_code_banner_1_1')->rules('image|mimes:png,jpg,gif|max:2048');

            $form->embeds('data', function ($form) {
                $form->text('title_banner_2_1')->rules('required|string|min:3');

                $form->text('text_banner_3_1')->rules('required|string|min:3');
                $form->text('text_banner_4_1')->rules('required|string|min:3');
                $form->text('text_banner_5_1')->rules('required|string|min:3');
                $form->text('text_banner_6_1')->rules('required|string|min:3');
            });


        })->tab('Banner_3', function ($form) {

            $form->image('image_banner_3_1')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('qr_code_banner_2_1')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('image_banner_1_1')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('image_banner_2_2')->rules('image|mimes:png,jpg,gif|max:2048');
            $form->image('image_banner_3_3')->rules('image|mimes:png,jpg,gif|max:2048');

            $form->embeds('data', function ($form) {
                $form->text('title_banner_3_1')->rules('required|string|min:3');

                $form->text('text_banner_1_1')->rules('required|string|min:3');

                $form->text('text_banner_2_2')->rules('required|string|min:3');

                $form->text('text_banner_3_3')->rules('required|string|min:3');
            });

        })->tab('Rating', function ($form) {

            $form->embeds('data', function ($form) {
                $form->text('rating_title_1')->rules('required|string|min:3');
                $form->text('rating_text_1')->rules('required|string|min:3');
            });

        })->tab('Company', function ($form) {

            $form->embeds('data', function ($form) {
                $form->text('company_title_1')->rules('required|string|min:3');
                $form->text('company_text_1')->rules('required|string|min:3');
            });
        })->tab('Ceo', function ($form) {

            $form->embeds('data', function ($form) {
                $form->text('title_ceo')->rules('required|string|min:1');
                $form->text('description_ceo')->rules('required|string|min:3');
                $form->text('h1_ceo')->rules('required|string|min:1');
            });
        });;

        return $form;
    }
}
