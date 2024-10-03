<?php

namespace App\Filament\Pages;

use App\Models\HeaderSetting;
use App\Models\JumbotronSetting;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Pages\Actions\ButtonAction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;
use Livewire\WithFileUploads;

// Import Notification

class FrontendSettings extends Page implements Forms\Contracts\HasForms
{

    use WithFileUploads; // Pastikan trait ini digunakan
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.frontend-settings';

    public $logo;
    public $website_title;
    public $description;
    public $button_text;
    public $thumbnail_image;

    public function mount(): void
    {

        $headerSetting = HeaderSetting::first();
        $jumbotronSetting = JumbotronSetting::first();



        // Pastikan bahwa data dari database ditemukan sebelum diisi ke form
        $this->form->fill([
            'logo' => $headerSetting && $headerSetting->logo ? asset('storage/' . $headerSetting->logo) : null,
            'website_title' => $headerSetting ? $headerSetting->website_title : null,
            'description' => $jumbotronSetting ? $jumbotronSetting->description : null,
            'button_text' => $jumbotronSetting ? $jumbotronSetting->button_text : null,
            'thumbnail_image' => $jumbotronSetting ? $jumbotronSetting->thumbnail_image : null,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Tabs::make('settings')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Header')
                        ->schema([
                            Forms\Components\FileUpload::make('logo')
                                ->label('Upload Logo')
                                ->image()
                                ->visibility('public')
                                ->directory('logos')
                                ->maxSize(1024)
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),


                            Forms\Components\TextInput::make('website_title')
                                ->label('Website Title')
                                ->required(),
                        ]),

                    Forms\Components\Tabs\Tab::make('Jumbotron')
                        ->schema([
                            Forms\Components\Textarea::make('description')
                                ->label('Description')
                                ->required(),

                            Forms\Components\TextInput::make('button_text')
                                ->label('Button Text')
                                ->required(),

                            Forms\Components\FileUpload::make('thumbnail_image')
                                ->label('Upload Thumbnail Image')
                                ->image()
                                ->directory('thumbnails'),
//                                ->maxSize(1024)
//                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
//                                ->required(),
                        ]),
                ]),
        ];
    }

    protected function getActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->action('saveSettings')
                ->color('primary'),
        ];
    }

    public function saveSettings(): void {

        $data = $this->form->getState();

        // Validate inputs
        $this->validate([
//            'logo' => 'nullable|image|max:1024', // Optional but should be an image
            'website_title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
//            'thumbnail_image' => 'nullable|image|max:1024', // Optional but should be an image
        ]);

        // Handle file upload for logo
        if ($this->logo instanceof UploadedFile) {
            $logoPath = $this->logo->store('logos', 'public');
        } else {
            $logoPath = null; // Handle case if no file is uploaded
        }

        // Handle file upload for thumbnail image
        if ($this->thumbnail_image instanceof UploadedFile) {
            $thumbnailPath = $this->thumbnail_image->store('thumbnails', 'public');
        } else {
            $thumbnailPath = null; // Handle case if no file is uploaded
        }

        // Save or update settings
        $headerSetting = HeaderSetting::first();
        if ($headerSetting) {
            $headerSetting->update([
                'logo' => $logoPath ?? $headerSetting->logo,
                'website_title' => $this->website_title,
            ]);
        } else {
            HeaderSetting::create([
                'logo' => $logoPath,
                'website_title' => $this->website_title,
            ]);
        }

        JumbotronSetting::updateOrCreate(
            ['id' => 1],
            [
                'description' => $this->description,
                'button_text' => $this->button_text,
                'thumbnail_image' => $thumbnailPath ?? JumbotronSetting::first()?->thumbnail_image,
            ]
        );

        Notification::make()
            ->title('Settings updated successfully!')
            ->success()
            ->send();
    }



}
