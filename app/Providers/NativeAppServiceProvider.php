<?php

namespace App\Providers;

use App\Event\DockerLoginEvent;
use Native\Laravel\Facades\Window;
use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Menu::new()->submenu('Docker',
            Menu::new()
                ->label("Hi there!")
                ->separator()
                ->event(DockerLoginEvent::class, "Docker Login")
                ->quit()
        )
            ->fileMenu()
            ->editMenu()
            ->register();
        Window::open()->width(800)->height(600)->route('/');
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
