<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Models\Kategori;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::whereHas('kategori', function ($query) {$query->where('is_expense', false);})->sum('amount');
        $pengeluaran = Transaction::whereHas('kategori', function ($query) {$query->where('is_expense', true);})->sum('amount');
        return [
              Stat::make('Total Pemasukan', 'Rp ' . number_format($pemasukan, 0, ',', '.')),
            Stat::make('Total Pengeluaran','Rp ' . number_format($pengeluaran, 0, ',', '.' )),
            Stat::make('Selisih', 'Rp ' . number_format($pemasukan - $pengeluaran, 0, ',', '.' )),
        ];
    }
}
