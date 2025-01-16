<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThematicDataResource\Pages;
use App\Filament\Resources\ThematicDataResource\RelationManagers;
use App\Models\ThematicData;
use App\Models\Province;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ThematicDataResource extends Resource
{
    protected static ?string $model = ThematicData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('province_id')
                    ->label('Provinsi')
                    ->options(Province::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('area')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('population')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('population_density')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('unemployment_rate')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('human_development_index')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('per_capita_income')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('poor_population')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('schools')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('hospitals')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('health_centers')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('province.name')
                    ->label('Provinsi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('area')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('population')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('population_density')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unemployment_rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('human_development_index')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('per_capita_income')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('poor_population')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('schools')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hospitals')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('health_centers')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListThematicData::route('/'),
            'create' => Pages\CreateThematicData::route('/create'),
            'edit' => Pages\EditThematicData::route('/{record}/edit'),
        ];
    }
}