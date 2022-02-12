<?php

namespace App\Orchid\Layouts;

use App\Models\Photo;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;

class PhotoListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'photos';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('title', 'Title')
            ->sort()
            ->filter(Input::make())
            ->render(function (Photo $photo) {
                return Link::make($photo->title)
                    ->route('platform.photo.edit', $photo);
            }),

        TD::make('created_at', 'Created')->sort(),
        TD::make('terminate_at', 'Terminated Time')->sort(),
        
        ];
    }
}
