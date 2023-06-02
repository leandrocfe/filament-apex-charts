<?php

namespace Leandrocfe\FilamentApexCharts\Commands;

use Filament\Support\Commands\Concerns\CanManipulateFiles;
use Filament\Support\Commands\Concerns\CanValidateInput;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class FilamentApexChartsCommand extends Command
{
    use CanManipulateFiles;
    use CanValidateInput;

    /**
     * Signature
     *
     * @var string
     */
    public $signature = 'make:filament-apex-charts {name?}';

    /**
     * Description
     *
     * @var string
     */
    public $description = 'Creates a Filament Apex Chart Widget class.';

    /**
     * Filesystem instance
     */
    protected Filesystem $files;

    /**
     * Widget
     */
    private string $widget;

    /**
     * Chart Type
     */
    private string $chartType;

    /**
     * Chart options
     */
    private array $chartOptions;

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
        $this->chartOptions = config('filament-apex-charts.chart_options');
    }

    public function handle(): int
    {
        //widget
        $this->widget = (string) Str::of($this->argument('name') ?? $this->askRequired('Name (e.g. `BlogPostsChart`)', 'name'))
            ->trim('/')
            ->trim('\\')
            ->trim(' ')
            ->replace('/', '\\');

        //chartType
        $this->chartType = $this->choice(
            'Chart type', $this->chartOptions,
        );

        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if ($this->files->exists($path)) {
            $this->error("File : {$path} already exits!");
            exit();
        }

        $fileCount = count($this->files->files(dirname($path)));

        $this->files->put($path, $contents);
        $this->info("Successfully created {$this->widget}! Check out your new widget on the dashboard page.");

        if ($fileCount === 0) {
            $this->welcomeMessage();
        }

        return self::SUCCESS;
    }

    /**
     * Return the stub file path
     *
     * @return string
     */
    public function getStubPath()
    {
        $path = Str::of(__DIR__);

        $path = match (PHP_OS_FAMILY) {
            default => $path->replace('src/Commands', 'stubs/'),
            'Windows' => $path->replace('src\Commands', 'stubs\\')
        };

        return $path->append($this->chartType)->append('.stub');
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     */
    public function getStubVariables()
    {
        return [
            'NAMESPACE' => 'App\\Filament\\Widgets',
            'CLASS_NAME' => $this->widget,
            'CHART_ID' => Str::of($this->widget)->camel(),
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param  array  $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = Str::of($contents)->replace('$'.$search.'$', $replace);
        }

        return $contents;
    }

   /**
    * Get the full path of generate class
    *
    * @return string
    */
   public function getSourceFilePath()
   {
       $widgetPath = match (PHP_OS_FAMILY) {
           default => 'app/Filament/Widgets/',
           'Windows' => 'app\\Filament\\Widgets\\'
       };

       return base_path($widgetPath).$this->widget.'.php';
   }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    private function welcomeMessage()
    {
        if ($this->confirm('Would you like to show some love by starring the repo?', true)) {
            if (PHP_OS_FAMILY == 'Darwin') {
                exec('open https://github.com/leandrocfe/filament-apex-charts');
            }
            if (PHP_OS_FAMILY == 'Windows') {
                exec('start https://github.com/leandrocfe/filament-apex-charts');
            }
            if (PHP_OS_FAMILY == 'Linux') {
                exec('xdg-open https://github.com/leandrocfe/filament-apex-charts');
            }

            $this->line('Thanks! :)');
        }
    }
}
