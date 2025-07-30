<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Reviews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Reviews::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
   {
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nombre del Cliente')
					->required(),
				Forms\Components\Textarea::make('comment')
					->label('Comentario')
					->required(),
				Forms\Components\Select::make('rating')
					->label('Calificación')
					->options([
						1 => '1 Estrella',
						2 => '2 Estrellas',
						3 => '3 Estrellas',
						4 => '4 Estrellas',
						5 => '5 Estrellas',
					])
					->default(5)
					->required(),
			]);
	}

    public static function table(Table $table): Table
    {
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')->label('Cliente'),
				Tables\Columns\TextColumn::make('comment')->label('Comentario')->limit(50),
				Tables\Columns\TextColumn::make('rating')->label('Calificación'),
				Tables\Columns\TextColumn::make('created_at')->label('Fecha')->date(),
			])
			->filters([])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\DeleteAction::make(),
			])
			->bulkActions([
				Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
