<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Redirect users to their role-specific dashboards
        return match ($user->role) {
            'system_admin' => redirect()->route('admin.dashboard'),
            'business_admin' => redirect()->route('business.dashboard'),
            'seller' => redirect()->route('seller.dashboard'),
            'accountant' => redirect()->route('accountant.dashboard'),
            default => $this->showUserDashboard(),
        };
    }

    /**
     * Show the default user dashboard with contact submissions data
     */
    protected function showUserDashboard()
    {
        $chartData = $this->getChartData();

        return view('dashboard', $chartData);
    }

    private function getChartData()
    {
        // Total submissions
        $totalSubmissions = ContactSubmission::count();

        // Submissions by subject (for pie chart)
        $submissionsBySubject = ContactSubmission::select('subject', DB::raw('count(*) as count'))
            ->groupBy('subject')
            ->get()
            ->pluck('count', 'subject');

        // Submissions over last 30 days (for line chart)
        $last30Days = [];
        $last30DaysCounts = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $last30Days[] = $date->format('M d');

            $count = ContactSubmission::whereDate('created_at', $date->toDateString())->count();
            $last30DaysCounts[] = $count;
        }

        // Recent submissions
        $recentSubmissions = ContactSubmission::latest()
            ->take(5)
            ->get();

        // Submissions by subject for bar chart
        $subjectCounts = ContactSubmission::select('subject', DB::raw('count(*) as count'))
            ->groupBy('subject')
            ->orderByDesc('count')
            ->get();

        return [
            'totalSubmissions' => $totalSubmissions,
            'recentSubmissions' => $recentSubmissions,
            'chartDataBySubject' => json_encode([
                'labels' => $submissionsBySubject->keys()->toArray(),
                'data' => $submissionsBySubject->values()->toArray(),
                'backgroundColor' => [
                    'rgba(99, 102, 241, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(236, 72, 153, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(249, 115, 22, 0.8)',
                ],
                'borderColor' => [
                    'rgba(99, 102, 241, 1)',
                    'rgba(139, 92, 246, 1)',
                    'rgba(236, 72, 153, 1)',
                    'rgba(59, 130, 246, 1)',
                    'rgba(34, 197, 94, 1)',
                    'rgba(249, 115, 22, 1)',
                ],
                'borderWidth' => 2,
            ]),
            'chartDataTrend' => json_encode([
                'labels' => $last30Days,
                'datasets' => [
                    [
                        'label' => 'Daily Submissions',
                        'data' => $last30DaysCounts,
                        'borderColor' => 'rgba(99, 102, 241, 1)',
                        'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                        'borderWidth' => 3,
                        'fill' => true,
                        'tension' => 0.4,
                        'pointRadius' => 4,
                        'pointBackgroundColor' => 'rgba(99, 102, 241, 1)',
                        'pointBorderColor' => '#fff',
                        'pointBorderWidth' => 2,
                    ]
                ]
            ]),
            'chartDataBar' => json_encode([
                'labels' => $subjectCounts->pluck('subject')->toArray(),
                'datasets' => [
                    [
                        'label' => 'Inquiries by Category',
                        'data' => $subjectCounts->pluck('count')->toArray(),
                        'backgroundColor' => [
                            'rgba(99, 102, 241, 0.8)',
                            'rgba(139, 92, 246, 0.8)',
                            'rgba(236, 72, 153, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(34, 197, 94, 0.8)',
                        ],
                        'borderColor' => [
                            'rgba(99, 102, 241, 1)',
                            'rgba(139, 92, 246, 1)',
                            'rgba(236, 72, 153, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(34, 197, 94, 1)',
                        ],
                        'borderWidth' => 2,
                        'borderRadius' => 8,
                    ]
                ]
            ]),
        ];
    }
}
