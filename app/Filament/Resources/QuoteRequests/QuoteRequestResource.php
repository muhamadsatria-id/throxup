<?php

namespace App\Filament\Resources\QuoteRequests;

use App\Filament\Resources\QuoteRequests\Pages\EditQuoteRequest;
use App\Filament\Resources\QuoteRequests\Pages\ListQuoteRequests;
use App\Models\QuoteRequest;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class QuoteRequestResource extends Resource
{

    public static function canViewAny(): bool
        {
            if (request()->routeIs(static::getRouteBaseName().'.*')) {
                abort(404);
            }

            return false;
        }

    protected static ?string $model = QuoteRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxArrowDown;

    protected static ?string $navigationLabel = 'Quote Requests (RFQ)';

    protected static string|UnitEnum|null $navigationGroup = 'Inquiries & Leads';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        $pendingCount = static::getModel()::where('status', 'pending')->count();

        return $pendingCount > 0 ? (string) $pendingCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Permintaan Penawaran (RFQ)')
                    ->description('Data asli yang dikirimkan oleh calon klien melalui halaman website.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('full_name')
                            ->label('Full Name')
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('business_email')
                            ->label('Business Email')
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('phone_number')
                            ->label('Phone Number / Country Code')
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('subject')
                            ->label('Subject / Part Number Reference')
                            ->disabled()
                            ->dehydrated(false),

                        Textarea::make('project_specifications')
                            ->label('Project Specifications / Requirements')
                            ->rows(6)
                            ->columnSpanFull()
                            ->disabled()
                            ->dehydrated(false),
                    ]),

                Section::make('Tindak Lanjut Tim Sales (Internal)')
                    ->schema([
                        Select::make('status')
                            ->label('Status RFQ')
                            ->options([
                                'pending' => 'Pending (Belum Diproses)',
                                'reviewed' => 'Reviewed (Sedang Dihitung)',
                                'replied' => 'Replied (Penawaran Terkirim)',
                                'closed' => 'Closed (Selesai)',
                            ])
                            ->required()
                            ->native(false),

                        Textarea::make('admin_notes')
                            ->label('Catatan Internal Sales / Admin')
                            ->placeholder('Catat nomor penawaran (quotation), PIC sales yang menangani, atau progres follow-up...')
                            ->rows(3),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nama Klien')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('business_email')
                    ->label('Email Bisnis')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email berhasil disalin'),

                Tables\Columns\TextColumn::make('phone_number')
                    ->label('No. Telepon / WA')
                    ->searchable(),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Subject / Part Number')
                    ->limit(35)
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'reviewed' => 'info',
                        'replied' => 'success',
                        'closed' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewed' => 'Reviewed',
                        'replied' => 'Replied',
                        'closed' => 'Closed',
                    ]),
            ])
            ->recordActions([
                Action::make('reply_email')
                    ->label('Balas Email')
                    ->icon('heroicon-o-envelope')
                    ->color('success')
                    ->url(fn (QuoteRequest $record): string => 'mailto:'.$record->business_email.'?subject='.rawurlencode('Re: '.($record->subject ?? 'Formal Quote Request')))
                    ->openUrlInNewTab(),

                EditAction::make()
                    ->label('Proses'),

                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListQuoteRequests::route('/'),
            'edit' => EditQuoteRequest::route('/{record}/edit'),
        ];
    }
}
