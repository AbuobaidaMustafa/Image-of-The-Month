<?php

namespace App\Orchid\Screens\Photo;

use App\Orchid\Layouts\PhotoListLayout;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PhotoListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Photo Garlley list';
    public $description = 'You can Add and Explore the Photos from here';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'photos' => Photo::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
           Link::make('Create New')
           ->icon('plus')
           ->route('platform.photo.edit'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            PhotoListLayout::class
        ];
    }

}
