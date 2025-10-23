<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RoomResource extends Resource
{
	protected static ?string $model = Room::class;

	protected static ?string $navigationIcon = 'heroicon-m-building-office';
	protected static ?string $navigationLabel = 'Habitaciones';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')->label('Nombre')->required(),
				Forms\Components\Textarea::make('description')->label('Descripción'),
				Forms\Components\TextInput::make('price')->label('Precio')->numeric()->required(),
				Forms\Components\FileUpload::make('image')->image()->directory('rooms')->label('Imagen')->required(),
				Forms\Components\Toggle::make('is_featured')->label('¿Es la habitación destacada?'),
				Section::make('Detalles de la habitación')
					->columns(3)
					->schema([
						TextInput::make('size_m2')
							->label('Tamaño (m²)')
							->numeric()
							->minValue(1)
							->suffix('m²'),
						TextInput::make('bed_type')
							->label('Tipo de cama / configuración')
							->placeholder('1 cama doble, 2 individuales, etc.'),
						Select::make('bathroom_type')
							->label('Tipo de baño')
							->options([
								'privado' => 'Baño privado',
								'compartido' => 'Baño compartido',
							])
							->native(false)
							->required()
							->live()
							->afterStateUpdated(function (string $state, Set $set) {
								$set('bathroom_items_private', []);
								$set('bathroom_items_shared', []);
							}),

						CheckboxList::make('views')
							->label('Vista')
							->options([
								'patio interior' => 'Patio interior',
								'jardín' => 'Jardín',
								'montaña' => 'Montaña',
								'ciudad' => 'Ciudad',
								'calle' => 'Calle',
							])
							->columns(2)
							->columnSpanFull(),
					]),

				Section::make('Baño')
					->columns(2)
					->schema([
						CheckboxList::make('bathroom_items_private')
							->label('En el baño privado')
							->options([
								'ducha' => 'Bañera o ducha',
								'toallas' => 'Toallas',
								'articulos_aseo' => 'Artículos de aseo gratis',
								'secador' => 'Secador de pelo',
								'papel_higienico' => 'Papel higiénico',
								'agua_caliente' => 'Agua caliente',
							])
							->visible(fn(Get $get) => $get('bathroom_type') === 'privado'),

						CheckboxList::make('bathroom_items_shared')
							->label('En el baño compartido')
							->options([
								'ducha' => 'Bañera o ducha',
								'toallas' => 'Toallas',
								'articulos_aseo' => 'Artículos de aseo gratis',
								'papel_higienico' => 'Papel higiénico',
							])
							->visible(fn(Get $get) => $get('bathroom_type') === 'compartido'),
					]),

				Section::make('Servicios de la habitación')
					->columns(2)
					->schema([
						CheckboxList::make('services')
							->label('Servicios')
							->options([
								'wifi' => 'WiFi gratis',
								'tv' => 'TV',
								'enchufe_cama' => 'Enchufe cerca de la cama',
								'ropa_cama' => 'Ropa de cama',
								'toallas_incluidas' => 'Toallas incluidas',
								'entrada_privada' => 'Entrada privada',
								'terraza' => 'Terraza',
								'lavadora' => 'Lavadora (área compartida)',
								'secadora' => 'Secadora (área compartida)',
							])
							->columns(2)
							->columnSpanFull(),

						TextInput::make('smoke_policy')
							->label('Política de humo')
							->placeholder('No se puede fumar / Área designada / Se permite en terraza...'),
					]),

				Section::make('Galería de fotos')
					->schema([
						Forms\Components\Repeater::make('images')
							->relationship('images')
							->label('Galería de fotos')
							->schema([
								FileUpload::make('image')
									->image()
									->directory('rooms/gallery')
									->label('Imagen'),
							])
							->columns(1)
							->minItems(0),
					]),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')->label('Nombre'),
				Tables\Columns\ImageColumn::make('image')->label('Imagen'),
				Tables\Columns\TextColumn::make('price')->label('Precio'),
				Tables\Columns\IconColumn::make('is_featured')->boolean()->label('Destacada'),
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
			'index' => Pages\ListRooms::route('/'),
			'create' => Pages\CreateRoom::route('/create'),
			'edit' => Pages\EditRoom::route('/{record}/edit'),
		];
	}
}
