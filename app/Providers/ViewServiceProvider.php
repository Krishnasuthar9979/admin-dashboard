use Illuminate\Support\Facades\Blade;

public function boot()
{
    Blade::component('components.app-layout', 'app-layout');
}