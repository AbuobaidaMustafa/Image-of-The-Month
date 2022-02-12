<?php

namespace App\Orchid\Screens\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Photo;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;

class PhotoEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Add Photo Garlley';
    public $exists = false;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Photo $photo): array
    {
        $this->exists = $photo->exists;
        if($this->exists){
            $this->name = 'Edit Photo';
        }
        return [
            'photo' => $photo
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
            Button::make('Add Photo')
            ->icon('save')
            ->method('addPhoto')
            ->canSee(!$this->exists),
            Button::make('Edit Photo')
            ->icon('save')
            ->method('addPhoto')
            ->canSee($this->exists),
            Button::make('Remove')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->exists),

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
            Layout::rows([
                Input::make('photo.title')
                ->title('Photo Title')->required(),
                Cropper::make('photo.photo')
                ->title('Photo')
                ->width(500)
                ->height(300)->required()->targetRelativeUrl(),
                TextArea::make('photo.description')
                ->title('Photo Description')->required(),                
                DateTimer::make('photo.terminate_at')
                ->title('Duration the Photo will be available for') 
                ->allowInput()->enableTime()
                ->required(),


            ])
        ];
    }

    
    public function addPhoto(Photo $photo,Request $request){
        
            $photo->fill($request->get('photo'))->save();
    
            Alert::info('You have successfully Add or an Photo.');
    
            return redirect()->route('platform.photos.list');
        
    }
    public function remove(Photo $photo)
    {
        $photo->delete();

        Alert::info('You have successfully deleted the Photo.');

        return redirect()->route('platform.photos.list');
    }
}
