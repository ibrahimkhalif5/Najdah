<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use App\Models\Message;
use App\Models\Project;
use App\Models\Sponsor;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AdminWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count())
                ->description(User::whereDate('created_at', '>', now()->subDays(30))->count() . ' new this month')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart([3, 5, 2, 8, 4, 6, 7, User::count()]),
            Stat::make('Board Members', Member::count())
                ->description(Member::max('sort_order') ? 'Sorted by priority' : 'Board of directors')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('danger'),
            Stat::make('Projects', Project::count())
                ->description(Project::where('status', 'completed')->count() . ' completed')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success')
                ->chart([1, 3, 2, 4, 3, 5, 4, Project::count()]),
            Stat::make('Sponsors', Sponsor::count())
                ->description(Sponsor::where('is_active', true)->count() . ' active')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),
            Stat::make('Messages', Message::count())
                ->description(Message::whereNull('read_at')->count() . ' unread')
                ->descriptionIcon('heroicon-m-inbox')
                ->color('gray'),
        ];
    }
}
