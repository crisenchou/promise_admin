<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class PresenterGenerator extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:presenter {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new view presenter class';

    protected $type = 'present';

    public function getStub()
    {
        return __DIR__ . '/../stubs/presenter.stub';
    }


    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Presenters';
    }
}
