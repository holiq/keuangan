<?php

namespace App\Filament\Pages;

use App\Models\Transaction;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ReportSell extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.report-sell';

    public Transaction $transaction;

    public function table(Table $table): Table
    {
        return $table
            ->query(Transaction::with('user', 'member.level', 'product.category')->where('type', 'sell'))
            ->columns([
                TextColumn::make('no_transaction')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type'),
                TextColumn::make('user.name'),
                TextColumn::make('member.name'),
                TextColumn::make('member.level.name'),
                TextColumn::make('product.name'),
                TextColumn::make('product.category.name'),
                TextColumn::make('qty'),
                TextColumn::make('price_one')
                    ->money('IDR'),
                TextColumn::make('price_total')
                    ->money('IDR'),
                TextColumn::make('discount_price')
                    ->suffix('%'),
                TextColumn::make('member.level.discount')
                    ->label('Discount level')
                    ->suffix('%'),
                TextColumn::make('product.category.discount')
                    ->label('Discount category')
                    ->suffix('%'),
                TextColumn::make('price_discount')
                    ->prefix('-')
                    ->money('IDR'),
                TextColumn::make('total_payment')
                    ->money('IDR'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}