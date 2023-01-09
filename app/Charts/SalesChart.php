<?php

namespace App\Charts;

use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $order = OrderDetail::select(
            DB::raw("(count(id)) as total"),
            DB::raw("(DATE_FORMAT(created_at, '%D %M')) as month_name"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m %Y')"))
            ->get();
        $month_name = json_decode(json_encode($order->pluck('month_name')), true);
        $total = json_decode(json_encode($order->pluck('total')), true);
        return $this->chart->areaChart()
            ->addData('Penjualan', $total)
            ->setXAxis($month_name);
    }
}
