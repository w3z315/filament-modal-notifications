<?php

namespace W3z315\ModalNotifications\Resources;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use W3z315\ModalNotifications\Models\ModalNotification;
use W3z315\ModalNotifications\Resources\ModalNotificationResource\Pages\CreateModalNotification;
use W3z315\ModalNotifications\Resources\ModalNotificationResource\Pages\EditModalNotification;
use W3z315\ModalNotifications\Resources\ModalNotificationResource\Pages\ListModalNotifications;

class ModalNotificationResource extends Resource
{
    protected static ?string $model = ModalNotification::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->columnSpan('full')->schema([
                    TextInput::make('title')->required(),
                ]),
                Group::make()->columnSpan('full')->schema([
                    MarkdownEditor::make('content')->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label(__('filament-modal-notifications::notifications.table.title'))->searchable()->sortable(),
                Tables\Columns\TextColumn::make('dismissed')->label(__('filament-modal-notifications::notifications.table.dismissed'))
                    ->getStateUsing(fn ($record) => $record->dismissedCount()),
                Tables\Columns\TextColumn::make('created_at')->label(__('filament-modal-notifications::notifications.table.created_at'))->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions(
                [
                    Tables\Actions\CreateAction::make(),
                ]
            )
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListModalNotifications::route('/'),
            'create' => CreateModalNotification::route('/create'),
            'edit' => EditModalNotification::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('filament-modal-notifications::notifications.modal_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-modal-notifications::notifications.modal_label_plural');
    }

    public static function getNavigationLabel(): string
    {
        return self::getPluralModelLabel();
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-modal-notifications.navigation_group');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-modal-notifications.navigation_sort');
    }
}
