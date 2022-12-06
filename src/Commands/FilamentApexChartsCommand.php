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

    public $signature = 'make:filament-apex-charts {name?}';

    public $description = 'Creates a Filament Apex Chart Widget class.';

    private $widget;

    public function handle(): int
    {
        $this->widget = (string) Str::of($this->argument('name') ?? $this->askRequired('Name (e.g. `BlogPostsChart`)', 'name'))
        ->trim('/')
        ->trim('\\')
        ->trim(' ')
        ->replace('/', '\\');

        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (! $this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("Successfully created {$this->widget}!");
        } else {
            $this->info("File : {$path} already exits");
        }

        return self::SUCCESS;
    }

    /**
     * Filesystem instance
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param  Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Return the stub file path
     *
     * @return string
     */
    public function getStubPath()
    {
        return str_replace('src\Commands', '', __DIR__).'stubs\Widget.stub';
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
     * @param $stub
     * @param  array  $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$'.$search.'$', $replace, $contents);
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
        return base_path('App\\Filament\\Widgets').'\\'.$this->widget.'.php';
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
}
