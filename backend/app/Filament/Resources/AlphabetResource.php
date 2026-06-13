<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlphabetResource\Pages;
use App\Models\Alphabet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class AlphabetResource extends Resource
{
    protected static ?string $model = Alphabet::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Alphabet Details')
                    ->schema([
                        Forms\Components\TextInput::make('letter')
                            ->required()
                            ->maxLength(1)
                            ->uppercase()
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('word')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image_path')
                            ->image()
                            ->directory('alphabets/images')
                            ->visibility('public')
                            ->label('Letter Image'),
                        Forms\Components\FileUpload::make('sound_path')
                            ->audio()
                            ->directory('alphabets/sounds')
                            ->visibility('public')
                            ->label('Pronunciation Audio'),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->label('Active'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letter')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('word'),
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlphabets::route('/'),
            'create' => Pages\CreateAlphabet::route('/create'),
            'edit' => Pages\EditAlphabet::route('/{record}/edit'),
        ];
    }
}
