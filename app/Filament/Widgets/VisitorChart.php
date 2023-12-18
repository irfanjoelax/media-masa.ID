<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class VisitorChart extends LineChartWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ]
    ];

    protected function getHeading(): string
    {
        return 'Grafik Pengunjung Bulan - ' . date('F');
    }

    protected function getData(): array
    {
        // Mendapatkan array dengan total pengunjung untuk setiap tanggal
        $dateArray = $this->getDate();

        // Memisahkan kunci (tanggal) dan nilai (total pengunjung) dari array
        $labels = array_keys($dateArray);
        $totalVisitors = array_values($dateArray);

        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung',
                    'data' => $totalVisitors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    public function getDate()
    {
        // Mendapatkan informasi tanggal sekarang
        $today = Carbon::now();

        // Mendapatkan informasi tahun dan bulan sekarang
        $year = $today->year;
        $month = $today->month;

        // Menghitung jumlah hari dalam bulan ini
        $daysInMonth = Carbon::create($year, $month)->daysInMonth;

        // Membuat array untuk menyimpan tanggal-tanggal dalam bulan ini
        $dateArray = [];

        // Loop untuk menambahkan setiap tanggal ke dalam array
        for ($day = 1; $day <= $daysInMonth; $day++) {
            // Format tanggal menjadi Y-m-d
            $date = Carbon::create($year, $month, $day)->format('d');

            // Simulasikan total pengunjung, gantilah ini dengan data sebenarnya
            $totalVisitors = rand(85, 125);

            // Menambahkan tanggal dan total pengunjung ke dalam array asosiatif
            $dateArray[$date] = $totalVisitors;
        }

        return $dateArray;
    }
}
